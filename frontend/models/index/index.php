<?php
//商品
namespace frontend\models\index;
use Yii;
use common\tool\Curl;
class Index
{
    //===============================
    //获取首页幻灯
    public static function get_index_banner($token)
    {
        //session
        $session=Yii::$app->session;
        //请求接口
        $api_url=Yii::$app->params['api_url'];
        //接口地址
        $url=Yii::$app->params['post_url']['banner_list'];
        //請求參數
        $query=array('token'=>$token);
        //请求 返回结果
        $response_data=Curl::get($api_url.$url,array(),$query);
        //返回
        return $response_data;
    }
    //===============================
    //获取分类
    public static function get_index_cate($token)
    {
        //session
        $session=Yii::$app->session;
        //请求接口
        $api_url=Yii::$app->params['api_url'];
        //接口地址
        $url=Yii::$app->params['post_url']['category_list'];
        //請求參數
        $query=array('token'=>$token);
        //请求 返回结果
        $response_data=Curl::get($api_url.$url,array(),$query);
        //返回
        return $response_data;
    }
}