<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\daterange\DateRangePicker;

?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'apartment_id')->textInput() ?>

    <?php echo $form->field($model, 'date_start', [
        'options'=>['class'=>'drp-container form-group']
    ])->widget(DateRangePicker::classname(), [
        'startInputOptions' => ['value' => '2017-03-27'],
        'pluginOptions' => [
            'enabledDates' => '2017-03-27',
            'readonly' => '2017-03-27',
            'minDate' => 'moment()',
        ],
    ]); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_date')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'total_price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
