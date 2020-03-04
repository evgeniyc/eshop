<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
	'name' => 'Магазин строительства и электроники',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
	'language' => 'ru-RU',
	'defaultRoute' => 'catalog',
	'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
			'layout' => 'main'
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '3etom5PDRr4l6yQUlBfpjdTCWs1yqXY8',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'app/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
			'htmlLayout' => 'layouts/html',
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
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,/*
            'rules' => [ 
                'catalog/category/<id:\d+>/page/<page:\d+>' => 'catalog/category',
                'catalog/category/<id:\d+>' => 'catalog/category',
                'catalog/brand/<id:\d+>/page/<page:\d+>' => 'catalog/brand',
                'catalog/brand/<id:\d+>' => 'catalog/brand',
                'catalog/product/<id:\d+>' => 'catalog/product',
                // правило для 2, 3, 4 страницы результатов поиска
                'catalog/search/query/<query:.*?>/page/<page:\d+>' => 'catalog/search',
                // правило для первой страницы результатов поиска
                'catalog/search/query/<query:.*?>' => 'catalog/search',
                // правило для первой страницы с пустым запросом
                'catalog/search' => 'catalog/search',

            ],*/
        ],
    ],
	'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\PathController',
            'access' => ['?'], // доступ для всех
            'root' => [
                'path' => 'images/pages', // директория внутри web
                'name' => 'Изображения'
            ],
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
