<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Смена пароля');
?>

<div id="register-login-form">
    <main>
        <h4 style="text-align: center"><?= Yii::t('app', 'Смена пароля') ?></h4>
        <?php $form = ActiveForm::begin([
            'id' => 'request-password-reset-form',
            'errorCssClass' => 'valid_err'
        ]); ?>

        <?= $form->field($model, 'password')->passwordInput(['autofocus' => true, 'placeholder' => 'Пароль'])->label(false) ?>

        <?= Html::submitButton(Yii::t('app', 'Изменить'), ['class' => 'frm_submit']) ?>

        <?php ActiveForm::end(); ?>
    </main>
</div>
