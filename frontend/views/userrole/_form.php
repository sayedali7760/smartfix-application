<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Userrole */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="userrole-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row cus-row">
        <div class="panel-heading col-md-12">
            <h3 class="card-title"><?= Html::encode($subtitle) ?></h3>
        </div>
        <div class="col-md-4">
            <label class="control-label">Role Name *</label>
            <?= $form->field($model, 'role_name')->textInput(['placeholder' => "Enter Role Name", 'maxlength' => 30, 'class' => 'alpha form-field'])->label(false) ?>
        </div>
        <div class="input-field col-md-12">
            <?= Html::submitButton('Save', ['class' => 'btn btn-small btn-success suc-btn', 'title' => ' Save', 'onclick' => 'set_disable()']) ?>
            <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-small waves-effect waves-light red', 'title' => ' Cancel'])
            ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<hr />
<script>
    $(document).ready(function() {
        $('.form-field').on('keyup keypress', function(e) {
            $(".suc-btn").removeClass('save-btn-disable');
        });
    });

    function set_disable() {
        $(".suc-btn").addClass('save-btn-disable');
    }
</script>