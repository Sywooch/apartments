<?php
use yii\helpers\Html;
use yii\helpers\Url;

$lang = Yii::$app->language;
$image = \common\models\Image::findOne(['apartment_id' => $model->id]);
?>

    <div class="flatblock">
        <a href="/site/detail?id=<?= $model->id ?>"><img class="flatimg" src="<?= $image->image ?>" alt="flat picture"></a>
        <div class="nameblock">
            <?php if($lang == 'ru'){
                echo '<h4>'.$model->title_ru.'</h4>';
            } elseif($lang == 'ua'){
                echo '<h4>'.$model->title_ua.'</h4>';
            } elseif($lang == 'en'){
                echo '<h4>'.$model->title_en.'</h4>';
            }
            ?>
            <p class="flat_adress"><?= substr($model->coordinates, 0, -55).', '.$model->area.' '.Yii::t('app', 'район') ?></p>
        </div>
        <div class="priceblock">
            <p class="flat_price"><span><?= $model->price_day ?></span> ₴</p>
            <p><?= Yii::t('app', 'сутки') ?></p>
        </div>
        <div class="infoblock">
            <p class="filterblock">
                <?php
                    if($model->facilities->tv == 1){
                        echo '<img src="/frontend/web/img/tv.svg" title="'.Yii::t('app', 'Телевизор').'">';
                    }
                    if($model->facilities->internet == 1){
                        echo '<img src="/frontend/web/img/inet.svg" title="'.Yii::t('app', 'Интернет').'">';
                    }
                    if($model->facilities->iron == 1){
                        echo '<img src="/frontend/web/img/iron.svg" title="'.Yii::t('app', 'Утюг').'">';
                    }
                    if($model->facilities->washer_machine == 1){
                        echo '<img src="/frontend/web/img/washer.svg" title="'.Yii::t('app', 'Стиральная машина').'">';
                    }
                    if($model->facilities->plazm_tv == 1){
                        echo '<img src="/frontend/web/img/plasmatv.svg" title="'.Yii::t('app', 'Плазменный телевизор').'">';
                    }
                    if($model->facilities->gas == 1){
                        echo '<img src="/frontend/web/img/gas_stove.svg" title="'.Yii::t('app', 'Газовая плита').'">';
                    }
                    if($model->facilities->fridge == 1){
                        echo '<img src="/frontend/web/img/fridge.svg" title="'.Yii::t('app', 'Холодильник').'">';
                    }
                    if($model->facilities->wifi == 1){
                        echo '<img src="/frontend/web/img/wifi.svg" title="'.Yii::t('app', 'Wi-Fi').'">';
                    }
                    if($model->facilities->balcony == 1){
                        echo '<img src="/frontend/web/img/balcony.svg" title="'.Yii::t('app', 'Балкон').'">';
                    }
                    if($model->facilities->boiler == 1){
                        echo '<img src="/frontend/web/img/boiler.svg" title="'.Yii::t('app', 'Бойлер').'">';
                    }
                    if($model->facilities->door == 1){
                        echo '<img src="/frontend/web/img/armored_door.svg" title="'.Yii::t('app', 'Бронедверь').'">';
                    }
                    if($model->facilities->laptop == 1){
                        echo '<img src="/frontend/web/img/notebook.svg" title="'.Yii::t('app', 'Место для работы на ноутбуке').'">';
                    }
                    if($model->facilities->smoke == 1){
                        echo '<img src="/frontend/web/img/smoke.svg" title="'.Yii::t('app', 'Можно курить').'">';
                    }
                    if($model->facilities->conditioner == 1){
                        echo '<img src="/frontend/web/img/air-conditioning.svg" title="'.Yii::t('app', 'Кондиционер').'">';
                    }
                    if($model->facilities->drying_machine == 1){
                        echo '<img src="/frontend/web/img/dryer.svg" title="'.Yii::t('app', 'Сушильная машина').'">';
                    }
                    if($model->facilities->jacuzzi == 1){
                        echo '<img src="/frontend/web/img/hot_tub.svg" title="'.Yii::t('app', 'Джакузи').'">';
                    }
                    if($model->facilities->separate_entrance == 1){
                        echo '<img src="/frontend/web/img/key.svg" title="'.Yii::t('app', 'Отдельный вход').'">';
                    }
                    if($model->facilities->pool == 1){
                        echo '<img src="/frontend/web/img/pool.svg" title="'.Yii::t('app', 'Бассейн').'">';
                    }
                ?>
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
