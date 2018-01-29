<?php
//商品
namespace frontend\models\category;
use Yii;
use common\tool\Curl;
class Category
{
    //===============================
    //获取分类的幻灯
    public static function get_category_banner($siteNo,$token)
    {
        //session
        $session=Yii::$app->session;
        //请求接口
        $api_url=Yii::$app->params['api_url'];
        //接口地址
        $url=Yii::$app->params['post_url']['banner_list'];
        //請求參數
        $query=array('siteNo'=>$siteNo,'token'=>$token);
        //请求 返回结果
        $response_data=Curl::get($api_url.$url,array(),$query);
        //返回
        return $response_data;
    }
    //===============================
    //获取子分类
    public static function get_category_child($categoryId,$token)
    {
        //session
        $session=Yii::$app->session;
        //请求接口
        $api_url=Yii::$app->params['api_url'];
        //接口地址
        $url=Yii::$app->params['post_url']['get-category-childs'];
        //請求參數
        $query=array('categoryId'=>$categoryId,'token'=>$token);
        //请求 返回结果
        $response_data=Curl::get($api_url.$url,array(),$query);
        //返回
        return $response_data;
    }
     //===============================
    //获取子分类下的产品
    public static function get_category_product($categoryId,$pageSize,$pageNum,$token)
    {
        //session
        $session=Yii::$app->session;
        //请求接口
        $api_url=Yii::$app->params['api_url'];
        //接口地址
        $url=Yii::$app->params['post_url']['get-products-by-category'];
        //請求參數
        $query=array('categoryId'=>$categoryId,'pageSize'=>$pageSize,'pageNum'=>$pageNum,'token'=>$token);
        //请求 返回结果
        $response_data=Curl::get($api_url.$url,array(),$query);
        //返回
        return $response_data;
    }
}