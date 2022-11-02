<?php

use common\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\helpers\Html;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?>
    </title>

    <link rel="shortcut icon" href="#" />
    <link rel="stylesheet" href="<?= Yii::$app->homeUrl ?>theme/css/login.css">
    <?php $this->head() ?>
</head>


<body>
    <?php $this->beginBody() ?>
    <div class="login-box">
        <img src="<?= Yii::$app->homeUrl ?>theme/images/logo/logo_footer.svg" style="height: 125px;padding-left: 92px;">
        <h6 style="text-align: center;font-size: 13px;color: #4449f9;"><?= Yii::$app->session->getFlash('success'); ?></h6>

        <div class="in-down">
            <?= $content ?>
        </div>


    </div>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
