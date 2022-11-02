<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;


?>



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
        width: 98%;
        height: 13px;
        border-radius: 10px;
        padding-left: 10px;
        padding-bottom: 10px;
        padding-top: 10px;
        margin-left: -2px;

    }

    a {
        text-decoration: none;
    }

    .invalid-feedback {
        color: #e11414;
        font-size: 13px;
    }

    label {
        font-size: 13px;
        font-weight: 700;
    }
</style>
<div class="site-request-password-reset">
    <h1><?= Html::encode($this->title) ?></h1>



    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
            <div style="margin-bottom: 10px;">
                <b style="font-size: 14px;">Username</b>
            </div>
            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'Enter Username', 'style' => 'background-color: #e8f0fe;', 'autocomplete' => 'off', 'class' => 'form-control'])->label(false); ?>

            <div class="form-group">
                <?= Html::submitButton('Send', ['class' => 'btn btn-primary', 'title' => 'Send']) ?>
            </div>
            <div class="form-group" style="text-align:left;font-size: 12px;    margin-bottom: 15px;float: right;">

                <div class="col-md-6" style="padding-bottom: 10px;">
                    <div style="float: right;padding-right:11px;">
                        <a href="index" title="Back to Login">
                            Back to Login</a>
                        <br>
                    </div>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>