<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = Yii::t('app', 'Вход');
?>

<div id="register-login-form">
    <main>

        <input id="tab1" type="radio" name="tabs" checked>
        <label for="tab1"><?= Yii::t('app', 'Вход') ?></label>

        <input id="tab2" type="radio" name="tabs">
        <label for="tab2"><?= Yii::t('app', 'Регистрация') ?></label>

        <section id="content1">

            <?php $form = ActiveForm::begin([
                'id' => 'log-in-form',
                'errorCssClass' => 'valid_err'
            ]); ?>

                <?= $form->field($model, 'email')->textInput(['placeholder' => 'E-mail'])->label(false) ?>

                <?= $form->field($model, 'password')->passwordInput(['placeholder' => Yii::t('app', 'Пароль')])->label(false) ?>

                <fieldset>
                    <span class="check_remember">
<!--                        --><?//= $form->field($model, 'rememberMe')->checkbox() ?>
                        <input id="remember_user" type="checkbox" name="LoginForm[rememberMe]" value="1" />
                        <label for="remember_user"><?= Yii::t('app', 'Запомнить меня') ?></label>
                    </span>
                    <a class="forgotpass" href="/site/request-password-reset"><?= Yii::t('app', 'Забыли пароль?') ?></a>
                </fieldset>

                <?= Html::submitButton(Yii::t('app', 'Войти'), ['class' => 'frm_submit', 'id' => 'login_submit', 'name' => 'login-button']) ?>

            <?php ActiveForm::end(); ?>

        </section>

        <section id="content2">

            <?php $form = ActiveForm::begin([
                'id' => 'register',
                'action' => 'signup',
                'enableAjaxValidation' => true,
                'errorCssClass' => 'valid_err'
            ]); ?>

                <?= $form->field($register, 'username')->textInput(['id' => 'login', 'placeholder' => Yii::t('app', 'Логин')])->label(false) ?>

                <?= $form->field($register, 'name')->textInput(['id' => 'username', 'placeholder' => Yii::t('app', 'Имя')])->label(false) ?>

                <?= $form->field($register, 'surname')->textInput(['id' => 'usersurname', 'placeholder' => Yii::t('app', 'Фамилия')])->label(false) ?>

                <?= $form->field($register, 'email')->textInput(['id' => 'usermail', 'placeholder' => Yii::t('app', 'E-mail')])->label(false) ?>

                <?= $form->field($register, 'password')->passwordInput(['id' => 'userpass', 'placeholder' => Yii::t('app', 'Пароль')])->label(false) ?>

                <?= $form->field($register, 'confirm_password')->passwordInput(['id' => 'userpass_confirm', 'placeholder' => Yii::t('app', 'Повторите пароль')])->label(false) ?>

                <?= Html::submitButton(Yii::t('app', 'Регистрация'), ['class' => 'frm_submit', 'id' => 'register_submit', 'name' => 'signup-button']) ?>

            <?php ActiveForm::end(); ?>

        </section>

    </main>
</div>