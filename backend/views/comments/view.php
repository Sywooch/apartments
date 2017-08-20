<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->apartment->title_ru;
$this->params['breadcrumbs'][] = ['label' => 'Комментарии', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-view">

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверенны, что хотите удалить этот комментарий?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="col-md-5">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'apartment_id',
                    'value' => $model->apartment->title_ru,
                ],
                [
                    'attribute' => 'user_id',
                    'value' => $model->user->surname.' '.$model->user->name,
                ],
                'comment',
                'rating',
                'rating_price',
                'rating_clean',
                'rating_communication',
                'rating_place'
            ],
        ]) ?>

        <p>
            <?php if($model->status == 0): ?>
                <?= Html::a('Опубликовать', ['change-status', 'id' => $model->id], [
                    'class' => 'btn btn-success',
                    'data' => [
                        'method' => 'post',
                        'params' => [
                            'status' => 1
                        ]
                    ],
                ]) ?>
            <?php else: ?>
                <?= Html::a('Убрать', ['change-status', 'id' => $model->id], [
                    'class' => 'btn btn-warning',
                    'data' => [
                        'method' => 'post',
                        'params' => [
                            'status' => 0
                        ]
                    ],
                ]) ?>
            <?php endif; ?>
        </p>
    </div>
</div>
