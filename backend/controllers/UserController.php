<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use backend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


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

}
