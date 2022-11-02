<?php

use yii\helpers\Html;

$this->title = 'File Upload';
$this->params['main_menu'][] = 'File Upload';
$this->params['breadcrump'][] = [
    ['link' => 'site/index', 'title' => 'Home'],
    ['link' => 'file_upload/index', 'title' => 'File Upload'],
    ['title' => 'File Upload']
];
?>

<div id="main">
    <div class="row">
        <?php include(Yii::getAlias('@app/views/settings_menu/general_settings.php')); ?>
        <div class="col-md-10 animate fadeRight" style="margin-top: -18px;">
            <div class="card mt-2">
                <div class="card-content">
                    <div class="job-type-update">
                        <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
                        <hr />
                        <?= $this->render('_form', [
                            'model' => $model,
                            'subtitle' => 'Update File - ' . $model->description,
                        ]) ?>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>