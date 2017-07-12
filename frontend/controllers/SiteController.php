<?php
namespace frontend\controllers;

use common\models\ApartmentSearch;
use common\models\Comments;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\Apartment;
use common\models\Image;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\Response;


class SiteController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
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
        if(Yii::$app->request->isAjax || Yii::$app->request->isPjax){
            $searchModel = new ApartmentSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->renderAjax('_apartment_list',[
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider
            ]);
        }
        $model = new Apartment();
        $searchModel = new ApartmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'map_items' => $model->Map(),
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }
    
    public function actionFilters()
    {
        if(Yii::$app->request->isAjax || Yii::$app->request->isPjax){
            $searchModel = new ApartmentSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            
            return $this->renderAjax('_apartment_list',[
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider
            ]);
        }
    }
    
    public function actionDetail($id){
        $apartment = Apartment::find()->joinWith(['facilities'])->where('apartment.id='.$id)->one();
        $comments = Comments::find()->where('apartment_id='.$apartment->id)->orderBy('id DESC')->all();
        $new_comment = new Comments();
        $images = Image::find()->where(['apartment_id' => $id])->all();

        if ($new_comment->load(Yii::$app->request->post()) && $new_comment->save()) {
            return $this->redirect(Yii::$app->request->referrer);
        }
        
        return $this->render('detail', [
            'apartment' => $apartment,
            'comments' => $comments,
            'new_comment' => $new_comment,
            'images' => $images
        ]);
    }


    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionContact()
    {
        $model = new ContactForm();
        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            if($model->sendEmail(Yii::$app->params['adminEmail'])){
                return 1;    
            }
        }
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->sendEmail(Yii::$app->params['adminEmail']);
            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }


    public function actionAbout()
    {
        return $this->render('about');
    }


    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                $userRole = Yii::$app->authManager->getRole('User');
                Yii::$app->authManager->assign($userRole, $user->getId());
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }


    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Проверьте ваш mail для дальнейших инструкций.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }


    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'Новый пароль сохранен.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
