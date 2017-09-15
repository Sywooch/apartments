<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = Yii::t('app', 'Вход');
?>

<div id="register-login-form">
    <main>

        <input id="tab1" type="radio" name="tabs" checked>
        <label for="tab1"><?= Yii::t('app', 'Вход') ?></label>

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

    </main>
</div>

<?php
//use yii\helpers\Html;
//use yii\bootstrap\ActiveForm;
//
//
//$this->title = 'Вход';
//
//$fieldOptions1 = [
//    'options' => ['class' => 'form-group has-feedback'],
//    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
//];
//
//$fieldOptions2 = [
//    'options' => ['class' => 'form-group has-feedback'],
//    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
//];
//?>
<!---->
<!--<div class="login-box">-->
<!--    <div class="login-logo">-->
<!--        <a href="#"><b>Админ</b>Панель</a>-->
<!--    </div>-->
<!--    <div class="login-box-body">-->
<!--        <p class="login-box-msg">Пожалуйста, авторизируйтесь</p>-->
<!---->
<!--        --><?php //$form = ActiveForm::begin(['id' => 'login-form']); ?>
<!---->
<!--        --><?//= $form
//            ->field($model, 'email', $fieldOptions1)
//            ->label(false)
//            ->textInput(['placeholder' => $model->getAttributeLabel('email')]) ?>
<!---->
<!--        --><?//= $form
//            ->field($model, 'password', $fieldOptions2)
//            ->label(false)
//            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>
<!---->
<!--        <div class="row">-->
<!--            <div class="col-xs-8">-->
<!--                --><?//= $form->field($model, 'rememberMe')->checkbox() ?>
<!--            </div>-->
<!--            <div class="col-xs-4">-->
<!--                --><?//= Html::submitButton('Войти', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        --><?php //ActiveForm::end(); ?>
<!---->
<!--    </div>-->
<!--</div>-->
