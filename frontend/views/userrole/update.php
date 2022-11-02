<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\switchinput\SwitchInput;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Role';
$this->params['main_menu'][] = 'Administration';
$this->params['breadcrump'][] = [
    ['link' => 'site/index', 'title' => 'Home'],
    ['link' => 'usermanage/index', 'title' => 'Administration'],
    ['title' => 'User Role']
];
?>
<style>
    .curs a {
        cursor: default;
    }
</style>
<div id="main">
    <div class="row">
        <?php include(Yii::getAlias('@app/views/settings_menu/administration_settings.php')); ?>
        <div class="col-md-10 animate fadeRight" style="margin-top: -17px;">
            <div class="card mt-2">
                <div class="card-content">
                    <div class="country-index">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
                                </div>
                            </div>
                            <hr />
                        </div>
                        <div id="userrole-update" class="animate fadeRight">
                            <?= $this->render('_form', [
                                'model' => $model,
                                'subtitle' => 'Update User Role - ' . $model->role_name,
                            ]) ?>
                        </div>
                        <?php Pjax::begin(); ?>
                        <?php // echo $this->render('_search', ['model' => $searchModel]); 
                        ?>
                        <div class="cus-row">
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
                                        'header' => '<span style="color:#2196f3;">Role Name</span>',
                                        'attribute' =>  'role_name',
                                        'label' => 'Role Name',
                                        'filterInputOptions' => [
                                            'placeholder' => 'Search with Role Name...'
                                        ],
                                        'headerOptions' => ['class' => 'curs'],
                                    ],
                                    [
                                        'attribute' => 'is_active',
                                        'header' => '<span style="color:#2196f3;">Status</span>',
                                        'format' => 'raw',
                                        'contentOptions' => ['style' => 'text-align:center'],
                                        'value' => function ($data) {
                                            return SwitchInput::widget(
                                                [
                                                    'name' => 'status_11',
                                                    'pluginEvents' => [
                                                        'switchChange.bootstrapSwitch' => "function(e){sendRequest(e.currentTarget.checked, $data->id);}"
                                                    ],

                                                    'pluginOptions' => [
                                                        'size' => 'mini',
                                                        'onColor' => 'success',
                                                        'offColor' => 'danger',
                                                        'onText' => 'ON',
                                                        'offText' => 'OFF'
                                                    ],

                                                    'value' => $data->is_active
                                                ]
                                            );
                                        }
                                    ],
                                    [
                                        'class' => 'yii\grid\ActionColumn',
                                        'template' => '{update}',
                                        'buttons' => [
                                            'delete' => function ($url, $data) {
                                                return Html::a('<span title="Delete"><i class="material-icons dp48">delete</i></span>', ['#', 'id' => $data->id], [
                                                    'class' => '',
                                                    'onclick' => 'delete_country(' . $data->id . ')',

                                                ]);
                                            }
                                        ],
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
    function sendRequest(status, id) {
        $.ajax({
            url: '<?php echo Yii::$app->request->baseUrl . '/userrole/status' ?>',
            method: 'post',
            data: {
                status: status,
                id: id,
            },
            success: function(data) {
                Swal.fire({
                    title: 'Success',
                    text: data,
                    icon: 'success',
                    // showCancelButton: true,
                    confirmButtonColor: '#45c5bc',
                    allowOutsideClick: false,
                    // cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                })
            },
            error: function(jqXhr, status, error) {
                Swal.fire(
                    'Info!',
                    error,
                    'info'
                )
                return true;
            }
        });
    }
</script>