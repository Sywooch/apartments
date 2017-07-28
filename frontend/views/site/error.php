<?php

use yii\helpers\Html;

$this->title = $name;
?>

<aside class="sidebar sidebar_single">
    <?= $this->render('/layouts/main-responsive') ?>
</aside>

<div class="wrapper_404">
    <h1><?= $title = preg_replace("/[^0-9]/", '', $this->title); ?></h1>
    <p><?= nl2br(Html::encode($message)) ?></p>
    <a href="<?= Yii::$app->request->referrer; ?>"><?= Yii::t('app', 'Вернуться назад') ?></a>
    <a href="/"><?= Yii::t('app', 'Перейти на главную') ?></a>
</div>

<footer class="singlepage_footer">
    <div class="skyline"></div>
    <p class="footer_copyright">© <?= Yii::t('app', 'Аренда квартир') ?> <?= date('Y') ?></p>
    <nav class="footer_social">
        <a class="imgoverlay" href="#"><img src="/frontend/web/img/facebook-icon.png" title="facebook"></a>
        <a class="imgoverlay" href="#"><img src="/frontend/web/img/vk-icon.png" title="vk"></a>
        <a class="imgoverlay" href="#"><img src="/frontend/web/img/google--icon.png" title="googleplus"></a>
        <a class="imgoverlay" href="#"><img src="/frontend/web/img/twitter-icon.png" title="twitter"></a>
        <a class="imgoverlay" href="#"><img src="/frontend/web/img/instagram-icon.png" title="instagram"></a>
    </nav>
</footer>

