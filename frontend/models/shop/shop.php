<?php
//商品
namespace frontend\models\shop;
use Yii;
use common\tool\Curl;
class Shop
{
    //===============================
    //關注商家
    public static function fllow_shop($markType,$sourceId,$sourceType,$token)
    {
        //session
        $session=Yii::$app->session;
        //请求接口
        $api_url=Yii::$app->params['api_url'];
        //接口地址
        $url=Yii::$app->params['post_url']['mark'];
        //請求參數
        $query=array('markType'=>$markType,'sourceId'=>$sourceId,'sourceType'=>$sourceType,'token'=>$token);
        //请求 返回结果
        $response_data=Curl::get($api_url.$url,array(),$query);
        //返回
        return $response_data;
    }
    //===============================
    //取消關注商家
    public static function no_fllow_shop($markId,$token)
    {
        //session
        $session=Yii::$app->session;
        //请求接口
        $api_url=Yii::$app->params['api_url'];
        //接口地址
        $url=Yii::$app->params['post_url']['cancle-mark'];
        //請求參數
        $query=array('markId'=>$markId,'token'=>$token);
        //请求 返回结果
        $response_data=Curl::get($api_url.$url,array(),$query);
        //返回
        return $response_data;
    }
}