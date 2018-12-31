<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'bootstrap' => ['bootstrap'],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'bot' => [
            'class' => \SonkoDmitry\Yii\TelegramBot\Component::class,
            'apiToken' => '777064802:AAF_PDdemtQR5cUPWOT3O4M0L_3GC5g0ZFo',
        ],
        'bootstrap' => [
            'class' => \common\components\Bootstrap::class
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        // 'user' => [
        //     'identityClass' => 'common\models\User',
        //     'enableAutoLogin' => true,
        //     'identityCookie' => ['name' => '_identity-common', 'httpOnly' => true],
        // ],
        // 'session' => [
        //     'name' => 'advanced-common',
        // ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],
];
