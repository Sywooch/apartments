<?php $lang = Yii::$app->language; ?>


<?php if($lang == 'ru'){
    echo $model->title_ru;
} else if($lang == 'ua'){
    echo $model->title_ua;
} else if($lang == 'en'){
    echo $model->title_en;
}?>