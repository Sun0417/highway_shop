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
      //    //这个是支付的
      //    'payment' => [
      //       'class'=>'common\widgets\payment\Instance',
      //           'weixinjspi_config' => [
						// 'appid'     => 'wxc46fa7c051653a82',//微信的appid
						// 'secret'    => '80e6cc8eb5765df9d4e5fc5a9814f4a3',//appsecret，在申请完公众号以后可以看到
						// 'mch_id'    => '',//商户号
						// 'key'       => '',//key需要设置
						// 'cert_path' => '',//可以不用填写
						// 'key_path'  => '',//可以不用填写
      //           ],
               
      //   ],
        'wechat' => [
            'class'=>'callmez\wechat\sdk\MpWechat',
            'appId'=>'wxc46fa7c051653a82',
            'appSecret'=>'80e6cc8eb5765df9d4e5fc5a9814f4a3 ',
            'token'=>'KXR1ZyrpqIC71p8q',
            //'encodingAesKey'=>'IJWVASpMlTvIR6NP4s0HlGGkFULWr9zXqs0OKGAlg4y'
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
