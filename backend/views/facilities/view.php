<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Facilities */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Facilities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facilities-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'apartment_id',
            'elevator',
            'internet',
            'animals',
            'kitchen',
            'gym',
            'intercom',
            'fireplace',
            'waggon',
            'heating',
            'wifi',
            'disabled',
            'iron',
            'drying_machine',
            'family',
            'parking',
            'washer_machine',
            'hair_dryer',
            'tv',
            'conditioner',
            'cable_tv',
            'smoke',
            'separate_entrance',
        ],
    ]) ?>

</div>
