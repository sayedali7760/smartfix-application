<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'theme/site.css?ssss',
        'theme/new_design/css/style.css',
        'theme/vendors/vendors.min.css',
        'theme/css/themes/horizontal-menu-template/materialize.css',
        'theme/css/themes/horizontal-menu-template/style.css',
        'theme/css/layouts/style-horizontal.css',
        'theme/css/pages/dashboard.css',
        'theme/css/pages/page-faq.css',
        'theme/css/pages/page-faq.min.css',
        'theme/css/custom/custom.css',
        'theme/vendors/vendors.min.css',
        'theme/vendors/flag-icon/css/flag-icon.min.css',
        'theme/vendors/data-tables/css/jquery.dataTables.min.css',
        'theme/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css',
        'theme/vendors/data-tables/css/select.dataTables.min.css',
        'theme/css/select2/select2.min.css',
        'theme/css/select2/select2-bootstrap.css',
        'theme/css/wizard.css',
        'theme/css/pages/icon.css'

    ];
    public $js = [
        // 'theme/js/vendors.min.js',
        'theme/vendors/chartjs/chart.min.js',
        'theme/js/plugins.js',
        'theme/js/search.js',
        'theme/js/custom/custom-script.js',
        'theme/js/scripts/dashboard-ecommerce.js',
        'theme/vendors/data-tables/js/jquery.dataTables.min.js',
        'theme/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js',
        'theme/vendors/data-tables/js/dataTables.select.min.js',
        'theme/js/select2/select2.min.js',
        'theme/js/logout.js',
        'theme/js/prevent_duplicate.js',
        // 'theme/css/wizard.js',
    ];
    public $depends = [
        // 'yii\web\JqueryAsset',
        //'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
