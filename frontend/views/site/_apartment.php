<?php
use yii\helpers\Html;
use yii\helpers\Url;

$lang = Yii::$app->language;
?>

    <div class="flatblock">
        <a href="#"><img class="flatimg" src="/frontend/web/img/flat.jpg" alt="flat picture"></a>
        <div class="nameblock">
            <h4><?= $model->room_count ?>к с джакузи.Центр города.WIFI</h4>
            <p class="flat_adress"><?= substr($model->coordinates, 0, -55).', '.$model->area.' '.Yii::t('app', 'район') ?></p>
        </div>
        <div class="priceblock">
            <p class="flat_price"><span><?= $model->price_day ?></span> ₴</p>
            <p><?= Yii::t('app', 'сутки') ?></p>
        </div>
        <div class="infoblock">
            <p class="filterblock">
                <!--<img src="img/iron_filter.svg" title="Розовый динозаврик">-->
                <img src="/frontend/web/img/iron_filter.png" title="Розовый динозаврик">
                <img src="/frontend/web/img/washer_filter.png" title="Розовый динозаврик2">
                <img src="/frontend/web/img/tv_filter.png" title="Розовый динозаврик3">
            </p>
            <p class="floar">
                <span><?= $model->room_count ?>к</span>
                <span><?= $model->floor ?> <?= Yii::t('app', 'этаж') ?></span>
            </p>
        </div>
    </div>

<?php //if($lang == 'ru'){
//    echo Html::a($model->title_ru, Url::to(['site/detail', 'id' => $model->id]));
//} else if($lang == 'ua'){
//    echo Html::a($model->title_ua, Url::to(['site/detail', 'id' => $model->id]));
//} else if($lang == 'en'){
//    echo Html::a($model->title_en, Url::to(['site/detail', 'id' => $model->id]));
//}?>