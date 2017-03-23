<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Apartment */

$this->title = $model->title_ru;
$this->params['breadcrumbs'][] = ['label' => 'Квартиры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apartment-view">

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверенны что хотите удалить эту квартиру?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title_ru',
            'title_ua',
            'title_en',
            'description_ru:ntext',
            'description_ua',
            'description_en',
            'coordinates:ntext',
            'stock',
            'price_2',
            'price_night',
            'price_day',
            'price_5',
            'price_10',
            'room_count',
            'bed_count',
            'type',
            'area',
            'floor',
            'apartment_area',
        ],
    ]) ?>

</div>
