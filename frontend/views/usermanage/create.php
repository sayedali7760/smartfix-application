<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usermanage */

$this->title = 'Create Usermanage';
$this->params['breadcrumbs'][] = ['label' => 'Usermanages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usermanage-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>