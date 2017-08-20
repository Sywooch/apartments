<?php
use yii\helpers\Html;

$link = Yii::$app->urlManager->createAbsoluteUrl(['site/check', 'token' => $user->auth_key]);
?>

<div class="container">
    <p>
        <h4>Здравствуйте, <?= $user->surname ?> <?= $user->name ?>, для завершения регистрации, пожалуйста, подтвердите ваш аккаунт.</h4>
        Подтвердите ваш аккаунт: <?= Html::a('Подтвердить аккаунт', $link) ?>
    </p>
</div>
