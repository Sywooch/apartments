<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FacilitiesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="facilities-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'apartment_id') ?>

    <?= $form->field($model, 'elevator') ?>

    <?= $form->field($model, 'internet') ?>

    <?= $form->field($model, 'animals') ?>

    <?php // echo $form->field($model, 'kitchen') ?>

    <?php // echo $form->field($model, 'gym') ?>

    <?php // echo $form->field($model, 'intercom') ?>

    <?php // echo $form->field($model, 'fireplace') ?>

    <?php // echo $form->field($model, 'waggon') ?>

    <?php // echo $form->field($model, 'heating') ?>

    <?php // echo $form->field($model, 'wifi') ?>

    <?php // echo $form->field($model, 'disabled') ?>

    <?php // echo $form->field($model, 'iron') ?>

    <?php // echo $form->field($model, 'drying_machine') ?>

    <?php // echo $form->field($model, 'family') ?>

    <?php // echo $form->field($model, 'parking') ?>

    <?php // echo $form->field($model, 'washer_machine') ?>

    <?php // echo $form->field($model, 'hair_dryer') ?>

    <?php // echo $form->field($model, 'tv') ?>

    <?php // echo $form->field($model, 'conditioner') ?>

    <?php // echo $form->field($model, 'cable_tv') ?>

    <?php // echo $form->field($model, 'smoke') ?>

    <?php // echo $form->field($model, 'separate_entrance') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
