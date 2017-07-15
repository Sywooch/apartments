<?php
use yii\widgets\ActiveForm;
use voime\GoogleMaps\Map;
use yii\widgets\Pjax;
use yii\helpers\Html;

$lang = Yii::$app->language;
$this->title = Yii::t('app', 'Детали квартиры');
?>

<div class="wrapper">
    <div class="main_col">
        <h2 class="flat_single_header">
            <?php
                if($lang == 'ru'){
                    echo $apartment->title_ru;
                } elseif($lang == 'ua'){
                    echo $apartment->title_ua;
                } elseif($lang == 'en'){
                    echo $apartment->title_en;
                }
            ?>
        </h2>
        <h3 class="flat_single_adr"><?= substr($apartment->coordinates, 0, -55) ?></h3>
    </div>
    <div class="right_sidebar">
        <ul class="flat_single">
            <li>
                <img class="xlogo_img" src="/frontend/web/img/room_icon.png" alt="">
                <span><?= $apartment->room_count ?></span>
                <?= Yii::t('app', 'комнаты') ?>
            </li>
            <li>
                <img class="xlogo_img" src="/frontend/web/img/floar_icon.png" alt="">
                <span><?= $apartment->floor ?></span>
                <?= Yii::t('app', 'этаж') ?>
            </li>
            <li>
                <img class="xlogo_img" src="/frontend/web/img/sleepplace_icon.png" alt="">
                <span><?= $apartment->bed_count ?></span>
                <?= Yii::t('app', 'спальных места') ?>
            </li>
            <li>
                <img class="xlogo_img" src="/frontend/web/img/guest_icon.png" alt="">
                <span><?= $apartment->guests ?></span>
                <?= Yii::t('app', 'гостей') ?>
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
            } elseif($lang == 'ua'){
                echo $apartment->description_ua;
            } elseif($lang == 'en'){
                echo $apartment->description_en;
            }
            ?>
        </p>
        <ul class="singleflat_paramethers">
            <li><span><?= Yii::t('app', 'Тип жилья') ?>:</span><p><?= Yii::t('app', mb_strtolower($apartment->type)) ?></p></li>
            <li><span><?= Yii::t('app', 'Время заезда') ?>:</span><p><?= Yii::t('app', $apartment->facilities->time_in) ?></p></li>
            <li><span><?= Yii::t('app', 'Время выезда') ?>:</span><p><?= Yii::t('app', $apartment->facilities->time_out) ?></p></li>
            <li><span><?= Yii::t('app', 'Ремонт') ?>:</span><p><?= $apartment->facilities->repairs ?></p></li>
            <li><span><?= Yii::t('app', 'Площадь') ?>:</span><p><?= $apartment->apartment_area ?> <?= Yii::t('app', 'м') ?><sup>2</sup></p></li>
            <li><span><?= Yii::t('app', 'Доплата за каждого последующего гостя') ?>:</span><p id="guest_price"><?= Yii::t('app', $apartment->facilities->guest_price) ?> ₴</p></li>
        </ul>

        <ul class="singleflat_comfort_items">
            <?php
            if($apartment->facilities->tv == 1){
                echo '<li class="tv">'.Yii::t('app', 'Телевизор').'</li>';
            } else {
                echo '<li class="tv"><s>'.Yii::t('app', 'Телевизор').'</s></li>';
            }
            if($apartment->facilities->internet == 1){
                echo '<li class="inet">'.Yii::t('app', 'Интернет').'</li>';
            }else {
                echo '<li class="inet"><s>'.Yii::t('app', 'Интернет').'</s></li>';
            }
            if($apartment->facilities->iron == 1){
                echo '<li class="iron">'.Yii::t('app', 'Утюг').'</li>';
            }else {
                echo '<li class="iron"><s>'.Yii::t('app', 'Утюг').'</s></li>';
            }
            if($apartment->facilities->washer_machine == 1){
                echo '<li class="washer">'.Yii::t('app', 'Стиральная машина').'</li>';
            }else {
                echo '<li class="washer"><s>'.Yii::t('app', 'Стиральная машина').'</s></li>';
            }
            if($apartment->facilities->plazm_tv == 1){
                echo '<li class="plasmatv">'.Yii::t('app', 'Плазменный телевизор').'</li>';
            }else {
                echo '<li class="plasmatv"><s>'.Yii::t('app', 'Плазменный телевизор').'</s></li>';
            }
            if($apartment->facilities->gas == 1){
                echo '<li class="gas_stove">'.Yii::t('app', 'Газовая плита').'</li>';
            }else {
                echo '<li class="gas_stove"><s>'.Yii::t('app', 'Газовая плита').'</s></li>';
            }
            if($apartment->facilities->fridge == 1){
                echo '<li class="fridge">'.Yii::t('app', 'Холодильник').'</li>';
            }else {
                echo '<li class="fridge"><s>'.Yii::t('app', 'Холодильник').'</s></li>';
            }
            if($apartment->facilities->wifi == 1){
                echo '<li class="wifi">'.Yii::t('app', 'WiFi').'</li>';
            }else {
                echo '<li class="wifi"><s>'.Yii::t('app', 'WiFi').'</s></li>';
            }
            if($apartment->facilities->balcony == 1){
                echo '<li class="balcony">'.Yii::t('app', 'Балкон').'</li>';
            }else {
                echo '<li class="balcony"><s>'.Yii::t('app', 'Балкон').'</s></li>';
            }
            if($apartment->facilities->boiler == 1){
                echo '<li class="boiler">'.Yii::t('app', 'Бойлер').'</li>';
            }else {
                echo '<li class="boiler"><s>'.Yii::t('app', 'Бойлер').'</s></li>';
            }
            if($apartment->facilities->door == 1){
                echo '<li class="armored_door">'.Yii::t('app', 'Бронедверь').'</li>';
            }else {
                echo '<li class="armored_door"><s>'.Yii::t('app', 'Бронедверь').'</s></li>';
            }
            if($apartment->facilities->laptop == 1){
                echo '<li class="notebook">'.Yii::t('app', 'Место для работы на ноутбуке').'</li>';
            }else {
                echo '<li class="notebook"><s>'.Yii::t('app', 'Место для работы на ноутбуке').'</s></li>';
            }
            if($apartment->facilities->smoke == 1){
                echo '<li class="smoke">'.Yii::t('app', 'Можно курить').'</li>';
            }else {
                echo '<li class="smoke"><s>'.Yii::t('app', 'Можно курить').'</s></li>';
            }
            if($apartment->facilities->conditioner == 1){
                echo '<li class="air_conditioning">'.Yii::t('app', 'Кондиционер').'</li>';
            }else {
                echo '<li class="air_conditioning"><s>'.Yii::t('app', 'Кондиционер').'</s></li>';
            }
            if($apartment->facilities->drying_machine == 1){
                echo '<li>'.Yii::t('app', 'Сушильная машина').'</li>';
            }else {
                echo '<li><s>'.Yii::t('app', 'Сушильная машина').'</s></li>';
            }
            if($apartment->facilities->jacuzzi == 1){
                echo '<li>'.Yii::t('app', 'Джакузи').'</li>';
            }else {
                echo '<li><s>'.Yii::t('app', 'Джакузи').'</s></li>';
            }
            if($apartment->facilities->separate_entrance == 1){
                echo '<li>'.Yii::t('app', 'Отдельный вход').'</li>';
            }else {
                echo '<li><s>'.Yii::t('app', 'Отдельный вход').'</s></li>';
            }
            if($apartment->facilities->pool == 1){
                echo '<li>'.Yii::t('app', 'Бассейн').'</li>';
            }else {
                echo '<li><s>'.Yii::t('app', 'Бассейн').'</s></li>';
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

        <form class="flat_single_orderform" action="">
            <div class="flattime">
                <p><span><?= Yii::t('app', 'Прибытие') ?></span><input type="text" class="timepicker" value="" id="some_class_1" required /></p>
                <p><span><?= Yii::t('app', 'Выезд') ?></span><input type="text" class="timepicker" value="" id="some_class_2" required /></p>
                <p><span><?= Yii::t('app', 'Гостей') ?></span>
                    <select id="guest_count">
                        <option value="0" selected></option>
                        <option value="1">1 гость</option>
                        <option value="2">2 гостя</option>
                        <option value="3">3 гостя</option>
                        <option value="4">4 гостя</option>
                        <option value="5">5 гостей</option>
                        <option value="6">6 гостей</option>
                        <option value="7">7 гостей</option>
                        <option value="8">8 гостей</option>
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
            <span class="owner_name"><?= $apartment->owner ?></span>
            <span class="owner_phone"><?= $apartment->phone ?></span>
        </div>
        <div class="star_ratingblock">
            <div class="amountrate">
                <div class="flat_stars amount_all" data-score="4.5"></div>
                <span>20 <?= Yii::t('app', 'отзывов') ?></span>
                <ul class="ratelist">
                    <li><p><?= Yii::t('app', 'Цена/качество') ?></p><div class="flat_stars" data-score="4"></div></li>
                    <li><p><?= Yii::t('app', 'Общение') ?></p><div class="flat_stars" data-score="5"></div></li>
                    <li><p><?= Yii::t('app', 'Чистота') ?></p><div class="flat_stars" data-score="5"></div></li>
                    <li><p><?= Yii::t('app', 'Расположение') ?></p><div class="flat_stars" data-score="4"></div></li>
                </ul>
            </div>
        </div>
        <div class="feedback_block">
            <img class="user_feedback_ico" src="/frontend/web/img/round.jpg" alt="">
            <p class="feedback_people_name">
                <span>Yury</span>
                <span>Люксембург, Люксембург</span>
            </p>
            <div class="user_feedback_rating">
                <div class="flat_stars" data-score="5"></div>
                <span>(июнь 2015)</span>
            </div>
            <p class="feedback_text overflow_test">1111111111111111111 111111111111111111111111 111111111111111 11111111111 11 Жил неделю. Из того что понравилось: отличный район (под боком большой базар, магазины, Ашан. Центр - уехать можно куда угодно. Кондиционер не подвел) Интернет 5мбит, для работы вполне. Пытались приходить убираться, что плюс (я отказался). Жил ЖилЖил Жил Жил Жил ЖилЖил Жил ЖилЖилЖил ЖилЖилЖил Жил ЖилЖил Жил Жил Жил Жил Жил</p>
            <a href="#" class="people_readmore_feedback">Читать далее</a>
        </div>
        <div class="feedback_block">
            <img class="user_feedback_ico" src="/frontend/web/img/round.jpg" alt="">
            <p class="feedback_people_name">
                <span>Lidia</span>
                <span>Сиэтл, Вашингтон</span>
            </p>
            <div class="user_feedback_rating">
                <div class="flat_stars" data-score="5"></div>
                <span>(март 2017)</span>
            </div>
            <p class="feedback_text overflow_test">Apartment was in a central location, accessible to public transportation and the main arterial in the city. The owner was quick to response. His property manager was excellent. She checked in and even took care of a request very quickly. The apartment was comfortable. The only negative was the building itself. Older and rundown but not ...</p>
            <a href="#" class="people_readmore_feedback">Читать далее</a>
        </div>
        <div class="feedback_block">
            <img class="user_feedback_ico" src="/frontend/web/img/round.jpg" alt="">
            <p class="feedback_people_name">
                <span>Peter</span>
                <span>Виннипег, Канада</span>
            </p>
            <div class="user_feedback_rating">
                <div class="flat_stars" data-score="5"></div>
                <span>(февраль 2017)</span>
            </div>
            <p class="feedback_text overflow_test">Nice location on a Main Street, busy during the day, quiet at night. Staff and owner easy to work with and friendly.</p>
            <a href="#" class="people_readmore_feedback">Читать далее</a>
        </div>
        <div class="feedback_block">
            <img class="user_feedback_ico" src="/frontend/web/img/round.jpg" alt="">
            <p class="feedback_people_name">
                <span>Test</span>
                <span>Test, Test</span>
            </p>
            <div class="user_feedback_rating">
                <div class="flat_stars" data-score="5"></div>
                <span>(сентябрь 2017)</span>
            </div>
            <p class="feedback_text overflow_test"></p>
            <a href="#" class="people_readmore_feedback">Читать далее</a>
        </div>
        <a href="#" class="feedback_button other_feedback clearfix"><?= Yii::t('app', 'Другие отзывы') ?></a>
        <a href="#openModal" class="feedback_button send_feedback clearfix"><?= Yii::t('app', 'Оставить отзыв') ?></a>
    </div>
</div>

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
    <p class="footer_copyright">© <?= Yii::t('app', 'Аренда квартир') ?> 2017</p>
    <nav class="footer_social">
        <a class="imgoverlay" href="#"><img src="/frontend/web/img/facebook-icon.png" title="facebook"></a>
        <a class="imgoverlay" href="#"><img src="/frontend/web/img/vk-icon.png" title="vk"></a>
        <a class="imgoverlay" href="#"><img src="/frontend/web/img/google--icon.png" title="googleplus"></a>
        <a class="imgoverlay" href="#"><img src="/frontend/web/img/twitter-icon.png" title="twitter"></a>
        <a class="imgoverlay" href="#"><img src="/frontend/web/img/instagram-icon.png" title="instagram"></a>
    </nav>
</footer>

<?php
//    if(isset($comments)){
//        foreach($comments as $comment){
//            echo $comment->apartment->title_ru.'<br/>';
//            echo $comment->user->username.'<br/>';
//            echo $comment->comment.'<br/>';
//        }
//    }
//?>
<!---->
<!--    --><?php //$form = ActiveForm::begin(); ?>
<!---->
<!--    --><?//= $form->field($new_comment, 'apartment_id')->hiddenInput(['value' => $model->id])->label(false) ?>
<!---->
<!--    --><?//= $form->field($new_comment, 'user_id')->hiddenInput(['value' => $user_id])->label(false) ?>
<!---->
<!--    --><?//= $form->field($new_comment, 'comment')->textArea() ?>
<!---->
<!--    --><?php //if(!Yii::$app->user->isGuest) { ?>
<!--        <div class="form-group">-->
<!--            --><?//= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
<!--        </div>-->
<!--    --><?php //} else if(Yii::$app->user->isGuest){ ?>
<!--        <div class="form-group">-->
<!--            <p>Вы не авторизированы, --><?//= Html::a('авторизируйтесь', ['/site/login']) ?><!--, чтобы оставить комментарий.</p>-->
<!--        </div>-->
<!--    --><?php //} ?>
<!---->
<!--    --><?php //ActiveForm::end(); ?>
<!---->
