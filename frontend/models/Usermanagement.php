<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bm_user".
 *
 * @property int $id
 * @property string $username
 * @property string|null $email
 * @property string $name
 * @property string|null $profile_image
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property int $role
 * @property int $status
 * @property int|null $created_by
 * @property string|null $created_on
 * @property string $updated_at
 * @property string|null $verification_token
 * @property int $pass_change_flag
 *
 * @property BmRole $role0
 */
class Usermanagement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bm_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'name', 'auth_key', 'password_hash', 'role'], 'required'],
            [['role', 'status', 'created_by', 'pass_change_flag'], 'integer'],
            [['created_on', 'updated_at'], 'safe'],
            [['username', 'email', 'password_hash', 'password_reset_token', 'verification_token'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 400],
            [['profile_image'], 'string', 'max' => 100],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['password_reset_token'], 'unique'],
            // [['role'], 'exist', 'skipOnError' => true, 'targetClass' => BmRole::className(), 'targetAttribute' => ['role' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'name' => 'Name',
            'profile_image' => 'Profile Image',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'role' => 'Role',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_on' => 'Created On',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
            'pass_change_flag' => 'Pass Change Flag',
        ];
    }

    public function getRoles()
    {
        return $this->hasOne(Userrole::className(), ['id' => 'role']);
    }
    /**
     * Gets query for [[Role0]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getRole()
    // {
    //     return $this->hasOne(Userrole::className(), ['id' => 'role']);
    // }
}
