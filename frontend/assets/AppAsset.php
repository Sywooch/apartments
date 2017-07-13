<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '/frontend/web';
    public $css = [
//        'css/site.css',
        'css/main.css',
        'css/jquery.datetimepicker.css',
        'css/flexslider.css',
        'css/normalize.min.css',
        'css/raty.css',
    ];
    public $js = [
        'js/menu.js',
        'js/jquery.raty.js',
        'js/main.js',
        'js/jquery.datetimepicker.full.min.js',
        'js/flatsingle.js',
        'js/jquery.flexslider.js',
        'js/request.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
