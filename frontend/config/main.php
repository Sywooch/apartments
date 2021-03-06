<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
//    'language' => 'ru-RU',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            'name' => 'advanced-frontend',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@app/mail',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
//                'username' => 'crm.urich@gmail.com',
//                'password' => '1995202009vasya',
                'username' => 'apartments.zp.local@gmail.com',
                'password' => 'adminapartments',
                'port' => '587',
                'encryption' => 'tls',
            ],
            'useFileTransport' => false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'class' => 'frontend\widgets\MultiLang\components\UrlManager',
            'languages' => ['ru', 'en', 'uk'],
            'enableDefaultLanguageUrlCode' => true,
            'rules' => [
                '' => 'site/index',
                'filters' => 'site/filters',
                'contact' => 'site/contact',
                'about' => 'site/about',
                'detail' => 'site/detail',
                'login' => 'site/login',
                'signup' => 'site/signup',
                'complete-registration' => 'site/complete-registration',
                'create-comment' => 'site/create-comment',
                'profile' => 'profile/profile',
                'change-password' => 'profile/change-password',
                'avatar-upload' => 'profile/avatar-upload',
                'error' => 'site/errors'
//                '<action>'=>'site/<action>',
            ],
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@frontend/messages',
                    'sourceLanguage' => 'ru',
                ],
            ],
        ],
        'assetManager' => [
            'basePath' => '@webroot/assets',
            'baseUrl' => '/frontend/web/assets',
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
                'edgardmessias\assets\nprogress\NProgressAsset' => [
                    'configuration' => [
                        'minimum' => 0.08,
                        'showSpinner' => false,
                    ],
                    'page_loading' => true,
                    'pjax_events' => true,
                    'jquery_ajax_events' => true,
                ],
            ],
        ],
    ],
    'params' => $params,
];


