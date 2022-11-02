<script>
    function get_userpermissions() {
        $('.checkboxes').prop('checked', false);
        var user_role = $('#userrole-role_name').val();
        $.ajax({
            url: '<?php echo \Yii::$app->getUrlManager()->createUrl('userrole/get_user_permissions') ?>',
            type: 'POST',
            data: {
                user_role: user_role,
            },
            success: function(data) {
                $.each(data.main_menu, function(i, main_menu) {
                    $('#' + main_menu.main_menu_id).prop('checked', true);
                });
                $.each(data.sub_menu, function(i, sub_menu) {
                    $('#' + sub_menu.sub_menu_id).prop('checked', true);
                });
            }
        });
    }
</script>