<?php
namespace frontend\widgets\MultiLang;

use Yii;
use yii\helpers\Html;

$lang = Yii::$app->language;
$class_en = 'lang';
$class_ru = 'lang';
$class_ua = 'lang';
?>
    
<?php
    if($lang == 'en'){
        $class_en = 'lang lang_active';
    } elseif($lang == 'ru') {
        $class_ru = 'lang lang_active';
    } elseif($lang == 'uk') {
        $class_ua = 'lang lang_active';
    }
?>    
<?= Html::a('ENG', array_merge(
    \Yii::$app->request->get(),
    [\Yii::$app->controller->route, 'language' => 'en']
), ['class' => $class_en]); ?>

<?= Html::a('РУС', array_merge(
    \Yii::$app->request->get(),
    [\Yii::$app->controller->route, 'language' => 'ru']
), ['class' => $class_ru]); ?>

<?= Html::a('УКР', array_merge(
    \Yii::$app->request->get(),
    [\Yii::$app->controller->route, 'language' => 'uk']
), ['class' => $class_ua]); ?>