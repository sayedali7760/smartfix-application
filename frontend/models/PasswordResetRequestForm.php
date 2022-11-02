<?php

namespace frontend\models;

use common\models\User;
use Yii;
use yii\helpers\Url;
use yii\base\Model;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $username;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],

            [
                'username', 'exist',
                'targetClass' => '\common\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => 'There is no user with this email address.',
            ],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return bool whether the email was send
     */

    /* @var $user User */
    // $user = User::findOne([
    //     'status' => User::STATUS_ACTIVE,
    //     'username' => $this->username,
    // ]);
    //     $user = User::find()->where(['username' => $this->username])->one();

    //     if (!$user) {
    //         return false;
    //     }

    //     if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
    //         $user->generatePasswordResetToken();
    //         if (!$user->save()) {
    //             return false;
    //         }
    //     }

    //     return  Yii::$app->mailer->compose()
    //         ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
    //         ->setTo($this->username)
    //         ->setSubject('Password reset for ' . Yii::$app->name)
    //         ->send();
    // }
    public function sendEmail($mail_id)
    {

        // $id = Yii::$app->user->identity->id;
        Yii::$app->db->createCommand()
            ->update('bm_user', ['pass_change_flag' => 1], 'username = "' . $mail_id . '"')
            ->execute();

        //$body = Yii::setAlias('@message_files_root', dirname(dirname(__DIR__)) . '/frontend/site/reset_passwordlink_mail.php', ['id' => 3]);
        // $url = Yii::$app->getUrlManager()->createUrl('site/passlink?mail_id=' . $mail_id . '');
        $url = Url::base(true) . '/site/passlink?mail_id=' . $mail_id . '';

        Yii::$app->mailer->compose()
            ->setFrom('mailalert@docme.cloud')
            ->setTo($mail_id)
            ->setSubject('Reset Your Password')
            ->setHtmlBody(
                'Please click the below link for change your password<br/>
                <a href="' . $url . '">' . $url . '</a>'
            )
            ->send();
    }
}
