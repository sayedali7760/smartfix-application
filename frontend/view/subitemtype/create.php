<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Subitemtype */

$this->title = 'Create Subitemtype';
$this->params['breadcrumbs'][] = ['label' => 'Subitemtypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subitemtype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
