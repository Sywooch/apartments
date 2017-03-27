<?php
use yii\helpers\Html;
use yii\helpers\Url;

$lang = Yii::$app->language;
?>


<?php if($lang == 'ru'){
    echo Html::a($model->title_ru, Url::to(['site/detail', 'id' => $model->id]));
} else if($lang == 'ua'){
    echo Html::a($model->title_ua, Url::to(['site/detail', 'id' => $model->id]));
} else if($lang == 'en'){
    echo Html::a($model->title_en, Url::to(['site/detail', 'id' => $model->id]));
}?>