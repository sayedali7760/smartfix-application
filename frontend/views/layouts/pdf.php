<?php

/* @var $this \yii\web\View */
/* @var $content string */
 
use frontend\assets\AppAsset; 
// use yii\bootstrap4\Html;
use yii\helpers\Html;
// use yii\bootstrap4\Nav;
// use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title>Benchmark Garage - <?= Html::encode($this->title) ?></title>
    <!-- Vendors Style-->
    <link rel="stylesheet" href="<?= Yii::$app->homeUrl ?>theme/css/style.css?ffsd">
    <link rel="stylesheet" href="<?= Yii::$app->homeUrl ?>theme/css/vendors_css.css?11">
    <!-- Style-->
    <link rel="stylesheet" href="<?= Yii::$app->homeUrl ?>theme/css/skin_color.css?33">
    <?php $this->head() ?>
</head>

<body   >
 
 
                <?= $content ?>
 

    <!-- Vendor JS -->
    <script src="<?= Yii::$app->homeUrl ?>theme/js/vendors.min.js"></script>
    <script src="<?= Yii::$app->homeUrl ?>theme/assets/icons/feather-icons/feather.min.js"></script>

    <script src="<?= Yii::$app->homeUrl ?>theme/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>
    <script src="<?= Yii::$app->homeUrl ?>theme/assets/vendor_components/moment/min/moment.min.js"></script>
    <script src="<?= Yii::$app->homeUrl ?>theme/assets/vendor_components/fullcalendar/fullcalendar.js"></script>

    <!-- EduAdmin App -->
    <script src="<?= Yii::$app->homeUrl ?>theme/js/template.js"></script>
    <?php if(Yii::$app->controller->id == 'site'){ ?> 
    <script src="<?= Yii::$app->homeUrl ?>theme/js/pages/dashboard.js"></script>
    <script src="<?= Yii::$app->homeUrl ?>theme/js/pages/calendar.js"></script>
    <script src="<?= Yii::$app->homeUrl ?>theme/js/pages/dashboard2.js"></script>
    <?php } ?> 
</body>

</html>
<?php $this->endPage(); ?>