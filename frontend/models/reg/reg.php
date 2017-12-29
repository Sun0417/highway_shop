<?php
//用戶註冊相應操作
namespace frontend\models\reg;
use Yii;
use common\tool\Curl;
class Reg
{
    //===============================
    //驗證token 提交註冊
    public static function check_verification_code($orderId,$identifyingCode)
    {
        //session
        $session=Yii::$app->session;
        //请求接口
        $api_url=Yii::$app->params['api_url'];
        $url=Yii::$app->params['post_url']['member_sign'];
        //請求參數
        $query=array('orderId'=>$orderId,'identifyingCode'=>$identifyingCode);
        //请求 返回结果
        $response_data=Curl::get($api_url.$url,array(),$query);
         //token的key不存在
        if(!isset($response_data['token'])||!$response_data['token'])throw new \Exception('miss token',-1);
            //过期时间
        if(!isset($response_data['timeOut'])||!$response_data['timeOut'])throw new \Exception('miss timeOut',-1);
        //清空cookie
        setcookie('orderId','');
         //接口结果 token放入session
        $_SESSION['member']['token']=$response_data['data']['token'];
        $_SESSION['member']['timeOut']=$response_data['data']['timeOut'];
    }
    //================================
    //獲取用戶的token
    public static function send_verification_code($openid,$phone)
    {
         //Curl请求接口
        $api_url=Yii::$app->params['api_url'];
        $url=Yii::$app->params['post_url']['member_apply'];
        $query=array('openId'=>$openid,'phone'=>$phone);
         //请求 返回结果
        $response_data=Curl::get($api_url.$url,array(),$query);
        if(!$response_data['orderId']||!isset($response_data['orderId']))throw new \Exception('miss orderId',-1);
        //返回
        if(isset($_COOKIE['orderId']))
        {
            setcookie('orderId','');
            setcookie('orderId',$response_data['data']['orderId'],time()+300);
        }
        else{setcookie('orderId',$response_data['data']['orderId'],time()+300);}
    }

}