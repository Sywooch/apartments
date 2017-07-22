<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use voime\GoogleMaps\Map;

$this->title = Yii::t('app', 'Главная');
?>
<div class="wrapper">
    <aside class="sidebar">
        <?php $form = ActiveForm::begin(['id' => 'search-filters','method' => 'get','options' => ['data-pjax' => true ], 'class'=>'sidebar_filters']) ?>
            <div class="set">
                <a href="#">
                    <img class="filter_img" src="/frontend/web/img/sidebar-roomcount.png" data-hover="/frontend/web/img/sidebar-roomcount_hover.png" data-src="/frontend/web/img/sidebar-roomcount.png" alt="room_count">
                    <span class="sidebar_link_description"><?= Yii::t('app', 'Количество') ?><br><?= Yii::t('app', 'комнат') ?></span>
                    <i class="filter-plus"></i>
                </a>
                <div class="content">
                    <ul class="filter_list filter_room_count">
                        <li>
                            <div class="option-group">
                                <input id="room_one" value="1" name="ApartmentSearch[room_count]" onclick="sendRequest();" type="radio">
                                <label for="room_one">1</label>
                            </div>
                        </li>
                        <li>
                            <div class="option-group">
                                <input id="room_two" value="2" name="ApartmentSearch[room_count]" onclick="sendRequest();" type="radio">
                                <label for="room_two">2</label>
                            </div>
                        </li>
                        <li>
                            <div class="option-group">
                                <input id="room_three" value="3" name="ApartmentSearch[room_count]" onclick="sendRequest();" type="radio">
                                <label for="room_three">3</label>
                            </div>
                        </li>
                        <li>
                            <div class="option-group">
                                <input id="room_four" value="4" name="ApartmentSearch[room_count]" onclick="sendRequest();" type="radio">
                                <label for="room_four">4</label>
                            </div>
                        </li>
                        <li>
                            <div class="option-group">
                                <input id="room_five" value="5" name="ApartmentSearch[room_count]" onclick="sendRequest();" type="radio">
                                <label for="room_five">5</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="set">
                <a href="#">
                    <img class="filter_img" src="/frontend/web/img/sidebar-sleepplace.png" data-hover="/frontend/web/img/sidebar-sleepplace_hover.png" data-src="/frontend/web/img/sidebar-sleepplace.png" alt="room_count">
                    <span class="sidebar_link_description"><?= Yii::t('app', 'Количество') ?> <br> <?= Yii::t('app', 'спальных мест') ?></span>
                    <i class="filter-plus"></i>
                </a>
                <div class="content">
                    <ul class="filter_list filter_sleep_count">
                        <li>
                            <div class="option-group">
                                <input id="sleep_one" value="1" name="ApartmentSearch[bed_count]" onclick="sendRequest();" type="radio">
                                <label for="sleep_one">1</label>
                            </div>
                        </li>
                        <li>
                            <div class="option-group">
                                <input id="sleep_two" value="2" name="ApartmentSearch[bed_count]" onclick="sendRequest();" type="radio">
                                <label for="sleep_two">2</label>
                            </div>
                        </li>
                        <li>
                            <div class="option-group">
                                <input id="sleep_three" value="3" name="ApartmentSearch[bed_count]" onclick="sendRequest();" type="radio">
                                <label for="sleep_three">3</label>
                            </div>
                        </li>
                        <li>
                            <div class="option-group">
                                <input id="sleep_four" value="4" name="ApartmentSearch[bed_count]" onclick="sendRequest();" type="radio">
                                <label for="sleep_four">4</label>
                            </div>
                        </li>
                        <li>
                            <div class="option-group">
                                <input id="sleep_five" value="5" name="ApartmentSearch[bed_count]" onclick="sendRequest();" type="radio">
                                <label for="sleep_five">5</label>
                            </div>
                        </li>

                        <li>
                            <div class="option-group">
                                <input id="sleep_six" value="6" name="ApartmentSearch[bed_count]" onclick="sendRequest();" type="radio">
                                <label for="sleep_six">6</label>
                            </div>
                        </li>
                        <li>
                            <div class="option-group">
                                <input id="sleep_seven" value="7" name="ApartmentSearch[bed_count]" onclick="sendRequest();" type="radio">
                                <label for="sleep_seven">7</label>
                            </div>
                        </li>
                        <li>
                            <div class="option-group">
                                <input id="sleep_eight" value="8" name="ApartmentSearch[bed_count]" onclick="sendRequest();" type="radio">
                                <label for="sleep_eight">8</label>
                            </div>
                        </li>
                        <li>
                            <div class="option-group">
                                <input id="sleep_nine" value="9" name="ApartmentSearch[bed_count]" onclick="sendRequest();" type="radio">
                                <label for="sleep_nine">9</label>
                            </div>
                        </li>
                        <li>
                            <div class="option-group">
                                <input id="sleep_ten" value="10" name="ApartmentSearch[bed_count]" onclick="sendRequest();" type="radio">
                                <label for="sleep_ten">10</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="set">
                <a href="#">
                    <img class="filter_img" src="/frontend/web/img/house_type.png" data-hover="/frontend/web/img/house_type_hover.png" data-src="/frontend/web/img/house_type.png" alt="house_type">
                    <span class="sidebar_link_description"><?= Yii::t('app', 'Тип') ?><br><?= Yii::t('app', 'жилья') ?></span>
                    <i class="filter-plus"></i>
                </a>
                <div class="content">
                    <ul class="filter_list filter_house_type">
                        <li><input type="checkbox" id="check1" name="ApartmentSearch[type][]" value="Дом" onclick="sendRequest();"><label for="check1"><?= Yii::t('app', 'Дом') ?></label></li>
                        <li><input type="checkbox" id="check2" name="ApartmentSearch[type][]" value="Квартира" onclick="sendRequest();"><label for="check2"><?= Yii::t('app', 'Квартира') ?></label></li>
                        <li><input type="checkbox" id="check3" name="ApartmentSearch[type][]" value="Комната" onclick="sendRequest();"><label for="check3"><?= Yii::t('app', 'Комната') ?></label></li>
                    </ul>
                </div>
            </div>
            <div class="set">
                <a href="#">
                    <img class="filter_img" src="/frontend/web/img/sidebar_money.png" data-hover="/frontend/web/img/sidebar_money_hover.png" data-src="/frontend/web/img/sidebar_money.png" alt="house_price">
                    <span class="sidebar_link_description"><?= Yii::t('app', 'Цена') ?><br><?= Yii::t('app', 'за сутки') ?></span>
                    <i class="filter-plus"></i>
                </a>
                <div class="content">
                    <span class="filter_pricerange"><?= Yii::t('app', 'от') ?> <input type="number" name="ApartmentSearch[min_price]"/ onblur="sendRequest();"></span>
                    <span class="filter_pricerange"><?= Yii::t('app', 'до') ?> <input type="number" name="ApartmentSearch[max_price]"/ onblur="sendRequest();"></span>
                </div>
            </div>
            <div class="set">
                <a href="#">
                    <img class="filter_img" src="/frontend/web/img/sidebar_additional_param.png" data-hover="/frontend/web/img/sidebar_additional_param_hover.png" data-src="/frontend/web/img/sidebar_additional_param.png" alt="additional_param">
                    <span class="sidebar_link_description"><?= Yii::t('app', 'Дополнительные') ?> <br><?= Yii::t('app', 'параметры') ?></span>
                    <i class="filter-plus"></i>
                </a>
                <div class="content">
                    <ul class="filter_list filter_additional_param">
<!--                        <li><input type="checkbox" id="check4" name="ApartmentSearch[image]" value="1" onclick="sendRequest();"><label for="check4">--><?//= Yii::t('app', 'Не менее 5 фото') ?><!--</label></li>-->
                        <li><input type="checkbox" id="check5" name="ApartmentSearch[comment]" value="1" onclick="sendRequest();"><label for="check5"><?= Yii::t('app', 'Только с отзывами') ?></label></li>
                        <li><input type="checkbox" id="check6" name="ApartmentSearch[stock]" value="1" onclick="sendRequest();"><label for="check6"><?= Yii::t('app', 'Акционные') ?></label></li>
                    </ul>
                </div>
            </div>

            <div class="set">
                <a href="#">
                    <img class="filter_img" src="/frontend/web/img/sidebar_bedroom.png" data-hover="/frontend/web/img/sidebar_bedroom_hover.png" data-src="/frontend/web/img/sidebar_bedroom.png" alt="house_type">
                    <span class="sidebar_link_description"><?= Yii::t('app', 'Список') ?> <br><?= Yii::t('app', 'удобств') ?></span>
                    <i class="filter-plus"></i>
                </a>
                <div class="content">
                    <ul class="filter_list filter_comfort_param">
                        <li><input type="checkbox" id="param_tv" name="ApartmentSearch[tv]" value="1" onclick="sendRequest();"><label for="param_tv"><?= Yii::t('app', 'Телевизор') ?><img src="/frontend/web/img/tv.svg" alt="tv_ico"></label></li>
                        <li><input type="checkbox" id="param_inet" name="ApartmentSearch[internet]" value="1" onclick="sendRequest();"><label for="param_inet"><?= Yii::t('app', 'Интернет') ?><img src="/frontend/web/img/inet.svg" alt="inet_ico"></label></li>
                        <li><input type="checkbox" id="param_iron" name="ApartmentSearch[iron]" value="1" onclick="sendRequest();"><label for="param_iron"><?= Yii::t('app', 'Утюг') ?><img src="/frontend/web/img/iron.svg" alt="iron_ico"></label></li>
                        <li><input type="checkbox" id="param_washer" name="ApartmentSearch[washer_machine]" value="1" onclick="sendRequest();"><label for="param_washer"><?= Yii::t('app', 'Стиральная машина') ?><img src="/frontend/web/img/washer.svg" alt="washer_ico"></label></li>
                        <li><input type="checkbox" id="param_plasmatv" name="ApartmentSearch[plazm_tv]" value="1" onclick="sendRequest();"><label for="param_plasmatv"><?= Yii::t('app', 'Плазменный телевизор') ?><img src="/frontend/web/img/plasmatv.svg" alt="plasmatv_ico"></label></li>
                        <li><input type="checkbox" id="param_gas_stove" name="ApartmentSearch[gas]" value="1" onclick="sendRequest();"><label for="param_gas_stove"><?= Yii::t('app', 'Газовая плита') ?><img src="/frontend/web/img/gas_stove.svg" alt="gas_stove_ico"></label></li>
                        <li><input type="checkbox" id="param_fridge" name="ApartmentSearch[fridge]" value="1" onclick="sendRequest();"><label for="param_fridge"><?= Yii::t('app', 'Холодильник') ?><img src="/frontend/web/img/fridge.svg" alt="fridge_ico"></label></li>
                        <li><input type="checkbox" id="param_wifi" name="ApartmentSearch[wifi]" value="1" onclick="sendRequest();"><label for="param_wifi"><?= Yii::t('app', 'Wi-Fi') ?><img src="/frontend/web/img/wifi.svg" alt="wifi_ico"></label></li>
                        <li><input type="checkbox" id="param_balcony" name="ApartmentSearch[balcony]" value="1" onclick="sendRequest();"><label for="param_balcony"><?= Yii::t('app', 'Балкон') ?><img src="/frontend/web/img/balcony.svg" alt="balcony_ico"></label></li>
                        <li><input type="checkbox" id="param_boiler" name="ApartmentSearch[boiler]" value="1" onclick="sendRequest();"><label for="param_boiler"><?= Yii::t('app', 'Бойлер') ?><img src="/frontend/web/img/boiler.svg" alt="boiler_ico"></label></li>
                        <li><input type="checkbox" id="param_armored_door" name="ApartmentSearch[door]" value="1" onclick="sendRequest();"><label for="param_armored_door"><?= Yii::t('app', 'Бронедверь') ?><img src="/frontend/web/img/armored_door.svg" alt="armored_door_ico"></label></li>
                        <li><input type="checkbox" id="param_notebook" name="ApartmentSearch[laptop]" value="1" onclick="sendRequest();"><label for="param_notebook"><?= Yii::t('app', 'Место для работы на ноутбуке') ?><img src="/frontend/web/img/notebook.svg" alt="notebook_ico"></label></li>
                        <li><input type="checkbox" id="param_smoke" name="ApartmentSearch[smoke]" value="1" onclick="sendRequest();"><label for="param_smoke"><?= Yii::t('app', 'Можно курить') ?><img src="/frontend/web/img/smoke.svg" alt="smoke_ico"></label></li>
                        <li><input type="checkbox" id="param_air_conditioning" name="ApartmentSearch[conditioner]" value="1" onclick="sendRequest();"><label for="param_air_conditioning"><?= Yii::t('app', 'Кондиционер') ?><img src="/frontend/web/img/air-conditioning.svg" alt="air_conditioning_ico"></label></li>
                        <li><input type="checkbox" id="param_1" name="ApartmentSearch[drying_machine]" value="1" onclick="sendRequest();"><label for="param_1"><?= Yii::t('app', 'Сушильная машина') ?><img src="/frontend/web/img/dryer.svg" alt="dryer_ico"></label></li>
                        <li><input type="checkbox" id="param_2" name="ApartmentSearch[jacuzzi]" value="1" onclick="sendRequest();"><label for="param_2"><?= Yii::t('app', 'Джакузи') ?><img src="/frontend/web/img/hot_tub.svg" alt="hot_tub_ico"></label></li>
                        <li><input type="checkbox" id="param_3" name="ApartmentSearch[separate_entrance]" value="1" onclick="sendRequest();"><label for="param_3"><?= Yii::t('app', 'Отдельный вход') ?><img src="/frontend/web/img/key.svg" alt="key_ico"></label></li>
                        <li><input type="checkbox" id="param_4" name="ApartmentSearch[pool]" value="1" onclick="sendRequest();"><label for="param_4"><?= Yii::t('app', 'Бассейн') ?><img src="/frontend/web/img/pool.svg" alt="pool_ico"></label></li>
                    </ul>
                </div>
            </div>

            <div class="set">
                <a href="#">
                    <img class="filter_img" src="/frontend/web/img/sidebar_flug.png" data-hover="/frontend/web/img/sidebar_flug_hover.png" data-src="/frontend/web/img/sidebar_flug.png" alt="house_type">
                    <span class="sidebar_link_description"><?= Yii::t('app', 'Район') ?></span>
                    <i class="filter-plus"></i>
                </a>
                <div class="content">
                    <ul class="filter_list filter_area">
                        <li><input type="checkbox" id="check4area" name="ApartmentSearch[area][]" value="Александровский" onclick="sendRequest();"><label for="check4area"><?= Yii::t('app', 'Александровский') ?><br><i>(<?= Yii::t('app', 'Жовтневый') ?>)</i></label></li>
                        <li><input type="checkbox" id="check6area4" name="ApartmentSearch[area][]" value="Заводской" onclick="sendRequest();"><label for="check6area4"><?= Yii::t('app', 'Заводской') ?></label></li>
                        <li><input type="checkbox" id="check6area2" name="ApartmentSearch[area][]" value="Коммунарский" onclick="sendRequest();"><label for="check6area2"><?= Yii::t('app', 'Коммунарский') ?></label></li>
                        <li><input type="checkbox" id="check5area" name="ApartmentSearch[area][]" value="Днепровский" onclick="sendRequest();"><label for="check5area"><?= Yii::t('app', 'Днепровский') ?><br><i>(<?= Yii::t('app', 'Ленинский') ?>)</i></label></li>
                        <li><input type="checkbox" id="check6area3" name="ApartmentSearch[area][]" value="Вознесеновский" onclick="sendRequest();"><label for="check6area3"><?= Yii::t('app', 'Вознесеновский') ?><br><i>(<?= Yii::t('app', 'Орджоникидзевский') ?>)</i></label></li>
                        <li><input type="checkbox" id="check6area" name="ApartmentSearch[area][]" value="Хортицкий" onclick="sendRequest();"><label for="check6area"><?= Yii::t('app', 'Хортицкий') ?></label></li>
                        <li><input type="checkbox" id="check6area1" name="ApartmentSearch[area][]" value="Шевченковский" onclick="sendRequest();"><label for="check6area1"><?= Yii::t('app', 'Шевченковский') ?></label></li>
                    </ul>
                </div>
            </div>
        <?php ActiveForm::end() ?>

        <?= $this->render('/layouts/main-responsive') ?>

    </aside>

    <section class="flat" id="apartment-list">
        <?= $this->renderAjax('_apartment_list', [
            'dataProvider' => $dataProvider,
        ]) ?>
    </section>

    <div class="map_wrapper">
        <div id="map">
            <?=
                Map::widget([
                    'apiKey'=> 'AIzaSyDvdY_YjgJ2FCdyfMZ89DGodrrtOXpvETA',
                    'zoom' => 15,
                    'center'=>'Zaporozhye, UA',
                    'markers' => $map_items,
                    'markerFitBounds'=>true,
                ]);
            ?>
        </div>
    </div>
</div>

<script>
    var history_map = document.querySelector('#map');
    var history_map_resize = function () {
        var h = 0;
        Array.prototype.forEach.call(history_map.parentNode.children, function (e) {
            if (e !== history_map) h += e.getBoundingClientRect().height;
        });
        if (window.innerHeight > h) history_map.style.height = window.innerHeight - h -100 + 'px';
    };
    window.addEventListener('resize', history_map_resize, false);
    window.addEventListener('orientationchange', history_map_resize, false);
    history_map_resize();
</script>