<?php


use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Smart-FX | Application';

$this->params['breadcrumbs'][] = $this->title;
const BM_GOOGLE_CLIENT_ID = '116197081390-bm9pam7494g1ahhv2e6qc6e43a5p2a4j.apps.googleusercontent.com';
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
		width: 127%;
		height: 13px;
		border-radius: 10px;
		padding-left: 10px;
		padding-bottom: 10px;
		padding-top: 10px;

	}

	input[type='password'] {
		width: 127%;
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
</style>
<script src="https://accounts.google.com/gsi/client" async defer></script>
<div id="g_id_onload" data-client_id="<?php echo BM_GOOGLE_CLIENT_ID ?>" data-login_uri="<?= Yii::$app->homeUrl ?>site/glogin" data-your_own_param_1_to_login="test" data-your_own_param_2_to_login="test">
</div>
<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
<div style="margin-bottom: 10px;">
	<b style="font-size: 14px;">Username</b>
</div>
<div class="form-group">
	<?= $form->field($model, 'username')->textInput(['autocomplete' => 'off', "placeholder" => "Enter Username", 'style' => 'background-color: #e8f0fe;', 'maxlength' => 30, 'class' => "form-control"])->label(false) ?>
</div>
<div style="margin-bottom: 10px;">
	<b style="font-size: 14px;">Password</b>
</div>
<div class="form-group">
	<?= $form->field($model, 'password')->passwordInput(['autocomplete' => 'off', "placeholder" => "Enter Password", 'style' => 'background-color: #e8f0fe;', 'maxlength' => 30, "class" => "form-control"])->label(false) ?>

</div>


<?= Html::submitButton('Login', ['class' => 'btn btn-primary block full-width m-b', 'title' => 'Login', 'name' => 'login-button']) ?>
<br />
<br />
<div class="g_id_signin" data-client_id="<?php echo BM_GOOGLE_CLIENT_ID ?>" data-login_uri="<?= Yii::$app->homeUrl ?>site/glogin" data-ux_mode="redirect" data-width="320" data-type="standard" data-size="large" data-theme="filled_blue" data-text="sign_in_with" data-shape="rectangular" data-logo_alignment="left">
</div>
<?php ActiveForm::end(); ?>

<div class="form-group" style="top: 5px ;text-align: center;margin-left: 21px;">
	<a style="display: none;" href="site/requestpasswordreset" style="font-size: 12px;">Forgot Password?</a>
	<p style="font-size:12px;"><b>SmartFX</b> &copy; <?php echo date('Y'); ?> v1.0.1<?php echo '-Development'; ?>
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