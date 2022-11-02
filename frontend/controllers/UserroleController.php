<?php

namespace frontend\controllers;

use Yii;

use app\models\Userrole;
use app\models\UserroleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class UserroleController extends Controller
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

        $searchModel = new UserroleSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $model = new Userrole();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                if ($model->validate()) {
                    if ($model->save()) {
                        Yii::$app->session->setFlash('success', 'User Role added successfully.');
                        return $this->redirect(['index']);
                    } else {
                        echo '<pre>';
                        print_r($model->getErrors());
                        die();
                    }
                } else {
                    return $this->render('index', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                        'model' => $model,
                        'subtitle' => 'Add User Role',
                        'display' => 'block',
                    ]);
                }
            }
        } else {
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'model' => $model,
                'subtitle' => 'Add User Role',
                'display' => 'none',
            ]);
        }
    }
    public function actionUserpermission()
    {
        $model = new Userrole();
        return $this->render('user_permission', [
            'model' => $model,
        ]);
    }
    public function actionStatus()
    {
        $id = $_POST['id'];
        $model = $this->findModel($id);
        if ($model->status() === true) {
            $active = $_POST['status'];
            if ($active == 'false') {
                return 'User Role deactivated.';
            } else {
                return 'User Role activated.';
            }
        }
    }
    public function actionUpdate_user_permission()
    {
        if (Yii::$app->request->isAjax) {
            $data['menu_id'] = $this->request->post('menu_id');
            $data['status'] = $this->request->post('status');
            $data['user_role'] = $this->request->post('user_role');
            $result = Userrole::update_user_permission($data);
            return [
                'data' => $result
            ];
        }
    }
    public function actionInsert_user_permission_group()
    {
        if (Yii::$app->request->isAjax) {
            $data['menu_id'] = $this->request->post('menu_id');
            $data['status'] = $this->request->post('status');
            $data['user_role'] = $this->request->post('user_role');
            $data['sub_menus'] = $this->request->post('sub_menu');
            $result = Userrole::insert_user_permission_group($data);
            return [
                'data' => $result
            ];
        }
    }
    public function actionDelete_user_permission_group()
    {
        if (Yii::$app->request->isAjax) {
            $data['menu_id'] = $this->request->post('menu_id');
            $data['status'] = $this->request->post('status');
            $data['user_role'] = $this->request->post('user_role');
            $data['sub_menus'] = $this->request->post('sub_menu');
            $result = Userrole::delete_user_permission_group($data);
            return [
                'data' => $result
            ];
        }
    }


    public function actionGet_user_permissions()
    {
        if (Yii::$app->request->isAjax) {
            $data['user_role'] = $this->request->post('user_role');
            $result_main_menu = Userrole::get_user_permissions_main_menu($data);
            $result_sub_menu = Userrole::get_user_permissions_sub_menu($data);
            if (!empty($result_main_menu)) {
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return [
                    'main_menu' => $result_main_menu,
                    'sub_menu' => $result_sub_menu,
                    'status' => 1,
                    'message' => 'Data Loaded',
                ];
            }
        }
    }

    public function actionUpdate($id)
    {
        $searchModel = new UserroleSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'User Role updated successfully.');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }


    protected function findModel($id)
    {
        if (($model = Userrole::findOne(['id' => $id])) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
