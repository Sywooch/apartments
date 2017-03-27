<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use voime\GoogleMaps\Map;
use frontend\widgets\MultiLang\MultiLang;

$this->title = 'Главная';
$lang = Yii::$app->language;
?>

<?= MultiLang::widget(['cssClass'=>'pull-right language']); ?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?= Yii::t('app', 'Мультиязычность') ?></h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">
        <h2>Карта</h2>
        <?=
         Map::widget([
            'apiKey'=> 'AIzaSyDvdY_YjgJ2FCdyfMZ89DGodrrtOXpvETA',
            'zoom' => 15,
            'center'=>'Zaporozhye, UA',
            'width' => '700px',
            'height' => '700px',
            'markers' => $map_items,
            'markerFitBounds'=>true
        ]);
        ?>

        <?php Pjax::begin(['id' => 'new_country']); ?>

        <?php $form = ActiveForm::begin([ 'id' => 'test','method' => 'get','options' => ['data-pjax' => true ]]); ?>

            <?= $form->field($searchModel, 'room_count')->dropDownList([
                'prompt'=>'Выберите количество комнат...',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
            ]);
            ?>

            <?= $form->field($searchModel, 'bed_count')->dropDownList([
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

            <?= $form->field($searchModel, 'area')->dropDownList([
                'prompt'=>'',
                'Александровский' => 'Александровский',
                'Заводской' => 'Заводской',
                'Коммунарский' => 'Коммунарский',
                'Днепровский' => 'Днепровский',
                'Вознесеновский' => 'Вознесеновский',
                'Хортицкий' => 'Хортицкий',
                'Шевченковский' => 'Шевченковский',
            ]);
            ?>
        
            <?= $form->field($searchModel, 'type')->checkboxList(['Дом'=>'Дом', 'Квартира'=>'Квартира', 'Комната'=>'Комната']) ?>

            <?= $form->field($searchModel, 'stock')->checkbox(['uncheckValue'=>NULL]) ?>
            <div class="form-group">
                <div class="col-lg-6">
                    <?= $form->field($searchModel, 'min_price')->textInput()->label('От') ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($searchModel, 'max_price')->textInput()->label('До') ?>
                </div>
            </div>

            <h1 style="text-align: center">Удобства</h1><br><br>
            <div class="row">
                <div class="col-md-3">
                    <?= $form->field($searchModel, 'elevator')->checkbox() ?>

                    <?= $form->field($searchModel, 'internet')->checkbox() ?>

                    <?= $form->field($searchModel, 'animals')->checkbox() ?>

                    <?= $form->field($searchModel, 'kitchen')->checkbox() ?>

                    <?= $form->field($searchModel, 'gym')->checkbox() ?>

                    <?= $form->field($searchModel, 'intercom')->checkbox() ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($searchModel, 'fireplace')->checkbox() ?>

                    <?= $form->field($searchModel, 'waggon')->checkbox() ?>

                    <?= $form->field($searchModel, 'heating')->checkbox() ?>

                    <?= $form->field($searchModel, 'wifi')->checkbox() ?>

                    <?= $form->field($searchModel, 'disabled')->checkbox() ?>

                    <?= $form->field($searchModel, 'iron')->checkbox() ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($searchModel, 'drying_machine')->checkbox() ?>

                    <?= $form->field($searchModel, 'family')->checkbox() ?>

                    <?= $form->field($searchModel, 'parking')->checkbox() ?>

                    <?= $form->field($searchModel, 'washer_machine')->checkbox() ?>

                    <?= $form->field($searchModel, 'hair_dryer')->checkbox() ?>

                    <?= $form->field($searchModel, 'tv')->checkbox() ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($searchModel, 'conditioner')->checkbox() ?>

                    <?= $form->field($searchModel, 'cable_tv')->checkbox() ?>

                    <?= $form->field($searchModel, 'smoke')->checkbox() ?>

                    <?= $form->field($searchModel, 'separate_entrance')->checkbox() ?>
                </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Поиск', ['class' => 'btn btn-success']) ?>
                <?= Html::a('Сброс фильтров', ['index'], ['class' => 'btn btn-danger']) ?>
            </div>

        <?php ActiveForm::end(); ?>

        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_apartment',
        ]);?>

        <?php
        $this->registerJs(
            '$("#test").submit(function(e){
                $("#test").find("select").each(function() {
                    var select = $(this);
                    if (!select.val() || select.val() == "prompt") {
                        select.remove(); // or input.prop("disabled", true);
                    }
                });
                $("#test").find("input[type=\'checkbox\']").each(function() {
                $(\'input[type="hidden"]\').remove();
                    var input = $(this);
                    if (input.val() == 0) {
                        input.remove(); // or input.prop("disabled", true);
                    }
                });
            });'
        );
        ?>
        <?php Pjax::end(); ?>
    </div>
</div>
