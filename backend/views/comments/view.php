<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Comments */

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
    </div>
</div>
