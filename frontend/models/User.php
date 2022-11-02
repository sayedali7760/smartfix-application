<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bm_user".
 *
 * @property int $id
 * @property string $username
 * @property string $name
 * @property string|null $profile_image
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property int $role
 * @property int $status
 * @property string|null $created_on
 * @property string|null $updated_on
 * @property string|null $verification_token
 *
 * @property BmCategory[] $bmCategories
 * @property BmCustomer[] $bmCustomers
 * @property BmGarage[] $bmGarages
 * @property BmItems[] $bmItems
 * @property BmSubcategory[] $bmSubcategories
 * @property BmVehicle[] $bmVehicles
 * @property BmRole $role0
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bm_user';
    }

    public $confirmpassword;
    public $currentpassword;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'name', 'auth_key', 'password_hash', 'role'], 'required'],
            [['role', 'status', 'created_by'], 'integer'],
            [['created_on', 'updated_on'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'verification_token'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 400, 'min' => 5],
            [['name'], 'filter', 'filter' => 'ucfirst'],

            [['name'], 'match', 'pattern' => '/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])*$/'],
            [['profile_image'], 'string', 'max' => 100],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique', 'message' => 'Email ID already exist.'],
            [['username'], 'email', 'message' => "The email isn't correct"],
            [['password_reset_token'], 'unique'],
            [['role'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['role' => 'id']],



            [['password_hash'], 'compare', 'compareAttribute' => 'confirmpassword', 'message' => 'hgjhgkhg'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function validatepassword()
    {

        if (!$this->verifypassword($this->currentpassword)) {
            $this->addError("currentpassword", "current pass incorrect");
        }
    }

    public function verifypassword($password)
    {
        $dbpassword = static::findOne(['username' => Yii::$app->user->identity->username]);
        return Yii::$app->security->validatePassword($password, $dbpassword);
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Email'),
            'name' => Yii::t('app', 'Name'),
            'profile_image' => Yii::t('app', 'Profile Image'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'role' => Yii::t('app', 'Role'),
            'status' => Yii::t('app', 'Status'),
            'created_on' => Yii::t('app', 'Created On'),
            'updated_on' => Yii::t('app', 'Updated On'),
            'verification_token' => Yii::t('app', 'Verification Token'),
        ];
    }

    /**
     * Gets query for [[BmCategories]].
     *
     * @return \yii\db\ActiveQuery
     */


    /**
     * Gets query for [[BmCustomers]].
     *
     * @return \yii\db\ActiveQuery
     */


    /**
     * Gets query for [[BmGarages]].
     *
     * @return \yii\db\ActiveQuery


    
     */


    /**
     * Gets query for [[Role0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole0()
    {
        return $this->hasOne(Role::className(), ['id' => 'role']);
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }
}
