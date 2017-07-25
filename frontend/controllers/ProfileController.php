<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\data\ActiveDataProvider;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\Apartment;
use common\models\Image;
use common\models\ApartmentSearch;
use common\models\Comments;
use common\models\Orders;
use common\models\User;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\ForbiddenHttpException;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;


class ProfileController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['profile'],
                'rules' => [
                    [
                        'actions' => ['profile'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionProfile($id)
    {
        if($id != Yii::$app->user->identity->getId()){
            throw new ForbiddenHttpException('Отказано в доступе!');
        }

        $user = Yii::$app->user->identity;
        $user->setScenario('changePwd');
        $user->setScenario('changeAvatar');

        $dataProvider = new ActiveDataProvider([
            'query' => Orders::find()
                ->where(['user_id' => $user->getId()])
                ->orderBy('date DESC'),
            'pagination' => [
                'pagesize' => 10
            ]
        ]);

        return $this->render('account', [
            'user' => $user,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionChangePassword()
    {
        $user = Yii::$app->user->identity;
        $user->setScenario('changePwd');

        if (Yii::$app->request->isAjax && $user->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($user);
        }

        $loadedPost = $user->load(Yii::$app->request->post());
        if ($loadedPost) {
            if ($user->validate()) {
                $user->password_hash = $user->newPassword;
                $user->password_hash = Yii::$app->getSecurity()->generatePasswordHash($user->password_hash);
                if($user->save(false)){
                    Yii::$app->session->setFlash('success', Yii::t('app', 'Вы успешно сменили пароль!'));
                    return $this->redirect(['profile', 'id' => $user->getId()]);
                }
            }
        }
    }
    
    public function actionAvatarUpload()
    {
        $user = Yii::$app->user->identity;
        $user->setScenario('changeAvatar');

        if ($user->load(Yii::$app->request->post())){
            $imageName = uniqid();
            $user->photo = UploadedFile::getInstance($user, 'photo');
            if (!empty($user->photo)) {
                if (!empty($user->avatar)){
                    unlink(getcwd().'/'.$user->avatar);
                }
                $user->photo->saveAs( 'public/avatars/'.$imageName.'.'.$user->photo->extension );
                $user->avatar = 'public/avatars/'.$imageName.'.'.$user->photo->extension;
                if($user->save(false)){
                    Yii::$app->session->setFlash('success', Yii::t('app', 'Вы успешно сменили аватар!'));
                    return $this->redirect(['profile', 'id' => $user->getId()]);
                }
            }
        }
    }
}
