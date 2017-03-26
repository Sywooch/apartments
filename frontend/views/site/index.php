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
<!--        --><?php
//            if ($lang == 'en'){
//                echo 'en';
//            } else if ($lang == 'ru')
//            {
//                echo 'ru';
//            }
//        ?>
        

            <?php Pjax::begin(['id' => 'new_country']); ?>

            <?php $form = ActiveForm::begin(['method' => 'get','options' => ['data-pjax' => true ]]); ?>

            <?= $form->field($searchModel, 'title_ru') ?>

            <?= $form->field($searchModel, 'area')->dropDownList([
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

            <div class="form-group">
                <?= Html::submitButton('Apply', ['class' => 'btn btn-success']) ?>
            </div>

        <?php ActiveForm::end(); ?>

        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_apartment',
        ]);?>
        <?php Pjax::end(); ?>
    </div>
</div>
