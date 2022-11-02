<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }

        return false;
    }

    public function googlelogin($user_email)
    {
        return Yii::$app->user->login($this->googlegetUser($user_email), $this->rememberMe ? 3600 * 24 * 30 : 0);
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

    public function googlegetUser($user_email)
    {

        if ($this->_user === null) {
            $this->_user = User::findByUsername($user_email);
        }

        return $this->_user;
    }
    public function get_permissions()
    {
        $mainmenu_permissions = (new \yii\db\Query())
            ->select(['main_menu_id'])
            ->from('main_menu')
            ->where(['role' => Yii::$app->user->identity->role])
            ->all();
        $submenu_permissions = (new \yii\db\Query())
            ->select(['sub_menu_id'])
            ->from('sub_menu')
            ->where(['role' => Yii::$app->user->identity->role])
            ->all();
        $permisson_array = [];
        if (!empty($mainmenu_permissions)) {
            foreach ($mainmenu_permissions as $main_menu) {
                array_push($permisson_array, $main_menu['main_menu_id']);
            }
        }
        if (!empty($submenu_permissions)) {
            foreach ($submenu_permissions as $sub_menu) {
                array_push($permisson_array, $sub_menu['sub_menu_id']);
            }
        }
        return $permisson_array;
    }
}
