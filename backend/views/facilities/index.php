<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\FacilitiesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Facilities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facilities-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Facilities', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'apartment_id',
            'elevator',
            'internet',
            'animals',
            // 'kitchen',
            // 'gym',
            // 'intercom',
            // 'fireplace',
            // 'waggon',
            // 'heating',
            // 'wifi',
            // 'disabled',
            // 'iron',
            // 'drying_machine',
            // 'family',
            // 'parking',
            // 'washer_machine',
            // 'hair_dryer',
            // 'tv',
            // 'conditioner',
            // 'cable_tv',
            // 'smoke',
            // 'separate_entrance',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
