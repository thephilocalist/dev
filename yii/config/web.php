<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'dy1uBb_6AFUfrz0QAIyhfs4YM_bwt0Vm',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\db\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
            'showScriptName' => false,
            'rules' => [
                /*
                |--------------------------------------------------------------------------
                | SITE
                |--------------------------------------------------------------------------
                */
                ['pattern' => 'category/<slug:[A-Za-z0-9_-]+>', 'route' => 'site/category', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'article/<slug:[A-Za-z0-9_-]+>', 'route' => 'site/article', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'author/<slug:[A-Za-z0-9_-]+>', 'route' => 'site/author', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'search/<slug:[A-Za-z0-9_-]+>', 'route' => 'site/search', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'about-us', 'route' => 'site/about-us', 'normalizer' => ['collapseSlashes' => false]],



                /*
                |--------------------------------------------------------------------------
                | ADMIN
                |--------------------------------------------------------------------------
                */

                ['pattern' => 'Xthehiddenphiloclstadminurlx/login', 'route' => '/xthehiddenphiloclstadminurlx/admin/login', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/logout', 'route' => '/xthehiddenphiloclstadminurlx/admin/logout', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'upload/redactor-photo', 'route' => '/xthehiddenphiloclstadminurlx/upload/redactor', 'normalizer' => ['collapseSlashes' => false]],
                
                /* ADMIN USERS */
                ['pattern' => 'Xthehiddenphiloclstadminurlx/adminusers/index', 'route' => '/xthehiddenphiloclstadminurlx/adminusers/index', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/adminusers/create', 'route' => '/xthehiddenphiloclstadminurlx/adminusers/create', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/adminusers/rest-sort', 'route' => '/xthehiddenphiloclstadminurlx/adminusers/rest-sort', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/adminusers/delete', 'route' => '/xthehiddenphiloclstadminurlx/adminusers/delete', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/adminusers/update', 'route' => '/xthehiddenphiloclstadminurlx/adminusers/update', 'normalizer' => ['collapseSlashes' => false]],

                /* SOCIALS */
                ['pattern' => 'Xthehiddenphiloclstadminurlx/socials/index', 'route' => '/xthehiddenphiloclstadminurlx/socials/index', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/socials/create', 'route' => '/xthehiddenphiloclstadminurlx/socials/create', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/socials/update', 'route' => '/xthehiddenphiloclstadminurlx/socials/update', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/socials/delete', 'route' => '/xthehiddenphiloclstadminurlx/socials/delete', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/socials/rest-sort', 'route' => '/xthehiddenphiloclstadminurlx/socials/rest-sort', 'normalizer' => ['collapseSlashes' => false]],

                /* ABOUT US */
                ['pattern' => 'Xthehiddenphiloclstadminurlx/about/index', 'route' => '/xthehiddenphiloclstadminurlx/about/index', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/about/update', 'route' => '/xthehiddenphiloclstadminurlx/about/update', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/about/photo', 'route' => '/xthehiddenphiloclstadminurlx/about/photo', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/about/upload-photo', 'route' => '/xthehiddenphiloclstadminurlx/about/upload-photo', 'normalizer' => ['collapseSlashes' => false]],

                /* WELCOME */
                ['pattern' => 'Xthehiddenphiloclstadminurlx/welcome/update', 'route' => '/xthehiddenphiloclstadminurlx/welcome/update', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/welcome/update', 'route' => '/xthehiddenphiloclstadminurlx/welcome/update', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/welcome/photo', 'route' => '/xthehiddenphiloclstadminurlx/welcome/photo', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/welcome/upload-photo', 'route' => '/xthehiddenphiloclstadminurlx/welcome/upload-photo', 'normalizer' => ['collapseSlashes' => false]],

                /* ARTICLES */
                ['pattern' => 'Xthehiddenphiloclstadminurlx/articles/index', 'route' => '/xthehiddenphiloclstadminurlx/articles/index', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/articles/rest', 'route' => '/xthehiddenphiloclstadminurlx/articles/rest', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/articles/update', 'route' => '/xthehiddenphiloclstadminurlx/articles/update', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/articles/text', 'route' => '/xthehiddenphiloclstadminurlx/articles/text', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/articles/photo', 'route' => '/xthehiddenphiloclstadminurlx/articles/photo', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/articles/delete', 'route' => '/xthehiddenphiloclstadminurlx/articles/delete', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/articles/upload-photo', 'route' => '/xthehiddenphiloclstadminurlx/articles/upload-photo', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/articles/enable', 'route' => '/xthehiddenphiloclstadminurlx/articles/enable', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/articles/disable', 'route' => '/xthehiddenphiloclstadminurlx/articles/disable', 'normalizer' => ['collapseSlashes' => false]],

                /* CATEGORIES */
                ['pattern' => 'Xthehiddenphiloclstadminurlx/categories/index', 'route' => '/xthehiddenphiloclstadminurlx/categories/index', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/categories/update', 'route' => '/xthehiddenphiloclstadminurlx/categories/update', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/categories/delete', 'route' => '/xthehiddenphiloclstadminurlx/categories/delete', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/categories/photo', 'route' => '/xthehiddenphiloclstadminurlx/categories/photo', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/categories/upload-photo', 'route' => '/xthehiddenphiloclstadminurlx/categories/upload-photo', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/categories/rest-sort', 'route' => '/xthehiddenphiloclstadminurlx/categories/rest-sort', 'normalizer' => ['collapseSlashes' => false]],

                /* AUTHORS */
                ['pattern' => 'Xthehiddenphiloclstadminurlx/authors/index', 'route' => '/xthehiddenphiloclstadminurlx/authors/index', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/authors/create', 'route' => '/xthehiddenphiloclstadminurlx/authors/create', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/authors/update', 'route' => '/xthehiddenphiloclstadminurlx/authors/update', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/authors/photo', 'route' => '/xthehiddenphiloclstadminurlx/authors/photo', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/authors/delete', 'route' => '/xthehiddenphiloclstadminurlx/authors/delete', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/authors/rest-sort', 'route' => '/xthehiddenphiloclstadminurlx/authors/rest-sort', 'normalizer' => ['collapseSlashes' => false]],
                ['pattern' => 'Xthehiddenphiloclstadminurlx/authors/upload-photo', 'route' => '/xthehiddenphiloclstadminurlx/authors/upload-photo', 'normalizer' => ['collapseSlashes' => false]],

            ],
        ],
       
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
