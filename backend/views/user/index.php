<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'username',
            'name',
            'surname',
            'email:email',
            [
                'attribute' => 'status',
                'value' => function($model){
                    if($model->status == 10){
                        return 'Активный';
                    }
                    if($model->status == 0){
                        return 'Заблокирован';
                    }
                },
                'filter' => array("0"=>"Заблокирован", "10"=>"Активный"),
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{my_button}',
                'buttons' => [
                    'my_button' => function ($url, $model, $key) {
                        if($model->status == 10 && Yii::$app->user->identity->getId() != $model->id){
                        return Html::a('Заблокировать', ['blocked', 'id'=>$model->id],[
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Вы уверены, что хотите заблокировать пользователя?',
                                'method' => 'post',
                            ],
                        ]);
                        }
                        if($model->status == 0){
                            return Html::a('Разблокировать', ['blocked', 'id'=>$model->id],[
                                'class' => 'btn btn-success',
                                'data' => [
                                    'confirm' => 'Вы уверены, что хотите разблокировать пользователя?',
                                    'method' => 'post',
                                ],
                            ]);
                        }
                    },
                ]
            ],
        ],
    ]); ?>
</div>
