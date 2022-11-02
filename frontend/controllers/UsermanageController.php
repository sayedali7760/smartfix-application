<?php

namespace frontend\controllers;

use app\models\Usermanage;
use app\models\UsermanageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

class UsermanageController extends Controller
{

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
                'access' => [
                    'class' => \yii\filters\AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
            ]
        );
    }


    public function actionIndex()
    {
        $model = new Usermanage();
        $searchModel = new UsermanageSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionUserprofile()
    {
        $model = new Usermanage();
        $searchModel = new UsermanageSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if (Yii::$app->request->isAjax) {
            $user_id = Yii::$app->user->identity->id;
            $real_password = $this->request->post('con_password');
            $password = Yii::$app->security->generatePasswordHash($real_password);
            $auth_key = Yii::$app->security->generateRandomString();

            $model->password_hash = $password;
            $model->auth_key = $auth_key;


            $result = Yii::$app->db->createCommand()
                ->update('bm_user', ['auth_key' => $auth_key, 'password_hash' => $password, 'real_password' => $real_password], 'id = ' . $user_id . '');

            if ($result->execute()) {
                Yii::$app->session->setFlash('success', 'Password Updated.');
                echo "Success";
            } else {
                echo "Error";
            }
        } else {

            return $this->render('user_profile', [
                'model' => $model,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    public function actionAdd_user()
    {
        $model = new Usermanage();
        if (Yii::$app->request->isAjax) {
            if ($model->load($this->request->post())) {
                $real_password = $this->request->post('con_password');
                $password = Yii::$app->security->generatePasswordHash($real_password);
                $auth_key = Yii::$app->security->generateRandomString();

                $model->password_hash = $password;
                $model->auth_key = $auth_key;
                $model->real_password = $real_password;
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'User Added.');
                    return $this->redirect(['index']);
                }
            }
        }
    }
    public function actionUpdate_user()
    {
        if (Yii::$app->request->isAjax) {

            $user_id = $this->request->post('user_id');
            $email = $this->request->post('email');
            $password = $this->request->post('password');
            $user_name = $this->request->post('username');
            $name = $this->request->post('name');
            $user_role = $this->request->post('user_role');


            $password = Yii::$app->security->generatePasswordHash($password);
            $auth_key = Yii::$app->security->generateRandomString();

            $result = Yii::$app->db->createCommand()
                ->update('bm_user', ['email' => $email, 'role' => $user_role, 'name' => $name, 'auth_key' => $auth_key, 'password_hash' => $password], 'id = ' . $user_id . '');

            if ($result->execute()) {
                Yii::$app->session->setFlash('success', 'User Updated.');
                return $this->redirect(['index']);
            } else {
                echo "Error";
            }
        }
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate()
    {
        $model = new Usermanage();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $searchModel = new UsermanageSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = Usermanage::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
