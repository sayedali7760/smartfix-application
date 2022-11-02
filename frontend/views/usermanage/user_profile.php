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

$this->title = 'Manage Profile';
$this->params['main_menu'][] = 'Manage Profile';
$this->params['breadcrump'][] = [
    ['link' => 'site/index', 'title' => 'Home'],
    ['link' => 'usermanage/userprofile', 'title' => 'Settings'],
    ['title' => 'Manage Profile']
];
?>


<div id="main">
    <div class="row">
        <!-- <div class="col-md-2 animate fadeLeft">
            <div class="card mt-2">
                <div class="card-content">
                    <div class="category-list" style="padding-top:10px;">
                        <a class="cus-a active" href="<?= Yii::$app->homeUrl ?>salesperson/index">
                            <p class="mt-4 box1"><i class="material-icons dp48" style="color: blue;">settings</i> Manage Profile
                            </p>
                        </a>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-md-12 animate fadeRight" style="margin-top: -17px;">
            <div class="card mt-2">
                <div class="card-content">
                    <div class="localpurchaseorder-index">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
                                </div>
                            </div>
                            <hr />
                        </div>
                        <div class="row">

                            <div class="col s12">
                                <div class="container">
                                    <div class="section users-view">
                                        <div class="card-panel" style="border-radius: 15px;">
                                            <div class="row">
                                                <div class="col s12 m7">
                                                    <div class="display-flex media">
                                                        <a href="#" class="avatar">
                                                            <img src="<?= Yii::$app->homeUrl ?>theme/images/new_avatar.jpeg" alt="users view avatar" class="z-depth-4 circle" height="64" width="64">
                                                        </a>
                                                        <div class="media-body" style="margin-left: 20px;">
                                                            <h6 class="media-heading">
                                                                <span class="users-view-name"><?php print_r(Yii::$app->user->identity->name); ?></span><br />
                                                                <span class="grey-text" style="font-size: 13px;">@</span>
                                                                <span class="users-view-username grey-text" style="font-size: 13px;"><?php print_r(Yii::$app->user->identity->username); ?></span>
                                                            </h6>
                                                            <!-- <span>ID:</span>
                                                                    <span class="users-view-id"></span> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="col s12 m5 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                                                    <a href="javascript:void(0)" class="cursor btn btn-small btn-success" title="Change Password">Change Password</a>
                                                </div> -->
                                            </div>

                                            <div class="row" style="margin-top: 20px;">
                                                <div class="panel-heading col-md-12">
                                                    <h3 class="card-title">Change Password</h3>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label">Old Password *</label>
                                                    <?php echo Html::textInput('old_password', '', array('id' => 'old_password', 'placeholder' => 'Enter Old Password', 'maxlength' => 30, 'class' => 'form-controls cus-field')); ?>
                                                    <?php echo Html::hiddenInput('current_pass', Yii::$app->user->identity->real_password, array('id' => 'current_pass')); ?>
                                                    <div id="old_password_error_div" class="cus-error" style="color: #a94442;"></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label">New Password *</label>
                                                    <?php echo Html::textInput('new_password', '', array('id' => 'new_password', 'placeholder' => 'Enter New Password', 'maxlength' => 30, 'class' => 'form-controls cus-field')); ?>
                                                    <div id="new_password_error_div" class="cus-error" style="color: #a94442;"></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label">Confirm Password *</label>
                                                    <?php echo Html::textInput('con_password', '', array('id' => 'con_password', 'placeholder' => 'Enter Confirm Password', 'maxlength' => 30, 'class' => 'form-controls cus-field')); ?>
                                                    <div id="con_password_error_div" class="cus-error" style="color: #a94442;"></div>
                                                </div>
                                                <div class="input-field col-md-12">
                                                    <button type="submit" class="btn btn-small btn-success suc-btn" title="Save" onclick="update_password()">Save</button> <a class="btn btn-small waves-effect waves-light red" href="/bm-imprint/jobtype/index" title="Cancel">Cancel</a>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

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

        function update_password() {
            var password = $('#new_password');
            var con_password = $('#con_password');
            var current_pass = $('#current_pass').val();
            var old_password = $('#old_password');

            var error = 0;
            var text = '';
            $('.cus-field').css("border-color", "");
            $('.cus-error').text("");

            if (old_password.val() == "") {
                old_password.css("border-color", "#9e9e9e94");
                $('#old_password_error_div').text("Old Password cannot be blank.");
                error++;
            } else {
                if (old_password.val() != current_pass) {
                    old_password.css("border-color", "#9e9e9e94");
                    $('#old_password_error_div').text("Please enter correct password.");
                    error++;
                }
            }
            if (password.val() == "") {
                password.css("border-color", "#9e9e9e94");
                $('#new_password_error_div').text("Password cannot be blank.");
                error++;
            }
            if (con_password.val() == "") {
                con_password.css("border-color", "#9e9e9e94");
                $('#con_password_error_div').text("Confirm Password cannot be blank.");
                error++;
            }
            if (con_password.val() != password.val()) {
                con_password.css("border-color", "#9e9e9e94");
                $('#con_password_error_div').text("Password and Confirm Password must be same.");
                error++;
            }
            if (error != 0) {
                $('#load1').hide();
                $('.help-block').hide();
                return false;
            }
            $.ajax({
                url: '<?php echo \Yii::$app->getUrlManager()->createUrl('usermanage/userprofile') ?>',
                type: 'POST',
                data: {
                    con_password: con_password.val(),
                },
                success: function(data) {
                    location.reload();
                }
            });
        }
    </script>