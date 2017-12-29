<?php
//微信登录授权
namespace frontend\controllers;
use yii\web\Controller;
use Yii;
use  common\tool\HttpCurl;
class OauthController extends Controller
{
    //==========================
    //微信授權
    public function actionWeiXin()
    {
         $get_res=Yii::$app->request->get();
         $t_url=\yii\helpers\Url::to(['oauth/callback','location'=>$get_res['location']],true);
         $info=Yii::$app->wechat->getOauth2AuthorizeUrl($t_url);
         Header("Location: $info");
         exit;
    }
    //==========================
    //微信授權登錄回调獲取用戶基本信息
    public function actionCallback()
    {
        try
        {
            $get_res=Yii::$app->request->get();
            //code不存在
            if(!isset($get_res['code']))throw new \Exception('code不存在');
            //跳轉地址不存在
            if(!isset($get_res['location']))throw new \Exception('location不存在');
            //通过code获取用户的openid
            $info=Yii::$app->wechat->getOauth2AccessToken($get_res['code']);
            //openid獲取不到
            if(!$info['openid'])throw new \Exception('openid獲取不到');
            //验证access_token是否有效
            if(Yii::$app->wechat->checkOauth2AccessToken($info['access_token'],$info['openid'])!='ok')throw new \Exception('access_token無效');
            //通過openid和access_token获取用户资料
            $user_info=Yii::$app->wechat->getSnsUserInfo($info['openid'],$info['access_token']);
            //用户信息存放session
            $session=Yii::$app->session;
            //获取微信用户的信息
            $session['member']=['access_token'=>$info['access_token'],'openid'=>$info['openid'],'nickname'=>$user_info['nickname'],'headimgurl'=>$user_info['headimgurl']];
            //跳轉
            $t_url=Yii::$app->request->hostInfo.Yii::$app->homeUrl.'?r='.$get_res['location'];
            //授權完成，跳轉登錄
            Header("Location: $t_url");
            exit;
        }
        catch(\Exception $e){echo "<script>alert('".$e->getMessage()."')</script>";exit;}
        
    }
}
