<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use backend\models\UserSearch;
use yii\bootstrap\ActiveForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;


class UserController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionBlocked($id)
    {
        $model = User::find()->where('id='.$id)->one();
        if ($model->status == 10){
            $model->status = 0;
            Yii::$app->getSession()->setFlash('danger', 'Вы заблокировали пользователя '.$model->username);
        } else if ($model->status == 0) {
            $model->status = 10;
            Yii::$app->getSession()->setFlash('success', 'Вы разблокировали пользователя '.$model->username);
        }
        $model->save(false);

        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionChangePassword(){
        $user = Yii::$app->user->identity;
        $user->setScenario('changePwd');

        if (Yii::$app->request->isAjax && $user->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($user);
        }
        
        $loadedPost = $user->load(Yii::$app->request->post());
        if ($loadedPost) {
            if ($user->validate()) {
                $new_no_hash_password = $user->newPassword;
                $user->password_hash = $user->newPassword;
                $user->password_hash = Yii::$app->getSecurity()->generatePasswordHash($user->password_hash);
                if ($user->save(false)) {
                    Yii::$app->getSession()->setFlash('success', 'Вы успешно поменяли пароль!');
                } else {
                    Yii::$app->getSession()->setFlash('warning', 'Ошибка! Не удалось поменять пароль!');
                }
                return $this->refresh();
            }
        }
        return $this->render("change_password", [
            'user' => $user,
        ]);
    }

}
