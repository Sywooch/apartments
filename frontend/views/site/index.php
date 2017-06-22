<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use voime\GoogleMaps\Map;

$this->title = Yii::t('app', 'Главная');
?>

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
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
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
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">6</a></li>
                    <li><a href="#">7</a></li>
                    <li><a href="#">8</a></li>
                    <li><a href="#">9</a></li>
                    <li><a href="#">10</a></li>
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
                    <li><input type="checkbox" id="check4" name="ApartmentSearch[image]" value="1" onclick="sendRequest();"><label for="check4"><?= Yii::t('app', 'Не менее 5 фото') ?></label></li>
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
                    <li><input type="checkbox" id="checkq4" name="ApartmentSearch[tv]" value="1" onclick="sendRequest();"><label for="checkq4"><?= Yii::t('app', 'Телевизор') ?></label></li>
                    <li><input type="checkbox" id="checkq5" name="ApartmentSearch[iron]" value="1" onclick="sendRequest();"><label for="checkq5"><?= Yii::t('app', 'Утюг') ?></label></li>
                    <li><input type="checkbox" id="checkq6" name="ApartmentSearch[plazm_tv]" value="1" onclick="sendRequest();"><label for="checkq6"><?= Yii::t('app', 'Плазменный телевизор') ?></label></li>
                    <li><input type="checkbox" id="checkq7" name="ApartmentSearch[fridge]" value="1" onclick="sendRequest();"><label for="checkq7"><?= Yii::t('app', 'Холодильник') ?></label></li>
                    <li><input type="checkbox" id="checkq61" name="ApartmentSearch[balcony]" value="1" onclick="sendRequest();"><label for="checkq61"><?= Yii::t('app', 'Балкон') ?></label></li>
                    <li><input type="checkbox" id="checkq612" name="ApartmentSearch[door]" value="1" onclick="sendRequest();"><label for="checkq612"><?= Yii::t('app', 'Бронедверь') ?></label></li>
                    <li><input type="checkbox" id="checkq613" name="ApartmentSearch[smoke]" value="1" onclick="sendRequest();"><label for="checkq613"><?= Yii::t('app', 'Можно курить') ?></label></li>
                    <li><input type="checkbox" id="checkq614" name="ApartmentSearch[drying_machine]" value="1" onclick="sendRequest();"><label for="checkq614"><?= Yii::t('app', 'Сушильная машина') ?></label></li>
                    <li><input type="checkbox" id="checkq615" name="ApartmentSearch[separate_entrance]" value="1" onclick="sendRequest();"><label for="checkq615"><?= Yii::t('app', 'Отдельный вход') ?></label></li>
                    <li><input type="checkbox" id="checkq616" name="ApartmentSearch[internet]" value="1" onclick="sendRequest();"><label for="checkq616"><?= Yii::t('app', 'Интернет') ?></label></li>
                    <li><input type="checkbox" id="checkq617" name="ApartmentSearch[washer_machine]" value="1" onclick="sendRequest();"><label for="checkq617"><?= Yii::t('app', 'Стиральная машина') ?></label></li>
                    <li><input type="checkbox" id="checkq618" name="ApartmentSearch[gas]" value="1" onclick="sendRequest();"><label for="checkq618"><?= Yii::t('app', 'Газовая плита') ?></label></li>
                    <li><input type="checkbox" id="checkq619" name="ApartmentSearch[wifi]" value="1" onclick="sendRequest();"><label for="checkq619"><?= Yii::t('app', 'Wi-Fi') ?></label></li>
                    <li><input type="checkbox" id="checkq620" name="ApartmentSearch[boiler]" value="1" onclick="sendRequest();"><label for="checkq620"><?= Yii::t('app', 'Бойлер') ?></label></li>
                    <li><input type="checkbox" id="checkq621" name="ApartmentSearch[laptop]" value="1" onclick="sendRequest();"><label for="checkq621"><?= Yii::t('app', 'Место для работы на ноутбуке') ?></label></li>
                    <li><input type="checkbox" id="checkq622" name="ApartmentSearch[conditioner]" value="1" onclick="sendRequest();"><label for="checkq622"><?= Yii::t('app', 'Кондиционер') ?></label></li>
                    <li><input type="checkbox" id="checkq623" name="ApartmentSearch[jacuzzi]" value="1" onclick="sendRequest();"><label for="checkq623"><?= Yii::t('app', 'Джакузи') ?></label></li>
                    <li><input type="checkbox" id="checkq624" name="ApartmentSearch[pool]" value="1" onclick="sendRequest();"><label for="checkq624"><?= Yii::t('app', 'Бассейн') ?></label></li>
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
    <a href="#openModal" class="sidebar_btn sidebar_bonus"><?= Yii::t('app', 'Бонусная программа') ?></a>
    <a href="#openModal" class="sidebar_btn sidebar_hourly"><?= Yii::t('app', 'Почасовое заселение') ?></a>
    <a href="#openModal" class="sidebar_btn sidebar_customers"><?= Yii::t('app', 'Постоянным клиентам') ?></a>
    <a href="#openModal" class="sidebar_btn sidebar_friend"><?= Yii::t('app', 'Засели друга') ?></a>

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

<div id="openModal" class="modalDialog">
    <div>
        <a href="#close" title="Закрыть" class="close"></a>
        <h2 class="modal_header">Модальное окно</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non.</p>
    </div>
</div>

<!--<div class="site-index">-->
<!---->
<!--    <div class="jumbotron">-->
<!--        <h1>--><?//= Yii::t('app', 'Мультиязычность') ?><!--</h1>-->
<!---->
<!--        <p class="lead">You have successfully created your Yii-powered application.</p>-->
<!---->
<!--        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>-->
<!--    </div>-->
<!---->
<!--    <div class="body-content">-->
<!--        <h2>Карта</h2>-->
<!--        --><?//=
//         Map::widget([
//            'apiKey'=> 'AIzaSyDvdY_YjgJ2FCdyfMZ89DGodrrtOXpvETA',
//            'zoom' => 15,
//            'center'=>'Zaporozhye, UA',
//            'width' => '700px',
//            'height' => '700px',
//            'markers' => $map_items,
//            'markerFitBounds'=>true
//        ]);
//        ?>
<!---->
<!--        --><?php //Pjax::begin(['id' => 'new_country']); ?>
<!---->
<!--        --><?php //$form = ActiveForm::begin([ 'id' => 'test','method' => 'get','options' => ['data-pjax' => true ]]); ?>
<!---->
<!--            --><?//= $form->field($searchModel, 'room_count')->dropDownList([
//                'prompt'=>'Выберите количество комнат...',
//                '1' => '1',
//                '2' => '2',
//                '3' => '3',
//                '4' => '4',
//                '5' => '5',
//            ]);
//            ?>
<!---->
<!--            --><?//= $form->field($searchModel, 'bed_count')->dropDownList([
//                'prompt'=>'Выберите количество спальных мест...',
//                '1' => '1',
//                '2' => '2',
//                '3' => '3',
//                '4' => '4',
//                '5' => '5',
//                '6' => '6',
//                '7' => '7',
//                '8' => '8',
//                '9' => '9',
//                '10' => '10',
//            ]);
//            ?>
<!---->
<!--            --><?//= $form->field($searchModel, 'area')->dropDownList([
//                'prompt'=>'',
//                'Александровский' => 'Александровский',
//                'Заводской' => 'Заводской',
//                'Коммунарский' => 'Коммунарский',
//                'Днепровский' => 'Днепровский',
//                'Вознесеновский' => 'Вознесеновский',
//                'Хортицкий' => 'Хортицкий',
//                'Шевченковский' => 'Шевченковский',
//            ]);
//            ?>
<!---->
<!--            --><?//= $form->field($searchModel, 'type')->checkboxList(['Дом'=>'Дом', 'Квартира'=>'Квартира', 'Комната'=>'Комната']) ?>
<!---->
<!--            --><?//= $form->field($searchModel, 'stock')->checkbox(['uncheckValue'=>NULL]) ?>
<!--            <div class="form-group">-->
<!--                <div class="col-lg-6">-->
<!--                    --><?//= $form->field($searchModel, 'min_price')->textInput()->label('От') ?>
<!--                </div>-->
<!--                <div class="col-lg-6">-->
<!--                    --><?//= $form->field($searchModel, 'max_price')->textInput()->label('До') ?>
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <h1 style="text-align: center">Удобства</h1><br><br>-->
<!--            <div class="row">-->
<!--                <div class="col-md-3">-->
<!--                    --><?//= $form->field($searchModel, 'elevator')->checkbox() ?>
<!---->
<!--                    --><?//= $form->field($searchModel, 'internet')->checkbox() ?>
<!---->
<!--                    --><?//= $form->field($searchModel, 'animals')->checkbox() ?>
<!---->
<!--                    --><?//= $form->field($searchModel, 'kitchen')->checkbox() ?>
<!---->
<!--                    --><?//= $form->field($searchModel, 'gym')->checkbox() ?>
<!---->
<!--                    --><?//= $form->field($searchModel, 'intercom')->checkbox() ?>
<!--                </div>-->
<!--                <div class="col-md-3">-->
<!--                    --><?//= $form->field($searchModel, 'fireplace')->checkbox() ?>
<!---->
<!--                    --><?//= $form->field($searchModel, 'waggon')->checkbox() ?>
<!---->
<!--                    --><?//= $form->field($searchModel, 'heating')->checkbox() ?>
<!---->
<!--                    --><?//= $form->field($searchModel, 'wifi')->checkbox() ?>
<!---->
<!--                    --><?//= $form->field($searchModel, 'disabled')->checkbox() ?>
<!---->
<!--                    --><?//= $form->field($searchModel, 'iron')->checkbox() ?>
<!--                </div>-->
<!--                <div class="col-md-3">-->
<!--                    --><?//= $form->field($searchModel, 'drying_machine')->checkbox() ?>
<!---->
<!--                    --><?//= $form->field($searchModel, 'family')->checkbox() ?>
<!---->
<!--                    --><?//= $form->field($searchModel, 'parking')->checkbox() ?>
<!---->
<!--                    --><?//= $form->field($searchModel, 'washer_machine')->checkbox() ?>
<!---->
<!--                    --><?//= $form->field($searchModel, 'hair_dryer')->checkbox() ?>
<!---->
<!--                    --><?//= $form->field($searchModel, 'tv')->checkbox() ?>
<!--                </div>-->
<!--                <div class="col-md-3">-->
<!--                    --><?//= $form->field($searchModel, 'conditioner')->checkbox() ?>
<!---->
<!--                    --><?//= $form->field($searchModel, 'cable_tv')->checkbox() ?>
<!---->
<!--                    --><?//= $form->field($searchModel, 'smoke')->checkbox() ?>
<!---->
<!--                    --><?//= $form->field($searchModel, 'separate_entrance')->checkbox() ?>
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="form-group">-->
<!--                --><?//= Html::submitButton('Поиск', ['class' => 'btn btn-success']) ?>
<!--                --><?//= Html::a('Сброс фильтров', ['index'], ['class' => 'btn btn-danger']) ?>
<!--            </div>-->
<!---->
<!--        --><?php //ActiveForm::end(); ?>
<!---->
<!--        --><?//= ListView::widget([
//            'dataProvider' => $dataProvider,
//            'itemView' => '_apartment',
//        ]);?>
<!---->
<!--        --><?php
//        $this->registerJs(
//            '$("#test").submit(function(e){
//                $("#test").find("select").each(function() {
//                    var select = $(this);
//                    if (!select.val() || select.val() == "prompt") {
//                        select.remove(); // or input.prop("disabled", true);
//                    }
//                });
//                $("#test").find("input[type=\'checkbox\']").each(function() {
//                $(\'input[type="hidden"]\').remove();
//                    var input = $(this);
//                    if (input.val() == 0) {
//                        input.remove(); // or input.prop("disabled", true);
//                    }
//                });
//            });'
//        );
//        ?>
<!--        --><?php //Pjax::end(); ?>
<!--    </div>-->
<!--</div>-->
