<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

$this->title = Yii::t('app', 'Контакты');
?>

<aside class="sidebar sidebar_single">
    <?= $this->render('/layouts/main-responsive') ?>
</aside>

<div class="singlepage_wrapper">
    <div class="half_col">
        <h2 class="contacts_header"><?= Yii::t('app', 'Контакты') ?></h2>
        <p><?= Yii::t('app', 'По вопросам аренды обращайтесь напрямую к владельцам. Их контакты указаны в объявлении.') ?></p>
        <p><?= Yii::t('app', 'Информацию о размещении платной рекламы вы можете узнать, позвонив по телефонам, указанным ниже.') ?></p>

        <ul class="contact_phones_info">
            <li class="sity_phone">+380 (44) 337 45 28 </li>
            <li class="vodafone">+380 (95) 673 95 95 </li>
            <li class="kyivstar">+380 (67) 343 66 10 </li>
            <li class="lifecell">+380 (93) 535 58 95 </li>
        </ul>
        <p><?= Yii::t('app', 'Также связаться с нами можно, написав на почту:') ?> <a href="mailto:arendazp@azp.ua">arendazp@azp.ua</a></p>
    </div>
    <div class="half_col">
        <h2 class="contacts_header"><?= Yii::t('app', 'Обратная связь') ?></h2>
        <?php $form = ActiveForm::begin([
            'id' => 'contact-form',
            'errorCssClass' => 'valid_err',
            'options'=> [
                'class' => 'contactform'
            ]
        ]); ?>
            <label for="name" class="name_label"><?= Yii::t('app', 'Имя') ?><br>
                <?= $form->field($model, 'name')->textInput(['id'=>'name'])->label(false) ?>
            </label>

            <label for="email" class="email_label"><?= Yii::t('app', 'E-mail') ?><br>
                <?= $form->field($model, 'email')->textInput(['id'=>'email'])->label(false) ?>
            </label>

            <label for="message" class="textarea_label"><?= Yii::t('app', 'Сообщение') ?><br>
                <?= $form->field($model, 'body')->textarea(['id'=>'message'])->label(false) ?>
            </label>

            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                'template' => '{image}{input}',
            ])->label(false) ?>

            <?= Html::submitButton(Yii::t('app', 'Отправить'), ['id' => 'contact_submitbutton', 'name' => 'contact-button']) ?>
        
        <?php ActiveForm::end(); ?>
    </div>
</div>

<a href="#openModal" id="success" class="sidebar_btn sidebar_bonus hidden"><?= Yii::t('app', 'Бонусная программа') ?></a>
<div id="openModal" class="modalDialog">
    <div>
        <a href="#close" title="Закрыть" class="close"></a>
        <h2 class="modal_header"><?= Yii::t('app', 'Ваше письмо отправлено!') ?></h2>
        <p><?= Yii::t('app', 'Мы свяжемся с вами в кратчайшие сроки.') ?></p>
    </div>
</div>