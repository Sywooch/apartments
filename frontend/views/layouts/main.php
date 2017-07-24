<?php


use yii\helpers\Html;
use frontend\assets\AppAsset;
use frontend\widgets\MultiLang\MultiLang;

$controller = Yii::$app->controller->id;
$action = Yii::$app->controller->action->id;
$body_id = '';
if($controller == 'site' && $action == 'detail'){
    $body_id = 'flat_single';
} elseif ($controller == 'profile' && $action == 'profile'){
    $body_id = 'profile';
}

AppAsset::register($this);
?>
<?php \edgardmessias\assets\nprogress\NProgressAsset::register($this); ?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=cyrillic-ext" rel="stylesheet">
    <?php $this->head() ?>
</head>
<body id="<?= $body_id ?>">
<?php $this->beginBody() ?>
<header>
    <div class="wrapper">
        <div id="filterbutton"></div>
        <span id="filter_close"></span>
        <a href="/<?= Yii::$app->language ?>/"><img class="logo_img" src="/frontend/web/img/logo.png" alt="logo"></a>
        <nav class="header_nav">
            <?php if(!Yii::$app->user->isGuest): ?>
            <a class="headerbutton" href="/<?= Yii::$app->language ?>/profile?id=<?= Yii::$app->user->identity->getId() ?>"><?= Yii::t('app', 'Личный кабинет') ?></a>
            <?php endif; ?>
            <a class="headerbutton" href="/<?= Yii::$app->language ?>/contact"><?= Yii::t('app', 'Контакты') ?></a>
            <a class="headerbutton arenda_dom" href="/<?= Yii::$app->language ?>/about"><?= Yii::t('app', 'Сдай свое жилье') ?></a>
                <span>
                    <?= MultiLang::widget(); ?>
                </span>
            <?php
                if(Yii::$app->user->isGuest){
                    echo Html::a(Yii::t('app', 'Вход'), ['/site/login'], ['class' => 'headerbutton']);
                } else {
                    echo Html::a(Yii::t('app', 'Выход'), ['/site/logout'], ['class' => 'headerbutton','data' => ['method'=>'post']]);
                }
            ?>
        </nav>
    </div>
</header>

<?= $content ?>

<div id="openModal_l" class="modalDialog">
    <div>
        <a href="#close" title="Закрыть" class="close"></a>
        <h2 class="modal_header">Модальное окно</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non.</p>
    </div>
</div>

<?php if(
    Yii::$app->request->url == '/ru/about' ||
    Yii::$app->request->url == '/en/about' ||
    Yii::$app->request->url == '/uk/about' ||
    Yii::$app->request->url == '/ru/contact' ||
    Yii::$app->request->url == '/en/contact' ||
    Yii::$app->request->url == '/uk/contact' ||
    $controller == 'profile' && $action == 'profile'
){
?>
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
<?php }elseif($controller != 'site' && $action != 'detail' ||
    $controller == 'site' && $action == 'index'){ ?>
    <footer>
        <p class="footer_copyright">© <?= Yii::t('app', 'Аренда квартир') ?> <?= date('Y') ?></p>
        <nav class="footer_social">
            <a class="imgoverlay" href="#"><img src="/frontend/web/img/facebook-icon.png" title="facebook"></a>
            <a class="imgoverlay" href="#"><img src="/frontend/web/img/vk-icon.png" title="vk"></a>
            <a class="imgoverlay" href="#"><img src="/frontend/web/img/google--icon.png" title="googleplus"></a>
            <a class="imgoverlay" href="#"><img src="/frontend/web/img/twitter-icon.png" title="twitter"></a>
            <a class="imgoverlay" href="#"><img src="/frontend/web/img/instagram-icon.png" title="instagram"></a>
        </nav>
    </footer>
<?php } ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
