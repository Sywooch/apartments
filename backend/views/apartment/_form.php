<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<style>
    div.required label:after {
        content: " *";
        color: red;
    }
</style>
<div class="apartment-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'title_ua')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description_ru')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'description_ua')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'description_en')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'coordinates')->widget(\kalyabin\maplocation\SelectMapLocationWidget::className(), [
                'attributeLatitude' => 'latitude',
                'attributeLongitude' => 'longitude',
                'googleMapApiKey' => 'AIzaSyDvdY_YjgJ2FCdyfMZ89DGodrrtOXpvETA',
            ]); ?>
        </div>

        <div class="col-md-6">

            <?= $form->field($model, 'price_2')->textInput() ?>

            <?= $form->field($model, 'price_night')->textInput() ?>

            <?= $form->field($model, 'price_day')->textInput() ?>

            <?= $form->field($model, 'price_5')->textInput() ?>

            <?= $form->field($model, 'price_10')->textInput() ?>

            <?= $form->field($model, 'room_count')->dropDownList([
                'prompt'=>'Выберите количество комнат...',
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
            ]);
            ?>

            <?= $form->field($model, 'bed_count')->dropDownList([
                'prompt'=>'Выберите количество спальных мест...',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
                '7' => '7',
                '8' => '8',
                '9' => '9',
                '10' => '10',
            ]);
            ?>

            <?= $form->field($model, 'type')->dropDownList([
                'prompt'=>'Выберите тип жилья...',
                'Дом' => 'Дом',
                'Квартира' => 'Квартира',
                'Комната' => 'Комната',
            ]);
            ?>

            <?= $form->field($model, 'area')->dropDownList([
                'prompt'=>'Выберите район...',
                'Александровский' => 'Александровский',
                'Заводской' => 'Заводской',
                'Коммунарский' => 'Коммунарский',
                'Днепровский' => 'Днепровский',
                'Вознесеновский' => 'Вознесеновский',
                'Хортицкий' => 'Хортицкий',
                'Шевченковский' => 'Шевченковский',
            ]);
            ?>

            <?= $form->field($model, 'floor')->dropDownList([
                'prompt'=>'Выберите этаж...',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
                '7' => '7',
                '8' => '8',
                '9' => '9',
                '10' => '10',
                '11' => '11',
                '12' => '12',
                '13' => '13',
                '14' => '14',
                '15' => '15',
                '16' => '16',
                '17' => '17',
                '18' => '18',
                '19' => '19',
                '20' => '20',
            ]);
            ?>

            <?= $form->field($model, 'apartment_area')->textInput() ?>

            <?= $form->field($model, 'stock')->checkbox() ?>

            <h1 style="text-align: center">Удобства</h1><br><br>
            <div class="row">
                <div class="col-md-3">
                    <!--            --><?//= $form->field($facilities, 'apartment_id')->hiddenInput(['value' => $model->id])->label(false) ?>

                    <?= $form->field($facilities, 'tv')->checkbox() ?>

                    <?= $form->field($facilities, 'iron')->checkbox() ?>

                    <?= $form->field($facilities, 'plazm_tv')->checkbox() ?>

                    <?= $form->field($facilities, 'fridge')->checkbox() ?>

                    <?= $form->field($facilities, 'balcony')->checkbox() ?>

                    <?= $form->field($facilities, 'door')->checkbox() ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($facilities, 'smoke')->checkbox() ?>

                    <?= $form->field($facilities, 'drying_machine')->checkbox() ?>

                    <?= $form->field($facilities, 'separate_entrance')->checkbox() ?>

                    <?= $form->field($facilities, 'internet')->checkbox() ?>

                    <?= $form->field($facilities, 'washer_machine')->checkbox() ?>

                    <?= $form->field($facilities, 'gas')->checkbox() ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($facilities, 'wifi')->checkbox() ?>

                    <?= $form->field($facilities, 'boiler')->checkbox() ?>

                    <?= $form->field($facilities, 'laptop')->checkbox() ?>

                    <?= $form->field($facilities, 'conditioner')->checkbox() ?>

                    <?= $form->field($facilities, 'jacuzzi')->checkbox() ?>

                    <?= $form->field($facilities, 'pool')->checkbox() ?>
                </div>
            </div>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
