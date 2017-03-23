<?php

namespace backend\controllers;

use Yii;
use backend\models\MultipleUploadForm;
use common\models\Apartment;
use common\models\Image;
use backend\models\ImageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;


class ImageController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }


    public function actionIndex($id)
    {
        if (!Apartment::find()->where(['id' => $id])->exists()) {
            throw new NotFoundHttpException();
        }
        $form = new MultipleUploadForm();
        $searchModel = new ImageSearch();
        $searchModel->apartment_id = $id;
        $dataProvider = new ActiveDataProvider([
            'query' => Image::find()->where('apartment_id='.$id),
        ]);
        if (Yii::$app->request->isPost) {
            $form->files = UploadedFile::getInstances($form, 'files');
            if ($form->files && $form->validate()) {
                foreach ($form->files as $file) {
                    $image = new Image();
                    $image->apartment_id = $id;
                    if ($image->save()) {
                        $path = $image->getPath();
                        $file->saveAs($path);
                        $image->image = $path;
                        $image->save(false);
                    }
                }
            }
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'uploadForm' => $form,
        ]);
    }


    public function actionDelete($id)
    {
        $image = $this->findModel($id);
        $productId = $image->apartment_id;
        $image->delete();

        return $this->redirect(['index', 'id' => $productId]);
    }


    protected function findModel($id)
    {
        if (($model = Image::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
