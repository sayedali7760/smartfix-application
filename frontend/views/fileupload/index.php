<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\switchinput\SwitchInput;


$this->title = 'File Upload';
$this->params['main_menu'][] = 'File Upload';
$this->params['breadcrump'][] = [
    ['link' => 'site/index', 'title' => 'Home'],
    ['link' => 'file_upload/index', 'title' => 'File Upload'],
    ['title' => 'File Upload']
];
?>
<style>
    .curs a {
        cursor: default;
    }
</style>
<div id="main">
    <div class="row">
        <?php include(Yii::getAlias('@app/views/settings_menu/general_settings.php')); ?>
        <div class="col-md-10 animate fadeRight" style="margin-top: -12px;">
            <div class="card">
                <div class="card-content">
                    <div class="job-type-index">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
                                </div>
                                <div class="col-md-6" style="text-align: end;" id="button_show">
                                    <?= Html::a('Add File', null, ['onclick' => 'show_add_section()', 'class' => 'btn btn-small', 'title' => 'Add New File'])
                                    ?>
                                </div>
                            </div>
                            <hr />
                        </div>
                        <div style="display: none;" id="add_section" class="animate fadeRight">
                            <?= $this->render('_form', [
                                'model' => $model,
                                'subtitle' => 'Add File',
                            ]) ?>
                        </div>
                        <?php Pjax::begin(); ?>
                        <div class="cus-row" id="grid_show">

                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    [
                                        'class' => 'yii\grid\SerialColumn',
                                        'header' => 'Sl.  No.',
                                        'headerOptions' => ['style' => 'text-align:left;font-size:12px;width:100px;color: #2196f3;'], // For TH
                                        'contentOptions' => ['style' => 'width:100px;text-align:center;'],
                                    ],

                                    [
                                        'header' => '<span style="color:#2196f3;">Description</span>',
                                        'attribute' => 'description',
                                        'filterInputOptions' => [
                                            'placeholder' => 'Search with Description...',
                                        ],
                                    ],
                                    [
                                        'header' => '<span style="color:#2196f3;">File Name</span>',
                                        'attribute' => 'file_name',
                                        'filterInputOptions' => [
                                            'placeholder' => 'Search with File Name...',
                                            'class' => 'digits'
                                        ]
                                    ],
                                    [
                                        'class' => 'yii\grid\ActionColumn',
                                        'template' => '{update}',
                                        'header' => 'Actions',
                                        'headerOptions' => ['style' => 'color:#45c9b7;text-align:center;font-size:12px;width:10%;font-weight:bold;'],
                                        'contentOptions' => ['style' => 'cursor:pointer;width:100px;text-align:center;'],
                                    ],

                                ],
                            ]); ?>
                        </div>
                        <?php Pjax::end(); ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    function show_add_section() {
        $("#add_section").toggle(500);
        $('#add_section').show();
        $('#button_show').hide();
    }
</script>