<?php
use yii\helpers\Html;
?>

<a href="#openModal_l" class="sidebar_btn sidebar_bonus"><?= Yii::t('app', 'Бонусная программа') ?></a>
<a href="#openModal_l" class="sidebar_btn sidebar_customers"><?= Yii::t('app', 'Постоянным клиентам') ?></a>
<a href="#openModal_l" class="sidebar_btn sidebar_friend"><?= Yii::t('app', 'Засели друга') ?></a>

<?php if(!Yii::$app->user->isGuest): ?>
    <a class="filter_topmenu_responsive" href="/<?= Yii::$app->language ?>/profile?id=<?= Yii::$app->user->identity->getId() ?>"><?= Yii::t('app', 'Личный кабинет') ?></a>
<?php endif; ?>
<a class="filter_topmenu_responsive" href="/<?= Yii::$app->language ?>/contact"><?= Yii::t('app', 'Контакты') ?></a>
<a class="filter_topmenu_responsive" href="/<?= Yii::$app->language ?>/about"><?= Yii::t('app', 'Сдай свое жилье') ?></a>
<?php
if(Yii::$app->user->isGuest):
    echo Html::a(Yii::t('app', 'Вход'), ['/site/login'], ['class' => 'filter_topmenu_responsive']);
else:
    echo Html::a(Yii::t('app', 'Выход').' ('.Yii::$app->user->identity->username.')', ['/site/logout'], ['class' => 'filter_topmenu_responsive','data' => ['method'=>'post']]);
endif;
?>