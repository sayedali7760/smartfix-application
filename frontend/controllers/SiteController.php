<?php

namespace frontend\controllers;

use app\models\UserSearch;
use common\models\LoginForm;
use common\models\User;
use frontend\models\ContactForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\Usermanagement;
use frontend\models\VerifyEmailForm;
use Google_Client;
use Yii;
use yii\base\InvalidArgumentException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

const BM_GOOGLE_CLIENT_ID = '116197081390-bm9pam7494g1ahhv2e6qc6e43a5p2a4j.apps.googleusercontent.com';

class SiteController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup', 'index'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        if (Yii::$app->user->identity->role == 10) {
            $data['count'] = (new \yii\db\Query())
                ->select(['*'])
                ->from('upload_details')
                ->count();
        } else {
            $data['count'] = (new \yii\db\Query())
                ->select(['*'])
                ->from('upload_details')
                ->where(['created_by' => Yii::$app->user->identity->id])
                ->count();
        }

        return $this->render('index', [
            'data' => $data,
        ]);
    }

    public function actionTest()
    {
        return $this->render('test_form');
    }

    public function actionLogin()
    {
        $this->layout = 'login.php';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $permission_data = LoginForm::get_permissions();

            $pass = rand(100000, 999999);
            Yii::$app->session->set('unique_auth_id', $pass);
            Yii::$app->session->set('permissions', $permission_data);
            return $this->redirect(['index']);
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }
    public function actionGlogin()
    {

        if (!empty($_POST['credential'])) {
            $id_token = $_POST['credential'];
            $CLIENT_ID = BM_GOOGLE_CLIENT_ID;
            $client = new Google_Client(['client_id' => $CLIENT_ID]);
            $payload = $client->verifyIdToken($id_token);
            if ($payload) {
                $user_email = $payload['email'];
                $user_mails = User::find()
                    ->where(['username' => $user_email])
                    ->count();
                if ($user_mails > 0) {
                    $model = new LoginForm();
                    if ($model->googlelogin($user_email)) {

                        $pass = rand(100000, 999999);
                        Yii::$app->session->set('unique_auth_id', $pass);

                        $permission_data = LoginForm::get_permissions();
                        Yii::$app->session->set('permissions', $permission_data);

                        return $this->redirect(['index']);
                    }
                } else {
                    Yii::$app->session->setFlash('error', 'Invalid Google Login.');
                    return $this->redirect(['login']);
                }
            } else {
                echo "Access denied from Google or Invalid Google Login.";
            }
        } else {
            return $this->goHome();
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            'status' => 1,
        ];
    }



    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }


    public function actionRequest()
    {
        $this->layout = 'login.php';
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $mail_id = $model->username;
            if ($model->sendEmail($mail_id)) {
                Yii::$app->session->setFlash('success', 'Please check your mail.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('success', 'Please check your mail.');
            return $this->redirect(['index']);
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionPasslink()
    {
        $this->layout = 'login.php';
        $model = new LoginForm();
        $mail_id = Yii::$app->getRequest()->getQueryParam('mail_id');

        $rows = (new \yii\db\Query())
            ->select(['pass_change_flag'])
            ->from('bm_user')
            ->where(['username' => $mail_id])
            ->limit(1)
            ->all();

        if ($rows[0]['pass_change_flag'] == 1) {
            if ($model->load(Yii::$app->request->post())) {

                $mail_id = Yii::$app->request->post('mail_id');
                $password = $model->password;
                $confirm_passowrd = Yii::$app->request->post('confirmpassword');
                if ($password == $confirm_passowrd) {
                    $password = Yii::$app->security->generatePasswordHash($password);
                    $auth_key = Yii::$app->security->generateRandomString();
                    Yii::$app->db->createCommand()
                        ->update('bm_user', ['password_hash' => $password, 'auth_key' => $auth_key], 'username = "' . $mail_id . '"')
                        ->execute();
                    Yii::$app->db->createCommand()
                        ->update('bm_user', ['pass_change_flag' => 0], 'username = "' . $mail_id . '"')
                        ->execute();
                    Yii::$app->session->setFlash('message', '<span style="color:green;">Password has been reset successfully.</span');
                    return $this->goHome();
                } else {
                    Yii::$app->session->setFlash('message', '<span style="color:red;">Password and confirm password must be same.</span>');
                    return $this->render('forgot_password', [
                        'model' => $model,
                        'mail_id' => $mail_id,
                    ]);
                }
            }
            return $this->render('forgot_password', [
                'model' => $model,
                'mail_id' => $mail_id,
            ]);
        } else {
            print_r("Sorry, This link was expired");
            die;
        }
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model,
        ]);
    }

    public function actionPassword()
    {

        $this->layout = 'login.php';

        $model = new User();

        return $this->render('forgot_password', [

            'model' => $model,

        ]);
    }
}
