<?php
use yii\helpers\Html;
use yii\helpers\Url;

$lang = Yii::$app->language;
?>

    <div class="flatblock">
        <a href="#"><img class="flatimg" src="/frontend/web/img/flat.jpg" alt="flat picture"></a>
        <div class="nameblock">
            <h4>2к с джакузи.Центр города.WIFI</h4>
            <p class="flat_adress">пр-т Соборный (Ленина), 129</p>
        </div>
        <div class="priceblock">
            <p class="flat_price"><span>1450</span> ₴</p>
            <p>сутки</p>
        </div>
        <div class="infoblock">
            <p class="filterblock">
                <!--<img src="img/iron_filter.svg" title="Розовый динозаврик">-->
                <img src="/frontend/web/img/iron_filter.png" title="Розовый динозаврик">
                <img src="/frontend/web/img/washer_filter.png" title="Розовый динозаврик2">
                <img src="/frontend/web/img/tv_filter.png" title="Розовый динозаврик3">
            </p>
            <p class="floar">
                <span>5к</span>
                <span>2 этаж</span>
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