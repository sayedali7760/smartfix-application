<?php

namespace frontend\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class UserController extends Controller
{

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => ['index', 'create', 'view', 'update', 'statusupdate'],
                    'rules' => [
                        [

                            'actions' => ['index', 'create', 'view', 'update'],
                            'allow' => true,
                            'roles' => ['@'],
                            'matchCallback' => function ($rule, $action) {
                                return Yii::$app->user->identity->IsSuperAdmin;
                            }
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }


    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $model = new User();
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->created_by = Yii::$app->user->id;
                $model->setPassword("garage@123");
                $model->generateAuthKey();
                $model->generateEmailVerificationToken();
                if ($model->save()) {
                    \Yii::$app->getSession()->setFlash('success', '&nbsp;&nbsp;&nbsp;&nbsp;User Added Successfully');
                    return $this->redirect(['index']);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }


    public function actionView($id)
    {

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionCreate()
    {
        $model = new User();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->created_by = Yii::$app->user->id;
                $model->setPassword("garage@123");
                $model->generateAuthKey();
                $model->generateEmailVerificationToken();
                if ($model->save()) {
                    \Yii::$app->getSession()->setFlash('success', '&nbsp;&nbsp;&nbsp;&nbsp;User Added Successfully');
                    return $this->redirect(['index']);
                }
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
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        if ($this->request->isPost && $model->load($this->request->post())) {


            $model->generateEmailVerificationToken();
            $model->updated_on = date('Y-m-d H:i:s');
            if ($model->save()) {
                \Yii::$app->getSession()->setFlash('success', '&nbsp;&nbsp;&nbsp;&nbsp;User Updated Successfully');
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
