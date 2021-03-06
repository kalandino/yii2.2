<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'v1' => [
            'class' => 'frontend\modules\v1\Module',
        ],
        'task_v1' => [
            'class' => 'frontend\modules\task_v1\Module',
        ],
    ],
    'components' => [
        // 'bot' => [
        //     'class' => \SonkoDmitry\Yii\TelegramBot\Component::class,
        //     'apiToken' => '777064802:AAF_PDdemtQR5cUPWOT3O4M0L_3GC5g0ZFo',
        // ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'parsers' => [
                'application/json' => \yii\web\JsonParser::class,
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
            'rules' => [
                ['class' => \yii\rest\UrlRule::class, 'controller' => ['message']],
                ['class' => \yii\rest\UrlRule::class, 'controller' => ['v1/apitask']],
                ['class' => \yii\rest\UrlRule::class, 'controller' => ['task_v1/task']],
                'tasks' => 'task_v1/task',
                'about' => 'site/about',
                'contact' => 'site/contact',
                'login' => 'site/login',
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],
    'params' => $params,
];
