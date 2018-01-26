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
    //===============================
    //获取推薦列表
    public static function get_recommend_product($recommendType,$token)
    {
        //session
        $session=Yii::$app->session;
        //请求接口
        $api_url=Yii::$app->params['api_url'];
        //接口地址
        $url=Yii::$app->params['post_url']['recommend_list'];
        //請求參數
        $query=array('recommendType'=>$recommendType,'token'=>$token);
        //请求 返回结果
        $response_data=Curl::get($api_url.$url,array(),$query);

        //返回
        return $response_data;
    }
     //===============================
    //点赞
    public static function liked_product($markType,$sourceType,$sourceId,$token)
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
    //点赞
    public static function no_liked_product($markId,$token)
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
    //===============================
    //收藏
    public static function recommen_product($markType,$sourceType,$sourceId,$token)
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
    //取消收藏
    public static function no_recommen_product($markId,$token)
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