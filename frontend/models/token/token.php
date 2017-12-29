<?php
//Token相應操作
namespace frontend\models\token;
use Yii;
use common\tool\Curl;
class Token
{
    //================================
    //獲取用戶的token
    public static function get_token()
    {
       
        $session=Yii::$app->session;
        //请求接口 登录接口
        $api_url=Yii::$app->params['api_url'];
        $url=Yii::$app->params['post_url']['member_sign_wechat'];
        $query=array('openId'=>$session['member']['openid']);
        //请求 返回结果
        $response_data=Curl::get($api_url.$url,array(),$query);
        //token不存在
        if(is_null($response_data['token']))return false;
        //緩存token
        $_SESSION['member']['token']=$response_data['token'];
        $_SESSION['member']['timeOut']=$response_data['timeOut'];
        return true;
    }
    //===============================
    //驗證token
    public static function check_token()
    {
        $session=Yii::$app->session;
        //驗證session中token是否存在 不存在說明沒有註冊過獲取session已經過期
        if(!isset($session['member']['token']))return false;
        //驗證token是否過期
        $timeOut=$session['member']['timeOut'];
        //過期
        if(time()>$timeOut)return false;
        return true;
    }
}