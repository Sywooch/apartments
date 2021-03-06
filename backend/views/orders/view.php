<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Заказ №'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-view">

    <div class="col-md-6">
        <p>
            <?= Html::a('Отредактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы уверенны, что хотите удалить данный заказ?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>


        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                [
                    'attribute' => 'apartment_id',
                    'value' => $model->apartment->title_ru
                ],
                [
                    'attribute' => 'date_start',
                    'value' => $model->DateFormat($model->date_start)
                ],
                [
                    'attribute' => 'date_end',
                    'value' => $model->DateFormat($model->date_end)
                ],
                [
                    'attribute' => 'user_id',
                    'format' => 'raw',
                    'value' => function($model){
                        return '<p>Логин: '.$model->user->username.'</p>
                                <p>Фамилия: '.$model->user->surname.'</p>
                                <p>Имя: '.$model->user->name.'</p>
                                <p>Email: <a href="mailto:'.$model->user->email.'">'.$model->user->email.'</a></p>';
                    }
                ],
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => function($model){
                        if($model->status == 0){
                            return 'В ожидании';
                        } elseif($model->status == 1){
                            return 'Принят';
                        } elseif($model->status == 2){
                            return 'Отклонен';
                        }
                    }
                ],
                [
                    'attribute' => 'date',
                    'value' => $model->DateTimeFormat($model->date)
                ],
                [
                    'attribute' => 'total_price',
                    'value' => function($model){
                        return $model->total_price.' грн.';
                    }
                ]
            ],
        ]) ?>
        <p>
            <?php if($model->status == 0): ?>
                <?= Html::a('Принять', ['change-status', 'id' => $model->id], [
                    'class' => 'btn btn-success',
                    'data' => [
                        'method' => 'post',
                        'params' => [
                            'status' => 1
                        ]
                    ]
                ]); ?>
                <?= Html::a('Отклонить', ['change-status', 'id' => $model->id], [
                    'class' => 'btn btn-warning',
                    'data' => [
                        'method' => 'post',
                        'params' => [
                            'status' => 2
                        ]
                    ]
                ]); ?>
            <?php elseif($model->status == 1): ?>
                <?= Html::a('Отклонить', ['change-status', 'id' => $model->id], [
                    'class' => 'btn btn-warning',
                    'data' => [
                        'method' => 'post',
                        'params' => [
                            'status' => 2
                        ]
                    ]
                ]); ?>
            <?php elseif($model->status == 2): ?>
                <?= Html::a('Принять', ['change-status', 'id' => $model->id], [
                    'class' => 'btn btn-success',
                    'data' => [
                        'method' => 'post',
                        'params' => [
                            'status' => 1
                        ]
                    ]
                ]); ?>
            <?php endif; ?>
        </p>
    </div>

</div>
