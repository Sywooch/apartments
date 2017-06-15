<?php


use yii\helpers\Html;
use yii\helpers\FileHelper;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\Pjax;
use frontend\assets\AppAsset;
use frontend\widgets\MultiLang\MultiLang;
use common\widgets\Alert;

AppAsset::register($this);
?>
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
<body>
<?php $this->beginBody() ?>

<header>
    <div class="wrapper">
        <div id="filterbutton"></div>
        <span id="filter_close"></span>
        <a href="/site/index"><img class="logo_img" src="/frontend/web/img/logo.png" alt="logo"></a>
        <nav class="header_nav">
            <a class="headerbutton" href="contacts.html"><?= Yii::t('app', 'Контакты') ?></a>
            <a class="headerbutton" href="sdai.html"><?= Yii::t('app', 'Сдай свое жилье') ?></a>
                <span>
<!--                    --><?php //Pjax::begin(['id'=>'change-language', 'options'=>['tag'=>'span']]) ?>
                    <?= MultiLang::widget(); ?>
<!--                    --><?php //Pjax::end() ?>
                </span>
            <a class="headerbutton" href="#"><?= Yii::t('app', 'Войти') ?></a>
        </nav>
    </div>
</header>

<!--    --><?php
//    NavBar::begin([
//        'brandLabel' => 'Аренда квартир',
//        'brandUrl' => Yii::$app->homeUrl,
//        'options' => [
//            'class' => 'navbar-inverse navbar-fixed-top',
//        ],
//    ]);
//    $menuItems = [
//        ['label' => 'Главная', 'url' => ['/site/index']],
//        ['label' => 'О нас', 'url' => ['/site/about']],
//        ['label' => 'Контакты', 'url' => ['/site/contact']],
//    ];
//    if (Yii::$app->user->isGuest) {
//        $menuItems[] = ['label' => 'Регистрация', 'url' => ['/site/signup']];
//        $menuItems[] = ['label' => 'Вход', 'url' => ['/site/login']];
//    } else {
//        $menuItems[] = '<li>'
//            . Html::beginForm(['/site/logout'], 'post')
//            . Html::submitButton(
//                'Выход (' . Yii::$app->user->identity->username . ')',
//                ['class' => 'btn btn-link logout']
//            )
//            . Html::endForm()
//            . '</li>';
//    }
//    echo Nav::widget([
//        'options' => ['class' => 'navbar-nav navbar-right'],
//        'items' => $menuItems,
//    ]);
//    NavBar::end();
//    ?>

    <div class="wrapper">
<!--        --><?//= Breadcrumbs::widget([
//            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
//        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

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

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
