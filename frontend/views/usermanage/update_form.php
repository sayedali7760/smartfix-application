<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Userrole;

?>
<style>
    .has-success .select2-container--krajee .select2-selection {
        border-color: none !important;
        box-shadow: none;

    }

    .select2-selection {
        border-color: #ced4da !important;
        box-shadow: none !important;
    }

    .has-success .control-label {
        color: #9e9e9e !important;
    }

    .has-error .control-label {
        color: #9e9e9e !important;
    }

    .required label:after {
        /* color: red; */
        content: ' *';

    }
</style>
<div class="job-type-form">
    <?php $form = ActiveForm::begin([
        'id' => 'user_add_form',
        'options' => [
            'enctype' => 'multipart/form-data'
        ]
    ]); ?>

    <div class="row cus-row">
        <div class="panel-heading col-md-12">
            <h3 class="card-title"><?= Html::encode($subtitle) ?></h3>
        </div>
        <div class="col-md-4">
            <label class="control-label">Username *</label>
            <?php echo Html::hiddenInput('user_id', $user_id, array('id' => 'user_id')); ?>
            <?= $form->field($model, 'username')->textInput(['readonly' => 'true', 'style' => 'background-color: #f4f5f7;', 'placeholder' => "Enter Username", 'maxlength' => 50, 'class' => 'cus-field'])->label(false); ?>
            <div id="usermanage-username_error_div" class="cus-error" style="color: #a94442;"></div>
        </div>
        <!-- <div class="col-md-4">
            <label class="control-label">Email *</label>
            <? //= $form->field($model, 'email')->textInput(['placeholder' => "Enter Email", 'maxlength' => 50, 'class' => 'cus-field'])->label(false); 
            ?>
            <div id="usermanage-email_error_div" class="cus-error" style="color: #a94442;"></div>
        </div> -->
        <div class="col-md-4">
            <label class="control-label">Name *</label>
            <?= $form->field($model, 'name')->textInput(['placeholder' => "Enter Name", 'maxlength' => 30, 'class' => 'cus-field alphanumeric'])->label(false); ?>
            <div id="usermanage-name_error_div" class="cus-error" style="color: #a94442;"></div>
        </div>
        <div class="col-md-4">
            <label class="control-label">Role *</label>
            <?= $form->field($model, 'role')->widget(Select2::className(), [
                'model' => $model,
                'attribute' => 'role',
                'data' => ArrayHelper::map(Userrole::find()->all(), 'id', 'role_name'),

            ])->label(false); ?>
        </div>
        <div class="col-md-4">
            <label class="control-label">Password *</label>
            <?php echo Html::textInput('password', '', array('id' => 'password', 'style' => '-webkit-text-security: disc;', 'placeholder' => 'Enter Password', 'maxlength' => 30, 'class' => 'form-controls cus-field')); ?>
            <div id="password_error_div" class="cus-error" style="color: #a94442;"></div>
        </div>
        <div class="col-md-4">
            <label class="control-label">Confirm Password *</label>
            <?php echo Html::textInput('con_password', '', array('id' => 'con_password', 'style' => '-webkit-text-security: disc;', 'placeholder' => 'Enter Confrim Password', 'maxlength' => 30, 'class' => 'form-controls cus-field')); ?>
            <div id="con_password_error_div" class="cus-error" style="color: #a94442;"></div>
        </div>

        <div class="input-field col-md-12">
            <?= Html::a('Update', null, ['onclick' => 'update_user()', 'add', 'class' => 'cursor btn btn-small btn-success', 'title' => Yii::t('app', 'Update')])
            ?>
            <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-small waves-effect waves-light red', 'title' => 'Cancel'])
            ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<hr />
<script>
    function update_user() {
        var user_id = $('#user_id').val();
        var user_role = $('#usermanage-role').val();
        var username = $('#usermanage-username');
        //var email = $('#usermanage-email');
        var name = $('#usermanage-name');
        var password = $('#password');
        var con_password = $('#con_password');

        var data = $('#user_add_form').serializeArray();

        var error = 0;
        var text = '';
        $('.cus-field').css("border-color", "");
        $('.cus-error').text("");

        if (username.val() == "") {
            username.css("border-color", "#9e9e9e94");
            $('#usermanage-username_error_div').text("Username cannot be blank.");
            error++;
        }
        // if (email.val() == "") {
        //     email.css("border-color", "#9e9e9e94");
        //     $('#usermanage-email_error_div').text("Email cannot be blank.");
        //     error++;
        // }
        if (name.val() == "") {
            name.css("border-color", "#9e9e9e94");
            $('#usermanage-name_error_div').text("Name cannot be blank.");
            error++;
        }
        if (password.val() == "") {
            password.css("border-color", "#9e9e9e94");
            $('#password_error_div').text("Password cannot be blank.");
            error++;
        }
        if (con_password.val() == "") {
            con_password.css("border-color", "#9e9e9e94");
            $('#con_password_error_div').text("Confirm Password cannot be blank.");
            error++;
        } else {
            if (con_password.val() != password.val()) {
                con_password.css("border-color", "#9e9e9e94");
                $('#con_password_error_div').text("Password and Confirm Password must be same.");
                error++;
            }
        }

        if (error != 0) {
            return false;
        }

        $.ajax({
            url: '<?php echo \Yii::$app->getUrlManager()->createUrl('usermanage/update_user') ?>',
            type: 'POST',
            data: {
                username: username.val(),
                //email: email.val(),
                name: name.val(),
                password: password.val(),
                user_id: user_id,
                user_role: user_role
            },
            success: function(data) {

            }
        });
    }
</script>