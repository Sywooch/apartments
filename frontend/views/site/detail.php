<?php
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Html;

echo $model->title_ru;

$user_id = 1;
if(!Yii::$app->user->isGuest) {
    $user_id = Yii::$app->user->identity->getId();
}
?>

<div class="wrapper">
    <div class="main_col">
        <h2 class="flat_single_header">Квартира Люкс,Центр,Гагарина,Район 5 гор.Больницы</h2>
        <h3 class="flat_single_adr">пр-т Соборный (Ленина), 129</h3>
    </div>
    <div class="right_sidebar">
        <ul class="flat_single">
            <li>
                <img class="xlogo_img" src="img/room_icon.png" alt="">
                <span>2</span>
                комнаты
            </li>
            <li>
                <img class="xlogo_img" src="img/floar_icon.png" alt="">
                <span>2</span>
                этаж
            </li>
            <li>
                <img class="xlogo_img" src="img/sleepplace_icon.png" alt="">
                <span>4</span>
                спальных места
            </li>
            <li>
                <img class="xlogo_img" src="img/guest_icon.png" alt="">
                <span>8</span>
                гостей
            </li>
        </ul>
    </div>
</div>
<div class="slider_cont">
    <div class="flexslider">
        <ul class="slides" id="scrollPanel">
            <li><a href="#" class="fleximg"><img src="img/flat_photo.jpg" alt="" /></a></li>
            <li><a href="#" class="fleximg"><img src="img/1.jpg" alt="" /></a></li>
            <li><a href="#" class="fleximg"><img src="img/2.jpg" alt="" /></a></li>
            <li><a href="#" class="fleximg"><img src="img/3.jpg" alt="" /></a></li>
            <!--<li><a href="#" class="fleximg"><img src="img/4.jpg"  alt="" /></a></li>-->

        </ul>
    </div>
</div>
<div class="wrapper">
    <div class="main_col">
        <p class="flat_single_descr">Предлагаю вашему вниманию совершенно новую квартиру в самом центре города, район Гагарина - 5 городской больницы, BILLA. Ранее в сдаче квартира не была.</p>
        <p class="flat_single_descr">Рядом с моим жильем общественный транспорт, центр города, парки и искусство и культура. Вам понравится, ведь в моем жилье есть уют и расположение.</p>
        <p class="flat_single_descr">Мое жилье подходит для этого: пары, соло-путешественники, деловые путешественники, семьи (с детьми) и большие группы.</p>
        <p class="flat_single_descr">Селю в любое время. Документы при заселении обязательны.</p>


        <ul class="singleflat_paramethers">
            <li><span>Тип жилья:</span><p>квартира</p></li>
            <li><span>Время заезда:</span><p>любое</p></li>
            <li><span>Время выезда:</span><p>любое</p></li>
            <li><span>Ремонт:</span><p>евро</p></li>
            <li><span>Площадь:</span><p>50 м<sup>2</sup></p></li>
            <li><span>Доплата за каждого последующего гостя:</span><p>бесплатно</p></li>
        </ul>

        <ul class="singleflat_comfort_items">
            <li class="tv">Телевизор</li>
            <li class="inet">Интернет</li>
            <li class="iron">Утюг</li>
            <li class="washer">Стиральная машина</li>
            <li class="plasmatv">Плазменный телевизор</li>
            <li class="gas_stove">Газовая плита</li>
            <li class="fridge">Холодильник</li>
            <li class="wifi">WiFi</li>
            <li class="balcony">Балкон</li>
            <li class="boiler">Бойлер</li>
            <li class="armored_door">Бронедверь</li>
            <li class="notebook">Место для работы на ноутбуке</li>
            <li class="smoke">Можно курить</li>
            <li class="air_conditioning">Кондиционер</li>
            <li><s>Сушильная машина</s></li>
            <li><s>Джакузи</s></li>
            <li><s>Отдельный вход</s></li>
            <li><s>Бассейн</s></li>
        </ul>

        <!--<a href="#openModal">Открыть модальное окно</a>-->
        <!--<div id="debugblock"><&#45;&#45;width&ndash;&gt;</div>-->

    </div>
    <div class="right_sidebar">
        <ul class="flat_single_timeorder">
            <li>
                <span>350 ₴</span>
                <p>от 15 суток</p>
            </li>
            <li>
                <span>400 ₴</span>
                <p>от 5 суток</p>
            </li>
            <li>
                <span>450 ₴</span>
                <p>за сутки</p>
            </li>
            <li>
                <span>200 ₴</span>
                <p>за ночь</p>
            </li>
            <li>
                <span>100 ₴</span>
                <p>за 2 часа</p>
            </li>
        </ul>


        <form class="flat_single_orderform" action="">
            <div class="flattime">
                <p><span>Прибытие</span><input type="text" class="timepicker" value="" id="some_class_1"/></p>
                <p><span>Выезд</span><input type="text" class="timepicker" value="" id="some_class_2"/></p>
                <p><span>Гостей</span>
                    <select>
                        <option value="" selected>1 гость</option>
                        <option>2 гостя</option>
                        <option>3 гостя</option>
                        <option>4 гостя</option>
                        <option>5 гостей</option>
                        <option>6 гостей</option>
                        <option>7 гостей</option>
                        <option>8 гостей</option>
                    </select>
                </p>
            </div>
            <ul class="flatprice">
                <li>
                    <span class="flatprice_description">450 ₴ х 3 суток</span>
                    <span class="flatprice_price">1350 ₴</span>
                </li>
                <li>
                    <span class="flatprice_description">Сбор за услуги</span>
                    <span class="flatprice_price">135 ₴</span>
                </li>
                <li>
                    <span class="flatprice_description flatprice_bold">Итого</span>
                    <span class="flatprice_price flatprice_bold">1485 ₴</span>
                </li>
            </ul>
            <input class="flat_single_ordersubmit" type="submit" value="Забронировать сейчас">
        </form>

        <div class="owner_nameblock">
            <span class="owner_name">Александров Иннокентий</span>
            <span class="owner_phone">+ 38 (068) 527-96-01</span>
        </div>
        <div class="star_ratingblock">
            <div class="amountrate">
                <div class="flat_stars amount_all" data-score="4.5"></div>
                <span>20 отзывов</span>
                <ul class="ratelist">
                    <li><p>Цена/качество</p><div class="flat_stars" data-score="4"></div></li>
                    <li><p>Общение</p><div class="flat_stars" data-score="5"></div></li>
                    <li><p>Чистота</p><div class="flat_stars" data-score="5"></div></li>
                    <li><p>Расположение</p><div class="flat_stars" data-score="4"></div></li>
                </ul>
            </div>
        </div>
        <div class="feedback_block">
            <img class="user_feedback_ico" src="img/round.jpg" alt="">
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
            <img class="user_feedback_ico" src="img/round.jpg" alt="">
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
            <img class="user_feedback_ico" src="img/round.jpg" alt="">
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
            <img class="user_feedback_ico" src="img/round.jpg" alt="">
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
        <a href="#" class="feedback_button other_feedback clearfix">Другие отзывы</a>
        <a href="#openModal" class="feedback_button send_feedback clearfix">Оставить отзыв</a>
    </div>






    <!--<div class="test" data-score="1"></div>-->

    <!--<div class="test" data-score="5"></div>-->




</div>

<!--MODAL-->

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

<!--<h3>Комментарии</h3>-->
<!---->
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
