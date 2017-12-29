<?php
//商品
namespace frontend\models\product;
use Yii;
use common\tool\Curl;
class Product
{
    //===============================
    //获取产品详情
    public static function get_product_deatil($spuId,$token)
    {
        //session
        $session=Yii::$app->session;
        //请求接口
        $api_url=Yii::$app->params['api_url'];
        //接口地址
        $url=Yii::$app->params['post_url']['product_detail'];
        //請求參數
        $query=array('spuId'=>$spuId,'token'=>$token);
        //请求 返回结果
        $response_data=Curl::get($api_url.$url,array(),$query);
        //返回
        return $response_data;
    }
}