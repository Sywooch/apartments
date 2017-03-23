<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ApartmentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="apartment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title_ru') ?>

    <?= $form->field($model, 'title_ua') ?>

    <?= $form->field($model, 'title_en') ?>

    <?= $form->field($model, 'description_ru') ?>

    <?php // echo $form->field($model, 'description_ua') ?>

    <?php // echo $form->field($model, 'description_en') ?>

    <?php // echo $form->field($model, 'coordinates') ?>

    <?php // echo $form->field($model, 'stock') ?>

    <?php // echo $form->field($model, 'price_2') ?>

    <?php // echo $form->field($model, 'price_night') ?>

    <?php // echo $form->field($model, 'price_day') ?>

    <?php // echo $form->field($model, 'price_5') ?>

    <?php // echo $form->field($model, 'price_10') ?>

    <?php // echo $form->field($model, 'room_count') ?>

    <?php // echo $form->field($model, 'bed_count') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'area') ?>

    <?php // echo $form->field($model, 'floor') ?>

    <?php // echo $form->field($model, 'apartment_area') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
