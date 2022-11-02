<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\JobType */

$this->title = $model->description;
$this->params['main_menu'][] = 'General Settings';
$this->params['breadcrump'][] = [
    ['link' => 'site/index', 'title' => 'Home'],
    ['link' => 'jobtype/index', 'title' => 'General Settings'],
    ['title' => 'Job Types']
];
\yii\web\YiiAsset::register($this);
?>
<div id="main">
    <div class="row">
        <?php include(Yii::getAlias('@app/views/settings_menu/general_settings.php')); ?>
        <div class="col s10 animate fadeRight" style="margin-top: -13px;">
            <div class="card mt-2">
                <div class="card-content">
                    <div class="job-type-view">

                        <h6><?= Html::encode($this->title) ?></h6>


                        <p>
                            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                            <!-- <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                                        'class' => 'btn btn-danger',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to delete this item?',
                                            'method' => 'post',
                                        ],
                                    ]) ?> -->
                        </p>

                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'id',
                                'description',
                                'vat',
                                'is_active',
                                'created_on',
                            ],
                        ]) ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>