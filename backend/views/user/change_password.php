<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Смена пароля';
?>
<br><br>
<div class="col-lg-4">
    <?php $form = ActiveForm::begin([
        'id' => 'change-password-form',
        'enableAjaxValidation' => true,
    ]); ?>

    <?= $form->field($user, 'currentPassword')->passwordInput() ?>

    <?= $form->field($user, 'newPassword')->passwordInput() ?>

    <?= $form->field($user, 'newPasswordConfirm')->passwordInput() ?>

    <?= Html::submitButton('Изменить', ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>
</div>
