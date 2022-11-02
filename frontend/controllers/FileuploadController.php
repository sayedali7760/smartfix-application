<?php

namespace frontend\controllers;

use Yii;
use app\models\Fileupload;
use app\models\FileuploadSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class FileuploadController extends Controller
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
        $model = new Fileupload();
        $searchModel = new FileuploadSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $file = UploadedFile::getInstance($model, 'file_name');
                $path = 'uploaded_file/' . $file->baseName . '.' . $file->extension;
                if ($file->saveAs($path)) {
                    $model->file_name = $file->baseName . '.' . $file->extension;
                    $model->created_by = Yii::$app->user->identity->id;
                    if ($model->save()) {
                        Yii::$app->session->setFlash('success', 'File Uploaded successfully.');
                        return $this->redirect(['index']);
                    } else {
                        echo '<pre>';
                        print_r($model->getErrors());
                        die();
                    }
                }
            }
        } else {
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'model' => $model,
            ]);
        }
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);
        $searchModel = new FileuploadSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $file = UploadedFile::getInstance($model, 'file_name');
            $path = 'uploaded_file/' . $file->baseName . '.' . $file->extension;
            if ($file->saveAs($path)) {
                $model->file_name = $file->baseName . '.' . $file->extension;
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'Updated successfully.');
                    return $this->redirect(['index']);
                } else {
                    echo '<pre>';
                    print_r($model->getErrors());
                    die();
                }
            }
            \Yii::$app->session->setFlash('success', 'Job Type updated successfully.');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionDelete()
    {
        if (Yii::$app->request->isAjax) {
            $id = Yii::$app->request->post('id');
            $this->findModel($id)->delete();
            \Yii::$app->session->setFlash('success', 'Deleted successfully.');
            return $this->redirect(['index']);
        }
    }
    protected function findModel($id)
    {
        if (($model = Fileupload::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
