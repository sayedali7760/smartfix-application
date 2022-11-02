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
    ['link' => 'localpurchaseorder/index', 'title' => 'Administration'],
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
                                <div class="col-md-6" id="add_button_cls" style="text-align: end;">
                                    <?= Html::a('Add User', null, ['onclick' => 'show_add_section()', 'add', 'class' => 'btn btn-small', 'title' => Yii::t('app', 'Add User')])
                                    ?>
                                </div>
                                <div class="col-md-6" id="back_button_cls" style="text-align: end;display:none">
                                    <a class="btn btn-small waves-effect waves-light red" href="/bm-imprint/site/usermanagement" title="Back">Back</a>
                                </div>
                            </div>
                            <hr />
                        </div>
                        <div style="display: none;" id="add_user" class="animate fadeRight">

                            <?= $this->render('user_form', [
                                'model' => $model,
                                'subtitle' => 'Add User',
                            ]) ?>
                        </div>
                        <?php Pjax::begin(); ?>

                        <div class="cus-row" id="detail-view">
                            <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $searchModel,
                                'columns' => [
                                    ['class' => 'yii\grid\SerialColumn'],

                                    [
                                        'attribute' => 'username',
                                        'header' => '<span style="color:#2196f3;">Enquiry</span>',
                                    ],
                                    [
                                        'attribute' => 'name',
                                        'header' => '<span style="color:#2196f3;">Name</span>',
                                    ],
                                    [
                                        'attribute' => 'email',
                                        'header' => '<span style="color:#2196f3;">E-mail</span>',
                                    ],
                                    [
                                        'attribute' => 'role',
                                        'header' => '<span style="color:#2196f3;">User Role</span>',
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
    function show_add_section() {
        $('#add_button_cls').hide();
        $('#back_button_cls').show();
        // $('#detail-view').hide();
        // $("#add_localpurchaseorder").toggle(500);
        $('#add_user').show();
    }
</script>