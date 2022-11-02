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
                $usermanagement = [
                    'usermanage/index',
                    'usermanage/update'
                ];
                $userroles = [
                    'userrole/index',
                    'userrole/update'
                ];
                if (in_array(Yii::$app->controller->module->requestedRoute, $usermanagement)) {
                    $usermanagement = "active";
                } else {
                    $usermanagement = "";
                }
                if (in_array(Yii::$app->controller->module->requestedRoute, $userroles)) {
                    $userroles = "active";
                } else {
                    $userroles = "";
                }

                ?>
                <a class="cus-a <?php echo $usermanagement; ?>" href="<?= Yii::$app->homeUrl ?>usermanage/index">
                    <p class="mt-4 box1"><i class="material-icons dp48" style="color: #e22bd4;">account_circle</i> User Management
                    </p>
                </a>
                <a class="cus-a <?php echo $userroles; ?>" href="<?= Yii::$app->homeUrl ?>userrole/index">
                    <p class="mt-4 box1"><i class="material-icons dp48" style="color: #19a111;">add_circle</i> User Roles
                    </p>
                </a>
            </div>
        </div>
    </div>
</div>
<script>

</script>