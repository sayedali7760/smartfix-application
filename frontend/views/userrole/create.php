<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Userrole */

$this->title = 'Create Userrole';
$this->params['breadcrumbs'][] = ['label' => 'Userroles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userrole-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
