<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bm_role".
 *
 * @property int $id
 * @property string $role_name
 * @property string $is_active
 *
 * @property BmUser[] $bmUsers
 */
class Userrole extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'bm_role';
    }

    public function rules()
    {
        return [
            [['role_name'], 'required'],
            [['role_name'], 'unique'],
            //[['is_active'], 'string'],
            [['role_name'], 'string', 'max' => 100],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_name' => 'Role Name',
            'is_active' => 'Status',
        ];
    }


    public function status()
    {
        $active = $_POST['status'];
        $id = $_POST['id'];
        if ($active == 'false') {
            $status = Yii::$app->db->createCommand('UPDATE bm_role SET is_active=0 WHERE id=' . $id);
        } else {
            $status = Yii::$app->db->createCommand('UPDATE bm_role SET is_active=1 WHERE id=' . $id);
        }
        if ($status->execute()) {
            return true;
        }
        return false;
    }
    public function update_user_permission($data)
    {
        // $user_role = Yii::$app->user->identity->role;
        // Greater 1000 Submenuids
        if ($data['menu_id'] >= 1000) {
            if ($data['status'] == 1) {
                Yii::$app->db->createCommand()->insert('sub_menu', [
                    'sub_menu_id' => $data['menu_id'],
                    'role' => $data['user_role'],
                ])->execute();
            } else {
                Yii::$app->db->createCommand("DELETE FROM sub_menu WHERE sub_menu_id=" . $data['menu_id'] . " AND role=" . $data['user_role'])->execute();
            }
        } else {
            if ($data['status'] == 1) {
                Yii::$app->db->createCommand()->insert('main_menu', [
                    'main_menu_id' => $data['menu_id'],
                    'role' => $data['user_role'],
                ])->execute();
            } else {
                Yii::$app->db->createCommand("DELETE FROM main_menu WHERE main_menu_id=" . $data['menu_id'] . " AND role=" . $data['user_role'])->execute();
            }
        }
    }
    public function insert_user_permission_group($data)
    {
        Yii::$app->db->createCommand()->insert('main_menu', [
            'main_menu_id' => $data['menu_id'],
            'role' => $data['user_role'],
        ])->execute();
        foreach ($data['sub_menus'] as $submenu) {
            Yii::$app->db->createCommand()->insert('sub_menu', [
                'sub_menu_id' => $submenu,
                'role' => $data['user_role'],
            ])->execute();
        }
    }
    public function delete_user_permission_group($data)
    {
        Yii::$app->db->createCommand("DELETE FROM main_menu WHERE main_menu_id=" . $data['menu_id'] . " AND role=" . $data['user_role'])->execute();
        foreach ($data['sub_menus'] as $submenu) {
            Yii::$app->db->createCommand("DELETE FROM sub_menu WHERE sub_menu_id=" . $submenu . " AND role=" . $data['user_role'])->execute();
        }
    }
    public function get_user_permissions_main_menu($data)
    {
        $result = (new \yii\db\Query())
            ->select(['*'])
            ->from('main_menu')
            ->where(['role' => $data['user_role']])
            ->all();
        return $result;
    }
    public function get_user_permissions_sub_menu($data)
    {
        $result = (new \yii\db\Query())
            ->select(['*'])
            ->from('sub_menu')
            ->where(['role' => $data['user_role']])
            ->all();
        return $result;
    }
}
