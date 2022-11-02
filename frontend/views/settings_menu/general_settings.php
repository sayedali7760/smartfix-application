<style>
    .cus-a {
        color: #383838;
    }

    .active {
        color: #0919d3;
        font-weight: 700;
    }
</style>
<?php
$page_url = Yii::$app->controller->module->requestedRoute;
?>

<div class="col-md-2 animate fadeLeft">
    <div class="card mt-2">
        <div class="card-content">
            <div class="category-list" style="padding-top:10px;">
                <?php
                $submenu_fileupload = [
                    'fileupload/index',
                    'fileupload/update',
                    'fileupload/view'
                ];

                if (in_array(Yii::$app->controller->module->requestedRoute, $submenu_fileupload)) {
                    $upload_class = "active";
                } else {
                    $upload_class = "";
                }

                ?>
                <?php if (in_array(1036, Yii::$app->session['permissions'])) { ?>
                    <a class="cus-a <?php echo $upload_class; ?>" href="<?= Yii::$app->homeUrl ?>fileupload/index">
                        <p class="mt-4 box1"><i class="material-icons dp48" style="color: #2be2d1;">business_center</i> Upload File
                        </p>
                    </a>
                <?php } ?>


            </div>
        </div>
    </div>
</div>
<script>

</script>