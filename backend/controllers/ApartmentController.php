<?php

namespace backend\controllers;

use Yii;
use common\models\Apartment;
use common\models\ApartmentSearch;
use common\models\Facilities;
use common\models\FacilitiesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class ApartmentController extends Controller
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
        $searchModel = new ApartmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Apartment();
        $facilities = new Facilities();

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            if ($facilities->load(Yii::$app->request->post())) {
                $facilities->apartment_id = $model->id;
                $facilities->save(false);
            }
            Yii::$app->getSession()->setFlash('success', 'Вы успешно добавили новую квартиру!');
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'facilities' => $facilities,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = Apartment::find()->where('id='.$id)->one();
        $facilities = Facilities::find()->where('apartment_id='.$id)->one();

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            if ($facilities->load(Yii::$app->request->post())) {
                $facilities->apartment_id = $model->id;
                $facilities->save(false);
            }
            Yii::$app->getSession()->setFlash('warning', 'Изменения сохранены!');
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'facilities' => $facilities,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    protected function findModel($id)
    {
        if (($model = Apartment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
