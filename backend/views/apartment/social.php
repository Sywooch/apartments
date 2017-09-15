<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Социальные сети';
?>

<br><br>
<?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-5">
            <?= $form->field($model, 'facebook')->textInput() ?>
            <?= $form->field($model, 'vk')->textInput() ?>
            <?= $form->field($model, 'google')->textInput() ?>
            <?= $form->field($model, 'twitter')->textInput() ?>
            <?= $form->field($model, 'instagram')->textInput() ?>
        </div>
        <div class="col-lg-5" style="margin-top: 2%">
            <?= $form->field($model, 'f_status')->checkbox(['label' => 'Отображать Facebook']) ?>
            <?= $form->field($model, 'vk_status')->checkbox(['label' => 'Отображать Vkontakte']) ?>
            <?= $form->field($model, 'g_status')->checkbox(['label' => 'Отображать Google']) ?>
            <?= $form->field($model, 't_status')->checkbox(['label' => 'Отображать Twitter']) ?>
            <?= $form->field($model, 'i_status')->checkbox(['label' => 'Отображать Instagram']) ?>
        </div>
    </div>
<?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>