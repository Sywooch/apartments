<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Вход');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Yii::t('app', 'Авторизируйтесь') ?>:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    <?= Yii::t('app', 'Если вы забыли пароль, вы можете') ?> <?= Html::a(Yii::t('app', 'сбросить его'), ['site/request-password-reset']) ?>.
                </div>

                <div style="color:#999;margin:1em 0">
                    <?= Html::a(Yii::t('app', 'Регистрация'), ['site/signup']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Вход'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
