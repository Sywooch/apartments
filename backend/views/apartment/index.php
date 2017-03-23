<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use common\models\FacilitiesSearch;

$this->title = 'Квартиры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apartment-index">
    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить квартиру', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<!--    --><?//= GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//            'title_ru',
////            'title_ua',
////            'title_en',
//            'description_ru:ntext',
//            // 'description_ua',
//            // 'description_en',
//            // 'coordinates:ntext',
//            // 'stock',
//            // 'price_2',
//            // 'price_night',
//            // 'price_day',
//            // 'price_5',
//            // 'price_10',
//             'room_count',
//             'bed_count',
//             'type',
//             'area',
//             'floor',
//             'apartment_area',
//
//            ['class' => 'yii\grid\ActionColumn'],
//        ],
//    ]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'export' => false,
        'pjax' => true,
        'columns' => [
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'value' => function ($model, $key, $index, $column) {
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function ($model, $key, $index, $column) {
                    $searchModel = new FacilitiesSearch();
                    $searchModel->apartment_id = $model->id;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                    return Yii::$app->controller->renderPartial('_facilities', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                    ]);
                },
            ],
            'title_ru',
            'description_ru:ntext',
            'apartment_area',
            'coordinates:ntext',
            'room_count',
            'bed_count',
            'type',
            'area',
            'floor',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
