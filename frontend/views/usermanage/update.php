<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $searchModel app\models\joborderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Management';
$this->params['main_menu'][] = 'Administration';
$this->params['breadcrump'][] = [
    ['link' => 'site/index', 'title' => 'Home'],
    ['link' => 'usermanage/index', 'title' => 'Administration'],
    ['title' => 'User Management']
];
?>


<div id="main">
    <div class="row">
        <?php include(Yii::getAlias('@app/views/settings_menu/administration_settings.php')); ?>
        <div class="col-md-10 animate fadeRight" style="margin-top: -17px;">
            <div class="card mt-2">
                <div class="card-content">
                    <div class="localpurchaseorder-index">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
                                </div>
                                <div class="col-md-6" id="back_button_cls" style="text-align: end;display:none">
                                    <a class="btn btn-small waves-effect waves-light red" href="/bm-imprint/administration/index" title="Back">Back</a>
                                </div>
                            </div>
                            <hr />
                        </div>
                        <div class="animate fadeRight">

                            <?= $this->render('update_form', [
                                'model' => $model,
                                'subtitle' => 'Update User - ' . $model->name,
                                'user_id' => $model->id,
                            ]) ?>
                        </div>
                        <?php Pjax::begin(); ?>

                        <div class="cus-row" id="detail-view">
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
                                        'attribute' => 'username',
                                        'header' => '<span style="color:#2196f3;">Username</span>',
                                        'filterInputOptions' => [
                                            'class'       => '',
                                            'placeholder' => 'Search with Username...'
                                        ]
                                    ],
                                    [
                                        'attribute' => 'name',
                                        'header' => '<span style="color:#2196f3;">Name</span>',
                                        'filterInputOptions' => [
                                            'class'       => '',
                                            'placeholder' => 'Search with Name...'
                                        ]
                                    ],
                                    // [
                                    //     'attribute' => 'email',
                                    //     'header' => '<span style="color:#2196f3;">E-mail</span>',
                                    //     'filterInputOptions' => [
                                    //         'class'       => '',
                                    //         'placeholder' => 'Search with Email...'
                                    //     ]
                                    // ],
                                    [
                                        'attribute' => 'role',
                                        'value' => 'roles.role_name',
                                        'header' => '<span style="color:#2196f3;">User Role</span>',
                                        'filterInputOptions' => ['prompt' => 'Search With User Role....', 'style' => 'color:	#6c6666;', 'class' => 'form-control'],
                                        'filter' => ['10' => 'Admin', '11' => 'User'],

                                    ],

                                    [
                                        'class' => 'yii\grid\ActionColumn',
                                        'template' => '{update} ',
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
    $(document).ready(function() {
        $('#usermanagesearch-role').css('font-family', 'Muli');
    });

    function show_add_section() {
        $('#add_button_cls').hide();
        $('#back_button_cls').show();
        // $('#detail-view').hide();
        // $("#add_localpurchaseorder").toggle(500);
        $('#add_user').show();
    }
</script>