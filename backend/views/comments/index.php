<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Комментарии';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить комментарий', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="table table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'rowOptions' => function( $model ){
                if($model->status == '1')
                {
                    return ['class' => 'success'];
                } else if($model->status == '0')
                {
                    return ['class' => 'danger'];
                }
            },
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'attribute' => 'apartment_id',
                    'value' => 'apartment.title_ru',
                ],
                [
                    'attribute' => 'user_id',
                    'value' => 'user.username',
                ],
                [
                    'attribute' => 'comment',
                    'value' => function($model) {
                        if(strlen($model->comment) > 100){
                            return substr($model->comment,0,100).'...';
                        } else {
                            return $model->comment;
                        }
                    }
                ],
                [
                    'header' => 'Статус',
                    'value' => function($model){
                        if($model->status == 1){
                            return 'Опубликован';
                        } else {
                            return 'Не опубликован';
                        }
                    }
                ],
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
