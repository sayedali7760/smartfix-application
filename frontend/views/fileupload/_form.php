<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

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
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row cus-row">
        <div class="panel-heading col-md-12">
            <h3 class="card-title"><?= Html::encode($subtitle) ?></h3>
        </div>
        <div class="col-md-4">
            <label class="control-label">Description *</label>
            <?= $form->field($model, 'description')->textInput(['placeholder' => "Enter Description", 'maxlength' => 30, 'class' => 'form-field'])->label(false) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'file_name')->fileInput(['style' => 'margin-top: 32px;'])->label('File') ?>
        </div>
        <div class="input-field col-md-12">
            <?= Html::submitButton('Save', ['class' => 'btn btn-small btn-success suc-btn', 'title' => 'Save', 'onclick' => 'set_disable()']) ?>
            <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-small waves-effect waves-light red', 'title' => 'Cancel'])
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