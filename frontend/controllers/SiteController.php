<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
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
use yii\web\Response;
use yii\widgets\ActiveForm;


class SiteController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup', 'booking', 'create-comment'],
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
                    [
                        'actions' => ['booking'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['create-comment'],
                        'allow' => true,
                        'roles' => ['@'],
                    ]
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
//                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
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

    //Order added
    public function actionBooking()
    {
        $model = new Orders();
        if(Yii::$app->request->isAjax && Yii::$app->request->post()){
            $request = Yii::$app->request->post();
            if(isset($request['date_start']) && isset($request['date_end']) && isset($request['apartment_id'])){
                $model->apartment_id = $request['apartment_id'];
                $model->user_id = $request['user_id'];
                $model->date_start = date("Y-m-d", strtotime($request['date_start']));
                $model->date_end = date("Y-m-d", strtotime($request['date_end']));
                $model->guest_count = $request['guests_count'];
                $model->total_price = $request['total_price'];
                $model->status = 0;
                if($model->save()){
                    return 1;
                } else {
                    return 0;
                }
            }
        }
    }
    
    public function actionGetPrice()
    {
        if(Yii::$app->request->isAjax && Yii::$app->request->post()){
            $apartment = Apartment::find()
                ->where(['apartment.id' => Yii::$app->request->post('id')])
                ->joinWith(['facilities'])
                ->one();
            $response = array(
                'price_2_hours' => $apartment->price_2,
                'price_night' => $apartment->price_night,
                'price_day' => $apartment->price_day,
                'price_5' => $apartment->price_5,
                'price_10' => $apartment->price_10
            );

            return json_encode($response);
        }
    }
    
    public function actionDetail($id){
        $model = new Apartment();
        $orders = new Orders();
        $image_model = new Image();
        $new_comment = new Comments();
        
        $apartment = $model->SingleApartment($id);
        $count = $new_comment->CommentsCount($apartment->id);
        $comments = $new_comment->AllApartmentComments($apartment->id);
        $images = $image_model->AllApartmentImages($id);
        $rating = $model->ApartmentRating($comments);

        if ($new_comment->load(Yii::$app->request->post()) && $new_comment->save()) {
            return $this->redirect(Yii::$app->request->referrer);
        }
        
        return $this->render('detail', [
            'count' => $count,
            'orders' => $orders,
            'rating' => $rating,
            'apartment' => $apartment,
            'comments' => $comments,
            'new_comment' => $new_comment,
            'images' => $images,
            'map_item' => $model->SingleMap($id)
        ]);
    }


    public function actionLogin()
    {
        $this->layout = 'login';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $model = new LoginForm();
        $register = new SignupForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
                'register' => $register
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

//        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
//            Yii::$app->response->format = Response::FORMAT_JSON;
//            return ActiveForm::validate($model);
//        }

//        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
//            if($model->sendEmail(Yii::$app->params['adminEmail'])){
//                return 1;    
//            }
//        }
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if($model->sendEmail(Yii::$app->params['adminEmail'])){
                Yii::$app->session->setFlash('success', 'Ваше письмо отправлено!');
                return $this->refresh();
            }
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

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                $userRole = Yii::$app->authManager->getRole('User');
                Yii::$app->authManager->assign($userRole, $user->getId());
                    \Yii::$app->mailer->compose(['html' => 'verify-html'],['user' => $user])
                        ->setTo($user->email)
                        ->setFrom([Yii::$app->params['adminEmail'] => 'Apartments'])
                        ->setSubject('Verify your account')
                        ->send();
                    return $this->redirect('complete-registration');
            }
        }
    }
    
    public function actionCreateComment()
    {
        $model = new Comments();

        if(Yii::$app->request->post('id')){
            $request = Yii::$app->request->post();
            $model->apartment_id = $request['id'];
            $model->user_id = Yii::$app->user->identity->getId();
            $model->city = $request['rate_city'];
            $model->comment = $request['rate_text'];
            $model->rating = $request['total_rate'];
            $model->rating_price = $request['price_quality'];
            $model->rating_clean = $request['cleaninig'];
            $model->rating_communication = $request['responsibility'];
            $model->rating_place = $request['location'];
            if($model->save()){
                return $this->redirect('detail?id='.$request['id']);
            }
        }
    }

    public function actionCheck($token){
        $user = User::findOne(['auth_key' => $token]);
        if($user) {
            $user->status = 10;
            $user->save(false);
            Yii::$app->getUser()->login($user);
            return $this->redirect('index');
        } else {
            return 'Invalid token';
        }
    }
    
    public function actionCompleteRegistration()
    {
        return $this->render('complete-registration');
    }

    public function actionRequestPasswordReset()
    {
        $this->layout = 'login';

        $model = new PasswordResetRequestForm();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Проверьте ваш email и следуйте дальнейшим инструкциям.');

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
        $this->layout = 'login';

        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'Новый пароль сохранен.');

            return $this->redirect('login');
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
