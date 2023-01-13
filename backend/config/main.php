<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'name' => "Stuff n' Go",
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'api' => [
            'class' => 'backend\modules\api\ModuleAPI',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/index',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/produto',
                    'extraPatterns' => [
                        'GET produtos/{id}' => 'view',
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/promocao',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET' => 'index',
                        'GET {id}' => 'validate',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/login'
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/user',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET' => 'dados',
                        ]
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/seccao',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET {id}' => 'index',
                        'GET senha/{id}' => 'senha',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'api/carrinho',
                    'pluralize' => false,
                    'extraPatterns' => [
                        'GET {id}' => 'index',
                        'POST' => 'carrinho',
                        'POST checkout' => 'checkout',
                        'PUT produto' => 'produto_add',
                        'PATCH produto/{id}' => 'produto_remove',
                        'DELETE {id}' => 'delete',
                    ],
                ]
                ['class' => 'yii\rest\UrlRule', 'controller' => 'api/fatura'],
            ],
        ],
    ],
    'params' => $params,
];
