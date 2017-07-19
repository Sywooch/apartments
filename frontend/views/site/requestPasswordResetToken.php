<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = Yii::t('app', 'Сброс пароля');
?>

<div id="register-login-form">
    <main>
        <h4 style="text-align: center"><?= Yii::t('app', 'Сброс пароля') ?></h4>
            <?php $form = ActiveForm::begin([
                'id' => 'request-password-reset-form',
                'enableAjaxValidation' => true,
                'errorCssClass' => 'valid_err'
            ]); ?>

                <?= $form->field($model, 'email')->textInput(['placeholder' => 'E-mail', 'autofocus' => true])->label(false) ?>

                <?= Html::submitButton(Yii::t('app', 'Отправить'), ['class' => 'frm_submit']) ?>

            <?php ActiveForm::end(); ?>
    </main>
</div>