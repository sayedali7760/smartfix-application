<?php

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <?php $this->registerCsrfMetaTags() ?>
    <title>Smart-FX Application </title>
    <link rel="apple-touch-icon" href="#">
    <link rel="icon" href="#" type="image/ico">
    <link rel="shortcut icon" type="image/x-icon" href="#">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">


    <style>
        .help-block {
            color: #fd0b21;
        }

        .notify {
            background: #323232;
            border-radius: 3px;
            -webkit-box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
            color: #fff;
            display: inline-block;
            font-size: 14px;
            padding: 0.8rem 1.4rem;
            position: absolute;
            top: 0;
            right: 20px;
            transition: all 0.5s ease-in-out;
            transform-origin: left top;
            transform: scaleY(1);
            z-index: 3;
            margin-top: 140px;
        }

        .notify.-hidden {
            opacity: 0;
            transform: scaleY(0);
        }

        .alert-success-custom {
            margin: 10px;
            margin-left: 25px;
            margin-right: 25px;
            color: #ffffff;
            background-color: #36b755;
            border-color: #c3e6cb;
            height: 46px;
            border-radius: 11px;
            padding: 13px;
            font-weight: 800;
            margin-bottom: -5px;

        }

        .alert-danger-custom {
            margin: 10px;
            margin-left: 25px;
            margin-right: 25px;
            color: #ffffff;
            background-color: #cf6a73;
            border-color: #dd3b3b;
            height: 46px;
            border-radius: 11px;
            padding: 13px;
            font-weight: 800;
            margin-bottom: -5px;

        }

        #load {
            width: 100%;
            height: 100%;
            position: fixed;
            z-index: 9999;
            background: url("<?= Yii::$app->homeUrl ?>theme/images/loading.gif") no-repeat center center rgb(2 2 2 / 65%);
            background-size: 170px 120px;
            background-position: 50% 50%;
        }

        #load1 {
            width: 100%;
            height: 100%;
            position: fixed;
            z-index: 9999;
            background: url("<?= Yii::$app->homeUrl ?>theme/images/loading.gif") no-repeat center center rgb(2 2 2 / 65%);
            background-size: 170px 120px;
            background-position: 50% 50%;
        }
    </style>
    <?php $this->head() ?>
</head>

<body class="horizontal-layout page-header-light horizontal-menu preload-transitions 2-columns   " data-open="click" data-menu="horizontal-menu" data-col="2-columns">
    <?php include("_header.php"); ?>
    <?= Alert::widget() ?>
    <?= $content ?>

    <footer class="page-footer footer footer-static footer-dark gradient-45deg-light-blue-cyan gradient-shadow navbar-border navbar-shadow">
        <div class="footer-copyright">
            <div class="container"><span></span><span class="right hide-on-small-only">&copy; 2021 Benchmark</a> All rights reserved.</span></div>
        </div>
    </footer>


    <?php $this->endBody() ?>
    <script>
        document.onreadystatechange = function() {
            var state = document.readyState
            if (state == 'interactive') {
                document.getElementById('contents').style.visibility = "hidden";
            } else if (state == 'complete') {
                setTimeout(function() {
                    document.getElementById('interactive');
                    document.getElementById('load').style.visibility = "hidden";
                    document.getElementById('contents').style.visibility = "visible";
                }, 100);
            }
        }
        $(document).ready(function() {
            $(".alert-success").addClass('alert-success-custom');
            $(".alert-success").removeClass('alert');
            $(".alert-success").removeClass('alert-dismissible');
            $(".alert-success").removeClass('alert-success');
            $(".alert-success-custom").fadeOut(5000);

            $(".alert-danger").addClass('alert-danger-custom');
            $(".alert-danger").removeClass('alert');
            $(".alert-danger").removeClass('alert-dismissible');
            $(".alert-danger").removeClass('alert-danger');
            $(".alert-danger-custom").fadeOut(5000);

        });
        notifyPositionCalc = (notifyEl) => {
            let notiFyiers = $('.notify:not(.-hidden)')
            let notifyCounter = notiFyiers.length;
            if (!notifyEl) {
                notiFyiers.map((i, v) => {
                    $(v).css('top', (i - 1) * ($(v).outerHeight() + 10) + 'px');
                })
                return true;
            }

            if (notifyCounter >= 1) {
                notifyEl.css('top', (notifyCounter - 1) * (notifyEl.outerHeight() + 10) + 'px');
            }
        }
    </script>
</body>

</html>
<?php $this->endPage(); ?>