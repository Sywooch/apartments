<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

?>

<div class="orders-form">
    <div class="col-md-4">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'apartment_id')->hiddenInput()->label(false) ?>

        <?php echo $form->field($model, 'date_start', [
            'options'=>['class'=>'drp-container form-group']
        ])->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Дата въезда...'],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
            ]
        ]); ?>

        <?php echo $form->field($model, 'date_end', [
            'options'=>['class'=>'drp-container form-group']
        ])->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Дата выезда...'],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd'
            ]
        ]); ?>

        <?= $form->field($model, 'user_id')->hiddenInput()->label(false) ?>

        <?= $form->field($model, 'date')->textInput(['readonly' => true]) ?>

        <?= $form->field($model, 'total_price')->textInput() ?>

        <?= $form->field($model, 'status')->dropDownList([
            '0' => 'В ожидании',
            '1' => 'Принят',
            '2' => 'Отклонен'
        ]); ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
