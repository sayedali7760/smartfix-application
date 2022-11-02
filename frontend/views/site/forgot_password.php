<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Benchmark | Imprint';

$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="<?= Yii::$app->homeUrl ?>theme/images/logo/impress_logo_new.png">

<style>
    input[type='text']::placeholder {
        text-align: left;
        color: #787d83;

    }

    input[type='password']::placeholder {
        text-align: left;
        color: #787d83;

    }

    input[type='text'] {
        width: 121%;
        height: 13px;
        border-radius: 10px;
        padding-left: 10px;
        padding-bottom: 10px;
        padding-top: 10px;

    }

    input[type='password'] {
        width: 121%;
        height: 13px;
        border-radius: 10px;
        padding-left: 10px;
        padding-bottom: 10px;
        padding-top: 10px;

    }

    a {
        text-decoration: none;
    }

    .invalid-feedback {
        color: #e11414;
        font-size: 13px;
    }

    input:valid+label,
    input:focus+label {
        height: 20px;
        line-height: 20px;
        font-size: 11px;
        color: black;
    }

    input:valid+label,
    input:focus+label {
        height: 20px;
        line-height: 20px;
        font-size: 11px;
        /* color: #3046c5; */
    }
</style>

<?php $form = ActiveForm::begin(['id' => 'forgot_password']); ?>
<h6 style="text-align: center;font-size: 13px;color: #4449f9;"><?= Yii::$app->session->getFlash('message'); ?></h6>
<div style="margin-bottom: 10px;">
    <b style="font-size: 14px;">Password</b>
</div>
<div class="form-group">
    <?= $form->field($model, 'password')->passwordInput(['autocomplete' => 'off', "placeholder" => "Enter Password", 'style' => 'background-color: #e8f0fe;', 'maxlength' => 30, "class" => "form-control"])->label(false) ?>

</div>
<div style="margin-bottom: 10px;">
    <b style="font-size: 14px;">Confirm Password</b>
</div>
<div class="form-group">
    <?= Html::passwordInput('confirmpassword', '', array('autocomplete' => 'off', 'class' => 'form-control', 'style' => 'width: 108%;background-color: #e8f0fe;', 'placeholder' => 'Enter Password')) ?>
    <?php echo Html::hiddenInput('mail_id', $mail_id); ?>
</div>


<?= Html::submitButton('Reset', ['class' => 'btn btn-primary block full-width m-b', 'name' => 'login-button']) ?>
<br />
<?php ActiveForm::end(); ?>

<div class="form-group" style="top: 5px ;text-align: center;margin-left: 21px;">
    <p style="font-size:12px;"><b>Benchmark</b> &copy; <?php echo date('Y'); ?><?php echo '-Development'; ?>
    <p>
</div>



<style>
    .form-group {
        width: 89% !important;
    }

    .input-group-prepend {
        height: 34px !important;
    }
</style>