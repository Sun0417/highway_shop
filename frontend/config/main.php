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
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
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
         //这个是支付的
         'payment' => [
            'class'=>'common\widgets\payment\Instance',
                'weixinjspi_config' => [
						'appid'     => 'wxe96c36ae44491a19',//微信的appid
						'secret'    => '84466f984f93188811bcd4f0d2ed63c2',//appsecret，在申请完公众号以后可以看到
						'mch_id'    => '1497751852',//商户号
						'key'       => 'B8pS2LvCmtv0BFGb9jnNK5YPcU2uoBvt',//key需要设置
						'cert_path' => '',//可以不用填写
						'key_path'  => '',//可以不用填写
                ],
               
        ],
        'wechat' => [
            'class'=>'callmez\wechat\sdk\MpWechat',
            'appId'=>'wxe96c36ae44491a19',
            'appSecret'=>'84466f984f93188811bcd4f0d2ed63c2',
            'token'=>'zXQlLqUzJ06GAVkx',
            //'encodingAesKey'=>'IvZZhBx2nGbAyGykgxKXWHZAKzjH8DvzyMiR4RShAyq'
            // 'userOptions' => []  # user identity class params
            // 'sessionParam' => '' # wechat user info will be stored in session under this key
            // 'returnUrlParam' => '' # returnUrl param stored in session
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
