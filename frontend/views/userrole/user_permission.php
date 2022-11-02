<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\UserroleSearch;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Permission';
$this->params['main_menu'][] = 'Administration';
$this->params['breadcrump'][] = [
    ['link' => 'site/index', 'title' => 'Home'],
    ['link' => 'usermanage/index', 'title' => 'Administration'],
    ['title' => 'User Permission']
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
                        <div class="animate fadeRight">
                            <div class="userpermission-form">

                                <?php $form = ActiveForm::begin(); ?>

                                <div class="row cus-row">
                                    <div class="panel-heading col-md-12">
                                        <h3 class="card-title">Setup User Permission</h3>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label">Role Name *</label>
                                        <?= $form->field($model, 'role_name')->widget(Select2::className(), [
                                            'model' => $model,
                                            'attribute' => 'role_name',
                                            'data' => ArrayHelper::map(UserroleSearch::find()->where(['is_active' => '1'])->orderBy('role_name ASC')->asArray()->all(), 'id', function ($model) {
                                                return  $model['role_name'];
                                            }),
                                            'options' => ['onchange' => 'get_userpermissions()', 'prompt' => 'Select Role Name'],
                                            'pluginOptions' => [
                                                'tags' => false,
                                            ],
                                        ])->label(false); ?>

                                    </div>
                                    <div class="col-md-8">
                                        <div class="row cus-row" style="padding-left: 51px;height: 310px;overflow: scroll;">
                                            <input type="checkbox" class="checkboxes" id="1" value="1">
                                            <label class="control-label">&nbsp;Work Process</label>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1001" value="1001">
                                                <label class="control-label">Work Enquiry</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1002" value="1002">
                                                <label class="control-label">Work Estimation</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1003" value="1003">
                                                <label class="control-label">Estimation Cancel</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1004" value="1004">
                                                <label class="control-label">Quotation</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1005" value="1005">
                                                <label class="control-label">LPO</label>
                                            </div>


                                            <input type="checkbox" class="checkboxes" id="2" value="2">
                                            <label class="control-label">&nbsp;Job Processing</label>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1006" value="1006">
                                                <label class="control-label">Job Order</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1007" value="1007">
                                                <label class="control-label">Job Status Updation</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1008" value="1008">
                                                <label class="control-label">Job Cancellation</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1009" value="1009">
                                                <label class="control-label">Search Joborder</label>
                                            </div>


                                            <input type="checkbox" class="checkboxes" id="3" value="3">
                                            <label class="control-label">&nbsp;Bills & Credit Details</label>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1010" value="1010">
                                                <label class="control-label">Credit Limit</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1011" value="1011">
                                                <label class="control-label">Credit Period Edit</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1012" value="1012">
                                                <label class="control-label">Delivery Notes</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1013" value="1013">
                                                <label class="control-label">Invoice</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1014" value="1014">
                                                <label class="control-label">Commission Status</label>
                                            </div>



                                            <input type="checkbox" class="checkboxes" id="4" value="4">
                                            <label class="control-label">&nbsp;Reports</label>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1015" value="1015">
                                                <label class="control-label">Work Status Report</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1016" value="1016">
                                                <label class="control-label">Quotation Reprint</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1017" value="1017">
                                                <label class="control-label">Work of Salesperson</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1018" value="1018">
                                                <label class="control-label">Work Details</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1019" value="1019">
                                                <label class="control-label">Delivery Notes Reprint</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1020" value="1020">
                                                <label class="control-label">Invoice Reprint</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1021" value="1021">
                                                <label class="control-label">Job Order Reprint</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1022" value="1022">
                                                <label class="control-label">Cancelled Jobs</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1023" value="1023">
                                                <label class="control-label">Sales person Cust. Details</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1024" value="1024">
                                                <label class="control-label">Pending Jobs</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1025" value="1025">
                                                <label class="control-label">Cust. Job Details</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1026" value="1026">
                                                <label class="control-label">Sales Report of Salesperson</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1027" value="1027">
                                                <label class="control-label">Job Cost Estimation</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1028" value="1028">
                                                <label class="control-label">Work Estimation Report</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1029" value="1029">
                                                <label class="control-label">QTN. in Selected Date</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1030" value="1030">
                                                <label class="control-label">INV. in Selected Date</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1031" value="1031">
                                                <label class="control-label">INV Details by search</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1032" value="1032">
                                                <label class="control-label">INV Commission Details</label>
                                            </div>


                                            <input type="checkbox" class="checkboxes" id="5" value="5">
                                            <label class="control-label">&nbsp;Customer</label>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1033" value="1033">
                                                <label class="control-label">Customer Type</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1034" value="1034">
                                                <label class="control-label">Customer Info</label>
                                            </div>



                                            <input type="checkbox" class="checkboxes" id="6" value="6">
                                            <label class="control-label">&nbsp;Sales Person</label>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1035" value="1035">
                                                <label class="control-label">Salesperson Details</label>
                                            </div>


                                            <input type="checkbox" class="checkboxes" id="7" value="7">
                                            <label class="control-label">&nbsp;General Settings</label>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1036" value="1036">
                                                <label class="control-label">Job Types</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1037" value="1037">
                                                <label class="control-label">Country</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1038" value="1038">
                                                <label class="control-label">Emirates Details</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1039" value="1039">
                                                <label class="control-label">Region</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1040" value="1040">
                                                <label class="control-label">Paper Type</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1041" value="1041">
                                                <label class="control-label">Mail Configuration</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1042" value="1042">
                                                <label class="control-label">Mail Contact</label>
                                            </div>



                                            <input type="checkbox" class="checkboxes" id="8" value="8">
                                            <label class="control-label">&nbsp;Administration</label>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1043" value="1043">
                                                <label class="control-label">User Management</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1044" value="1044">
                                                <label class="control-label">User Roles</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1045" value="1045">
                                                <label class="control-label">User Permission</label>
                                            </div>


                                            <input type="checkbox" class="checkboxes" id="9" value="9">
                                            <label class="control-label">&nbsp;Stock Management</label>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1046" value="1046">
                                                <label class="control-label">Item Type Entry</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1047" value="1047">
                                                <label class="control-label">Item Sub Type</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1048" value="1048">
                                                <label class="control-label">Unit Settings</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1049" value="1049">
                                                <label class="control-label">Item Details Entry</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1050" value="1050">
                                                <label class="control-label">Opening Stock</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1051" value="1051">
                                                <label class="control-label">Stock Adjustment</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1052" value="1052">
                                                <label class="control-label">Supply Request</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1053" value="1053">
                                                <label class="control-label">Supply Entry</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1054" value="1054">
                                                <label class="control-label">Purhase Order-Material</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1055" value="1055">
                                                <label class="control-label">Purhase Entry-Material</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1056" value="1056">
                                                <label class="control-label">Purhase Order-Misc</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1057" value="1057">
                                                <label class="control-label">Purhase Entry-Misc</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1058" value="1058">
                                                <label class="control-label">Misc-Purchase Stock</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1059" value="1059">
                                                <label class="control-label">Inter Godown Transfer</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1060" value="1060">
                                                <label class="control-label">Machine Settings</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1061" value="1061">
                                                <label class="control-label">Machine Stock Allocation</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="checkboxes" id="1062" value="1062">
                                                <label class="control-label">Stock Report</label>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php include(Yii::getAlias('@app/views/userrole/util.php')); ?>
<script>
    $(document).ready(function() {
        $('.checkboxes').on('change', function() {
            var menu_id = this.value;
            var user_role = $('#userrole-role_name').val();
            if (user_role == '') {
                Swal.fire('', 'Please select Role Name.', 'info');
                $(this).prop('checked', false);
                return false;
            }
            if (this.checked) {
                if (menu_id == 1) {
                    var sub_menu_ids = [1001, 1002, 1003, 1004, 1005];
                    $.each(sub_menu_ids, function(index, value) {
                        $('#' + value).prop('checked', true);
                    });
                }
                if (menu_id == 2) {
                    var sub_menu_ids = [1006, 1007, 1008, 1009];
                    $.each(sub_menu_ids, function(index, value) {
                        $('#' + value).prop('checked', true);
                    });
                }
                if (menu_id == 3) {
                    var sub_menu_ids = [1010, 1011, 1012, 1013, 1014];
                    $.each(sub_menu_ids, function(index, value) {
                        $('#' + value).prop('checked', true);
                    });
                }
                if (menu_id == 4) {
                    var sub_menu_ids = [1015, 1016, 1017, 1018, 1019, 1020, 1021, 1022, 1023, 1024, 1025, 1026, 1027, 1028, 1029, 1030, 1031, 1032];
                    $.each(sub_menu_ids, function(index, value) {
                        $('#' + value).prop('checked', true);
                    });
                }
                if (menu_id == 5) {
                    var sub_menu_ids = [1033, 1034];
                    $.each(sub_menu_ids, function(index, value) {
                        $('#' + value).prop('checked', true);
                    });
                }
                if (menu_id == 6) {
                    var sub_menu_ids = [1035];
                    $.each(sub_menu_ids, function(index, value) {
                        $('#' + value).prop('checked', true);
                    });
                }
                if (menu_id == 7) {
                    var sub_menu_ids = [1036, 1037, 1038, 1039, 1040, 1041, 1042];
                    $.each(sub_menu_ids, function(index, value) {
                        $('#' + value).prop('checked', true);
                    });
                }
                if (menu_id == 8) {
                    var sub_menu_ids = [1043, 1044, 1045];
                    $.each(sub_menu_ids, function(index, value) {
                        $('#' + value).prop('checked', true);
                    });
                }
                if (menu_id == 9) {
                    var sub_menu_ids = [1046, 1047, 1048, 1049, 1050, 1051, 1052, 1053, 1054, 1055, 1056, 1057, 1058, 1059, 1060, 1061, 1062];
                    $.each(sub_menu_ids, function(index, value) {
                        $('#' + value).prop('checked', true);
                    });
                }
                if (menu_id == 1 || menu_id == 2 || menu_id == 3 || menu_id == 4 || menu_id == 5 || menu_id == 6 || menu_id == 7 || menu_id == 8 || menu_id == 9) {
                    $.ajax({
                        url: '<?php echo \Yii::$app->getUrlManager()->createUrl('userrole/insert_user_permission_group') ?>',
                        type: 'POST',
                        data: {
                            menu_id: menu_id,
                            sub_menu: sub_menu_ids,
                            user_role: user_role,
                        },
                        success: function(data) {}
                    });
                } else {
                    $.ajax({
                        url: '<?php echo \Yii::$app->getUrlManager()->createUrl('userrole/update_user_permission') ?>',
                        type: 'POST',
                        data: {
                            menu_id: menu_id,
                            user_role: user_role,
                            status: 1 //Insert
                        },
                        success: function(data) {}
                    });
                }
            } else {

                if (menu_id == 1) {
                    var sub_menu_ids = [1001, 1002, 1003, 1004, 1005];
                    $.each(sub_menu_ids, function(index, value) {
                        $('#' + value).prop('checked', false);
                    });
                }
                if (menu_id == 2) {
                    var sub_menu_ids = [1006, 1007, 1008, 1009];
                    $.each(sub_menu_ids, function(index, value) {
                        $('#' + value).prop('checked', false);
                    });
                }
                if (menu_id == 3) {
                    var sub_menu_ids = [1010, 1011, 1012, 1013, 1014];
                    $.each(sub_menu_ids, function(index, value) {
                        $('#' + value).prop('checked', false);
                    });
                }
                if (menu_id == 4) {
                    var sub_menu_ids = [1015, 1016, 1017, 1018, 1019, 1020, 1021, 1022, 1023, 1024, 1025, 1026, 1027, 1028, 1029, 1030, 1031, 1032];
                    $.each(sub_menu_ids, function(index, value) {
                        $('#' + value).prop('checked', false);
                    });
                }
                if (menu_id == 5) {
                    var sub_menu_ids = [1033, 1034];
                    $.each(sub_menu_ids, function(index, value) {
                        $('#' + value).prop('checked', false);
                    });
                }
                if (menu_id == 6) {
                    var sub_menu_ids = [1035];
                    $.each(sub_menu_ids, function(index, value) {
                        $('#' + value).prop('checked', false);
                    });
                }
                if (menu_id == 7) {
                    var sub_menu_ids = [1036, 1037, 1038, 1039, 1040, 1041, 1042];
                    $.each(sub_menu_ids, function(index, value) {
                        $('#' + value).prop('checked', false);
                    });
                }
                if (menu_id == 8) {
                    var sub_menu_ids = [1043, 1044, 1045];
                    $.each(sub_menu_ids, function(index, value) {
                        $('#' + value).prop('checked', false);
                    });
                }
                if (menu_id == 9) {
                    var sub_menu_ids = [1046, 1047, 1048, 1049, 1050, 1051, 1052, 1053, 1054, 1055, 1056, 1057, 1058, 1059, 1060, 1061, 1062];
                    $.each(sub_menu_ids, function(index, value) {
                        $('#' + value).prop('checked', false);
                    });
                }
                if (menu_id == 1 || menu_id == 2 || menu_id == 4 || menu_id == 5 || menu_id == 6 || menu_id == 7 || menu_id == 8 || menu_id == 9) {
                    $.ajax({
                        url: '<?php echo \Yii::$app->getUrlManager()->createUrl('userrole/delete_user_permission_group') ?>',
                        type: 'POST',
                        data: {
                            menu_id: menu_id,
                            sub_menu: sub_menu_ids,
                            user_role: user_role,
                        },
                        success: function(data) {}
                    });
                } else {
                    $.ajax({
                        url: '<?php echo \Yii::$app->getUrlManager()->createUrl('userrole/update_user_permission') ?>',
                        type: 'POST',
                        data: {
                            menu_id: menu_id,
                            user_role: user_role,
                            status: 2 // Delete
                        },
                        success: function(data) {}
                    });
                }
            }
        });
    });
</script>