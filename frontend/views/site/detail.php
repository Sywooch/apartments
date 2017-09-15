<?php
use yii\widgets\ActiveForm;
use voime\GoogleMaps\Map;
use yii\widgets\Pjax;
use yii\helpers\Html;
use common\widgets\Translate;
use backend\models\Social;

$translit = new Translate();
$user = Yii::$app->user->identity;
$lang = Yii::$app->language;
$comment_count = 0;
$social = Social::findOne(['id' => 1]);
$this->title = Yii::t('app', 'Детали квартиры');
$this->registerJsFile('/frontend/web/js/comments.js', ['depends' => [\yii\web\JqueryAsset::className()]]);


$guests = ['гость', 'гостя', 'гостей'];
$rooms = ['комната', 'комнаты', 'комнат'];
$bed = ['спальное место', 'спальных места', 'спальных мест'];
?>

<aside class="sidebar sidebar_single">
    <?= $this->render('/layouts/main-responsive') ?>
</aside>

<div class="wrapper">
    <div class="singleflat_col">
        <h2 class="flat_single_header">
            <?php
                if($lang == 'ru'){
                    echo $apartment->title_ru;
                } elseif($lang == 'uk'){
                    echo $apartment->title_ua;
                } elseif($lang == 'en'){
                    echo $apartment->title_en;
                }
            ?>
        </h2>
        <?php if($lang == 'en'): ?>
            <h3 class="flat_single_adr"><?= $translit->translate(substr($apartment->coordinates, 0, -55)) ?></h3>
        <?php else: ?>
            <h3 class="flat_single_adr"><?= substr($apartment->coordinates, 0, -55) ?></h3>
        <?php endif; ?>
    </div>
    <div class="singleflat_right_sidebar">
        <ul class="flat_single">
            <li>
                <img class="xlogo_img" src="/frontend/web/img/room_icon.png" alt="">
                <span><?= $apartment->room_count ?></span>
                <?= Yii::t('app', $apartment->plural($apartment->room_count, $rooms)) ?>
            </li>
            <li>
                <img class="xlogo_img" src="/frontend/web/img/floar_icon.png" alt="">
                <span><?= $apartment->floor ?></span>
                <?= Yii::t('app', 'этаж') ?>
            </li>
            <li>
                <img class="xlogo_img" src="/frontend/web/img/sleepplace_icon.png" alt="">
                <span><?= $apartment->bed_count ?></span>
                <?= Yii::t('app', $apartment->plural($apartment->bed_count, $bed)) ?>
            </li>
            <li>
                <img class="xlogo_img xteam" src="/frontend/web/img/team.svg" alt="">
                <span><?= $apartment->guests ?></span>
                <?= Yii::t('app', $apartment->plural($apartment->guests , $guests)) ?>
            </li>
        </ul>
    </div>
</div>
<div class="slider_cont">
    <div class="flexslider">
        <ul class="slides" id="scrollPanel">
            <?php
            if(isset($images))
                foreach ($images as $image){
                    echo '<li><a href="#" class="fleximg"><img src="'.$image->image.'" alt="apartment_image" /></a></li>';
                }
            ?>
        </ul>
    </div>
</div>
<div class="wrapper">
    <div class="main_col">
        <p class="flat_single_descr">
            <?php if($lang == 'ru'){
                echo $apartment->description_ru;
            } elseif($lang == 'uk'){
                echo $apartment->description_ua;
            } elseif($lang == 'en'){
                echo $apartment->description_en;
            }
            ?>
        </p>
        <ul class="singleflat_paramethers">
            <li><span><?= Yii::t('app', 'Время выезда') ?>:</span><p><?= Yii::t('app', $apartment->facilities->time_out) ?></p></li>
            <li><span><?= Yii::t('app', 'Тип жилья') ?>:</span><p><?= Yii::t('app', mb_strtolower($apartment->type)) ?></p></li>
            <li><span><?= Yii::t('app', 'Время заезда') ?>:</span><p><?= Yii::t('app', $apartment->facilities->time_in) ?></p></li>
            <li><span><?= Yii::t('app', 'Ремонт') ?>:</span><p>
                <?php if($lang == 'en'): ?>
                    <?= $translit->translate($apartment->facilities->repairs) ?>
                <?php else: ?>
                    <?= $apartment->facilities->repairs ?>
                <?php endif; ?>
                </p></li>
            <li><span><?= Yii::t('app', 'Площадь') ?>:</span><p><?= $apartment->apartment_area ?> <?= Yii::t('app', 'м') ?><sup>2</sup></p></li>
            <li><span><?= Yii::t('app', 'Доплата за каждого последующего гостя') ?>:</span><p id="guest_price"><?= Yii::t('app', $apartment->facilities->guest_price) ?> ₴</p></li>
        </ul>


        <h2 class="flat_single_header comfortitems_header"><?= Yii::t('app', 'В квартире есть') ?>:</h2>

        <ul class="singleflat_comfort_items">
            <?php
            if($apartment->facilities->tv == 1){
                echo '<li class="tv">'.Yii::t('app', 'Телевизор').'</li>';
            }
            if($apartment->facilities->internet == 1){
                echo '<li class="inet">'.Yii::t('app', 'Интернет').'</li>';
            }
            if($apartment->facilities->iron == 1){
                echo '<li class="iron">'.Yii::t('app', 'Утюг').'</li>';
            }
            if($apartment->facilities->washer_machine == 1){
                echo '<li class="washer">'.Yii::t('app', 'Стиральная машина').'</li>';
            }
            if($apartment->facilities->plazm_tv == 1){
                echo '<li class="plasmatv">'.Yii::t('app', 'Плазменный телевизор').'</li>';
            }
            if($apartment->facilities->gas == 1){
                echo '<li class="gas_stove">'.Yii::t('app', 'Газовая плита').'</li>';
            }
            if($apartment->facilities->fridge == 1){
                echo '<li class="fridge">'.Yii::t('app', 'Холодильник').'</li>';
            }
            if($apartment->facilities->wifi == 1){
                echo '<li class="wifi">'.Yii::t('app', 'WiFi').'</li>';
            }
            if($apartment->facilities->balcony == 1){
                echo '<li class="balcony">'.Yii::t('app', 'Балкон').'</li>';
            }
            if($apartment->facilities->boiler == 1){
                echo '<li class="boiler">'.Yii::t('app', 'Бойлер').'</li>';
            }
            if($apartment->facilities->door == 1){
                echo '<li class="armored_door">'.Yii::t('app', 'Бронедверь').'</li>';
            }
            if($apartment->facilities->laptop == 1){
                echo '<li class="notebook">'.Yii::t('app', 'Место для работы на ноутбуке').'</li>';
            }
            if($apartment->facilities->smoke == 1){
                echo '<li class="smoke">'.Yii::t('app', 'Можно курить').'</li>';
            }
            if($apartment->facilities->conditioner == 1){
                echo '<li class="air_conditioning">'.Yii::t('app', 'Кондиционер').'</li>';
            }
            if($apartment->facilities->drying_machine == 1){
                echo '<li class="dryer">'.Yii::t('app', 'Сушильная машина').'</li>';
            }
            if($apartment->facilities->jacuzzi == 1){
                echo '<li class="hot_tub">'.Yii::t('app', 'Джакузи').'</li>';
            }
            if($apartment->facilities->separate_entrance == 1){
                echo '<li class="a_exit">'.Yii::t('app', 'Отдельный вход').'</li>';
            }
            if($apartment->facilities->pool == 1){
                echo '<li class="pool">'.Yii::t('app', 'Бассейн').'</li>';
            }
            ?>
        </ul>
    </div>
    <div class="right_sidebar">
        <ul class="flat_single_timeorder">
            <li>
                <span id="price_per_10_day"><?= $apartment->price_10 ?> ₴</span>
                <p><?= Yii::t('app', 'от 10 суток') ?></p>
            </li>
            <li>
                <span id="price_per_5_day"><?= $apartment->price_5 ?> ₴</span>
                <p><?= Yii::t('app', 'от 5 суток') ?></p>
            </li>
            <li>
                <span id="price_per_day"><?= $apartment->price_day ?> ₴</span>
                <p><?= Yii::t('app', 'за сутки') ?></p>
            </li>
            <li>
                <span><?= $apartment->price_night ?> ₴</span>
                <p><?= Yii::t('app', 'за ночь') ?></p>
            </li>
            <li>
                <span><?= $apartment->price_2 ?> ₴</span>
                <p><?= Yii::t('app', 'за 2 часа') ?></p>
            </li>
        </ul>

        <form id="booking_form" class="flat_single_orderform" action="">
            <div class="flattime">
                <p><span><?= Yii::t('app', 'Прибытие') ?></span><input type="text" class="timepicker" value="" id="some_class_1" required /></p>
                <p><span><?= Yii::t('app', 'Выезд') ?></span><input type="text" class="timepicker" value="" id="some_class_2" required /></p>
                <p><span><?= Yii::t('app', 'Гостей') ?></span>
                    <select id="guest_count">
                        <option value="0" selected></option>
                        <option value="1">1 <?= Yii::t('app', 'гость') ?></option>
                        <option value="2">2 <?= Yii::t('app', 'гостя') ?></option>
                        <option value="3">3 <?= Yii::t('app', 'гостя') ?></option>
                        <option value="4">4 <?= Yii::t('app', 'гостя') ?></option>
                        <option value="5">5 <?= Yii::t('app', 'гостей') ?></option>
                        <option value="6">6 <?= Yii::t('app', 'гостей') ?></option>
                        <option value="7">7 <?= Yii::t('app', 'гостей') ?></option>
                        <option value="8">8 <?= Yii::t('app', 'гостей') ?></option>
                    </select>
                </p>
            </div>
            <ul class="flatprice">
                <li>
                    <span id="multiplication" class="flatprice_description"></span>
                    <span  id="multiplication_price" class="flatprice_price"></span>
                </li>
                <li>
                    <span class="flatprice_description"><?= Yii::t('app', 'Сбор за услуги') ?></span>
                    <span id="service_charge" class="flatprice_price">50 ₴</span>
                </li>
                <li>
                    <span class="flatprice_description flatprice_bold"><?= Yii::t('app', 'Итого') ?></span>
                    <span id="result_price" class="flatprice_price flatprice_bold"></span>
                </li>
            </ul>
            <input class="flat_single_ordersubmit" type="submit" value="<?= Yii::t('app', 'Забронировать сейчас') ?>">
        </form>

        <div class="owner_nameblock">
            <?php if($lang == 'en'): ?>
                <span class="owner_name"><?= $translit->translate($apartment->owner) ?></span>
            <?php else: ?>
                <span class="owner_name"><?= $apartment->owner ?></span>
            <?php endif; ?>
            <span class="owner_phone"><?= $apartment->phone ?></span>
        </div>
        <div class="star_ratingblock">
            <div class="amountrate">
                <div class="flat_stars amount_all" data-score="<?= $rating['rating_total'] ?>"></div>
                <span><?= $count ?> <?= Yii::t('app', 'отзывов') ?></span>
                <ul class="ratelist">
                    <li><p><?= Yii::t('app', 'Цена/качество') ?></p><div class="flat_stars" data-score="<?= $rating['rating_price'] ?>"></div></li>
                    <li><p><?= Yii::t('app', 'Общение') ?></p><div class="flat_stars" data-score="<?= $rating['rating_communication'] ?>"></div></li>
                    <li><p><?= Yii::t('app', 'Чистота') ?></p><div class="flat_stars" data-score="<?= $rating['rating_clean'] ?>"></div></li>
                    <li><p><?= Yii::t('app', 'Расположение') ?></p><div class="flat_stars" data-score="<?= $rating['rating_place'] ?>"></div></li>
                </ul>
            </div>
        </div>
        <?php
        if(isset($comments)):
            foreach($comments as $comment):
        ?>
            <div class="feedback_block">
                <?php if(isset($comment->user->avatar)): ?>
                    <img class="user_feedback_ico" src="/frontend/web/<?= $comment->user->avatar ?>" alt="">
                <?php else: ?>
                    <img class="user_feedback_ico" src="/frontend/web/img/round.jpg" alt="">
                <?php endif; ?>
                <p class="feedback_people_name">
                    <span><?= $comment->user->surname.' '.$comment->user->name ?></span>
                    <span><?= $comment->city ?></span>
                </p>
                <div class="user_feedback_rating">
                    <div class="flat_stars" data-score="<?= $comment->rating ?>"></div>
                    <span>(<?php
                        if(Yii::$app->language == 'en'):
                            echo date('d F Y' , strtotime($comment->date));
                        else:
                            echo $orders->DateFormat($comment->date);
                        endif;
                        ?>)
                    </span>
                </div>
                <p id="count_read_more_<?= $comment_count ?>" class="feedback_text overflow_test"><?= $comment->comment ?></p>
                <a href="#read_more_<?= $comment_count ?>" id="read_more_<?= $comment_count ?>" class="people_readmore_feedback read_more_<?= $comment_count ?>"><?= Yii::t('app', 'Читать далее') ?></a>
            </div>
        <?php
                $comment_count++;
            endforeach;
            endif;
        ?>
        <?php if($count > 3): ?>
        <a href="#comments_show" id="comments_show" class="feedback_button other_feedback clearfix"><?= Yii::t('app', 'Другие отзывы') ?></a>
        <a href="#comments_show" id="comments_hide" class="feedback_button other_feedback clearfix hide_comment"><?= Yii::t('app', 'Скрыть отзывы') ?></a>
        <?php endif; ?>
        <a href="#openModal" class="feedback_button send_feedback clearfix"><?= Yii::t('app', 'Оставить отзыв') ?></a>
    </div>
</div>

<div id="openModal" class="modalDialog">
    <div>
        <a href="#close" title="<?= Yii::t('app', 'Закрыть') ?>" class="close"></a>
        <h2 class="modal_header"><?= Yii::t('app', 'Оставить отзыв') ?></h2>
        <?php  $form = ActiveForm::begin([
            'id' => 'comment-form',
            'action' => 'create-comment'
        ]) ?>
            <fieldset>
                <p><?= Yii::t('app', 'Город') ?></p>
                <input type="text" name="rate_city" placeholder="<?= Yii::t('app', 'Город') ?>" required>
                <input type="hidden" name="id" placeholder="<?= Yii::t('app', 'Город') ?>" value="<?= Yii::$app->request->get('id') ?>" required>
            </fieldset>
            <fieldset>
                <p><?= Yii::t('app', 'Текст отзыва') ?></p>
                <textarea name="rate_text" id="" cols="30" rows="5" required></textarea>
            </fieldset>
            <fieldset class="modal_rating">
                <p><?= Yii::t('app', 'Общая оценка') ?></p>
                <select size="1" name="total_rate" required>
                    <option disabled selected><?= Yii::t('app', 'Выберите оценку') ?></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </fieldset>
            <fieldset class="modal_rating">
                <p><?= Yii::t('app', 'Цена/качество') ?></p>
                <select size="1" name="price_quality" required>
                    <option disabled selected><?= Yii::t('app', 'Выберите оценку') ?></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </fieldset>
            <fieldset class="modal_rating">
                <p><?= Yii::t('app', 'Чистота') ?></p>
                <select size="1" name="cleaninig" required>
                    <option disabled selected><?= Yii::t('app', 'Выберите оценку') ?></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </fieldset>
            <fieldset class="modal_rating">
                <p><?= Yii::t('app', 'Общение') ?></p>
                <select size="1" name="responsibility" required>
                    <option disabled selected><?= Yii::t('app', 'Выберите оценку') ?></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </fieldset>
            <fieldset class="modal_rating">
                <p><?= Yii::t('app', 'Расположение') ?></p>
                <select size="1" name="location" required>
                    <option disabled selected><?= Yii::t('app', 'Выберите оценку') ?></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <input type="submit" value="<?= Yii::t('app', 'Добавить') ?>">
            </fieldset>
        <?php ActiveForm::end() ?>
    </div>
</div>

<div id="hidden_user_id">
    <?php if(isset($user)){
        echo '<input id="hidden_user_input_id" type="hidden" value="'.$user->id.'">';
    } ?>
</div>

<a href="#openSuccessModal" id="success" class="sidebar_btn sidebar_bonus hidden"></a>
<div id="openSuccessModal" class="modalDialog">
    <div>
        <a href="#close" title="Закрыть" class="close"></a>
        <h2 class="modal_header"><?= Yii::t('app', 'Ваш заказ успешно оформлен!') ?></h2>
        <p style="text-align: center"><?= Yii::t('app', 'Мы свяжемся с вами в течении 10 минут.') ?></p>
    </div>
</div>

<footer class="singleflat_footer">
    <div id="map_single">
        <?=
        Map::widget([
            'apiKey'=> 'AIzaSyDvdY_YjgJ2FCdyfMZ89DGodrrtOXpvETA',
            'zoom' => 11,
            'center'=>'Zaporozhye, UA',
            'markers' => $map_item,
        ]);
        ?>
    </div>
    <p class="footer_copyright">© <?= Yii::t('app', 'Аренда квартир') ?> <?= date('Y') ?></p>
    <nav class="footer_social">
        <?php if($social->f_status == 1): ?>
            <a class="imgoverlay" href="<?= $social->facebook ?>" target="_blank"><img src="/frontend/web/img/facebook-icon.png" title="facebook"></a>
        <?php endif; ?>
        <?php if($social->vk_status == 1): ?>
            <a class="imgoverlay" href="<?= $social->vk ?>" target="_blank"><img src="/frontend/web/img/vk-icon.png" title="vk"></a>
        <?php endif; ?>
        <?php if($social->g_status == 1): ?>
            <a class="imgoverlay" href="<?= $social->google ?>" target="_blank"><img src="/frontend/web/img/google--icon.png" title="googleplus"></a>
        <?php endif; ?>
        <?php if($social->t_status == 1): ?>
            <a class="imgoverlay" href="<?= $social->twitter ?>" target="_blank"><img src="/frontend/web/img/twitter-icon.png" title="twitter"></a>
        <?php endif; ?>
        <?php if($social->i_status == 1): ?>
            <a class="imgoverlay" href="<?= $social->instagram ?>" target="_blank"><img src="/frontend/web/img/instagram-icon.png" title="instagram"></a>
        <?php endif; ?>
    </nav>
</footer>