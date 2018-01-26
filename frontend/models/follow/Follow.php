<?php
//商品
namespace frontend\models\follow;
use Yii;
use common\tool\Curl;
class Follow
{
    //===============================
    //获取用户的关注
    public static function get_user_follow($token,$pageSize,$pageNum)
    {
        //session
        $session=Yii::$app->session;
        //请求接口
        $api_url=Yii::$app->params['api_url'];
        //接口地址
        $url=Yii::$app->params['post_url']['get-follow-shops'];
        //請求參數
        $query=array('token'=>$token,'pageSize'=>$pageSize,'pageNum'=>$pageNum);
        //请求 返回结果
        $response_data=Curl::get($api_url.$url,array(),$query);
        //返回
        return $response_data;
    }
}