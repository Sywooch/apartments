<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;

$this->title = Yii::t('app', 'Профиль');
?>

<div class="personal_cab_sideb">
    <?php $form = ActiveForm::begin([
        'id' => 'userprofile_passreset',
        'action' => 'change-password',
        'enableAjaxValidation' => true,
        'errorCssClass' => 'valid_err'
    ]); ?>
        <h2><?= Yii::t('app', 'Смена пароля') ?></h2>
        <fieldset>
            <p><?= Yii::t('app', 'Текущий пароль') ?></p>
            <?= $form->field($user, 'currentPassword')->passwordInput(['title' => Yii::t('app', 'Текущий пароль')])->label(false) ?>
        </fieldset>
        <fieldset>
            <p><?= Yii::t('app', 'Новый пароль') ?></p>
            <?= $form->field($user, 'newPassword')->passwordInput(['title' => Yii::t('app', 'Новый пароль')])->label(false) ?>
        </fieldset>
        <fieldset>
            <p><?= Yii::t('app', 'Повторите новый пароль') ?></p>
            <?= $form->field($user, 'newPasswordConfirm')->passwordInput(['title' => Yii::t('app', 'Повторите новый пароль')])->label(false) ?>
        </fieldset>
        <?= Html::submitButton(Yii::t('app', 'Подтвердить'), ['id' => 'userprofile_passreset_submit']) ?>
    <?php ActiveForm::end(); ?>

    <?php $form = ActiveForm::begin([
        'id' => 'change_avatar',
        'action' => 'avatar-upload'
    ])?>
        <h2><?= Yii::t('app', 'Изменить аватар') ?></h2>
        <?= $form->field($user, 'photo')->fileInput()->label(false) ?>
        <input type="submit" value="<?= Yii::t('app', 'Отправить') ?>">
    <?php ActiveForm::end() ?>
</div>
<div class="personal_cab_stat">
    <h2 class="personal_cab_statheader"><?= Yii::t('app', 'Архив заказов') ?></h2>
    <?php Pjax::begin(['id' => 'grid']); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary'=>"",
        'tableOptions' => [
            'class' => 'stat_usertable',
            'width' => '100%',
        ],
        'columns' => [
            [
                'contentOptions' => ['data-label' => Yii::t('app', 'Информация о квартире')],
                'header' => Yii::t('app', 'Информация о квартире'),
                'value' => 'apartment.title_ru'
            ],
            [
                'contentOptions' => ['data-label' => 'Дата заказа'],
                'header' => Yii::t('app', 'Дата заказа'),
                'value' => function($model){
                    if(Yii::$app->language == 'en'):
                        return date('d F Y' , strtotime($model->date));
                    else:
                        return $model->DateFormat($model->date);
                    endif;
                }
            ],
            [
                'contentOptions' => ['data-label' => Yii::t('app', 'Дата заезда')],
                'header' => Yii::t('app', 'Дата заезда'),
                'value' => function($model){
                    if(Yii::$app->language == 'en'):
                        return date('d F Y' , strtotime($model->date_start));
                    else:
                        return $model->DateFormat($model->date_start);
                    endif;
                }
            ],
            [
                'contentOptions' => ['data-label' => Yii::t('app', 'Дата выезда')],
                'header' => Yii::t('app', 'Дата выезда'),
                'value' => function($model){
                    if(Yii::$app->language == 'en'):
                        return date('d F Y' , strtotime($model->date_end));
                    else:
                        return $model->DateFormat($model->date_end);
                    endif;
                }
            ],
            [
                'contentOptions' => ['data-label' => Yii::t('app', 'Сумма')],
                'header' => Yii::t('app', 'Сумма'),
                'value' => function($model){
                    return $model->total_price.' грн';
                }
            ]
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
