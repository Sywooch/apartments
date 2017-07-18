<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <?php Pjax::begin(['id' => 'orders-grid']) ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'rowOptions' => function( $model ){
                if($model->status == '1')
                {
                    return ['class' => 'success'];
                } else if($model->status == '0')
                {
                    return ['class' => 'info'];
                } else if($model->status == '2')
                {
                    return ['class' => 'danger'];
                }
            },
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'attribute' => 'apartment_id',
                    'value' => 'apartment.title_ru'
                ],
                'date_start',
                'date_end',
                [
                    'attribute' => 'user_id',
                    'format' => 'raw',
                    'value' => function($model){
                        return $model->user->surname.' '.$model->user->name;
                    }
                ],
                [
                    'attribute' => 'total_price',
                    'value' => function($model){
                        return $model->total_price.' грн.';
                    }
                ],
                'date',
                [
                    'attribute' => 'status',
                    'value' => 'statusName',
                    'filter' => array("0"=>"В ожидании", "1"=>"Принят", "2"=>"Отклонен"),
                ],

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    <?php Pjax::end() ?>
</div>
