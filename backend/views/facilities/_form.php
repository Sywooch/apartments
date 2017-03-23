<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Facilities */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="facilities-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'apartment_id')->textInput() ?>

    <?= $form->field($model, 'elevator')->textInput() ?>

    <?= $form->field($model, 'internet')->textInput() ?>

    <?= $form->field($model, 'animals')->textInput() ?>

    <?= $form->field($model, 'kitchen')->textInput() ?>

    <?= $form->field($model, 'gym')->textInput() ?>

    <?= $form->field($model, 'intercom')->textInput() ?>

    <?= $form->field($model, 'fireplace')->textInput() ?>

    <?= $form->field($model, 'waggon')->textInput() ?>

    <?= $form->field($model, 'heating')->textInput() ?>

    <?= $form->field($model, 'wifi')->textInput() ?>

    <?= $form->field($model, 'disabled')->textInput() ?>

    <?= $form->field($model, 'iron')->textInput() ?>

    <?= $form->field($model, 'drying_machine')->textInput() ?>

    <?= $form->field($model, 'family')->textInput() ?>

    <?= $form->field($model, 'parking')->textInput() ?>

    <?= $form->field($model, 'washer_machine')->textInput() ?>

    <?= $form->field($model, 'hair_dryer')->textInput() ?>

    <?= $form->field($model, 'tv')->textInput() ?>

    <?= $form->field($model, 'conditioner')->textInput() ?>

    <?= $form->field($model, 'cable_tv')->textInput() ?>

    <?= $form->field($model, 'smoke')->textInput() ?>

    <?= $form->field($model, 'separate_entrance')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
