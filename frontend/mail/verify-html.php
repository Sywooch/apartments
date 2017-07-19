<?php
use yii\helpers\Html;

$link = Yii::$app->urlManager->createAbsoluteUrl(['site/check', 'token' => $user->auth_key]);
?>

<div class="container">
    <p>Подтвердите ваш аккаунт: <?= Html::a($link, $link) ?></p>
</div>
