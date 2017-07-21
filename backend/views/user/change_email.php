<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Смена E-mail';
?>

<br><br>
<div class="col-lg-4">
    <?php $form = ActiveForm::begin([
        'enableAjaxValidation' => true,
    ]); ?>

    <?= $form->field($user, 'email')->textInput() ?>

    <?= Html::submitButton('Изменить', ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>
</div>