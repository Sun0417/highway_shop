<?php
//购物车
namespace frontend\models\cart;
use Yii;    
use common\tool\Curl;
class Cart 
{
    //查詢收貨地址
    public static function get_cart_list()
    {
        $session=Yii::$app->session;
        $cart_list=[];
        //请求接口
        $api_url=Yii::$app->params['api_url'];
        $url=Yii::$app->params['post_url']['cart_list'];
        //get請求參數
        $query=array('token'=>$session['member']['token']);
        //$query=array('token'=>'5a44530f62018269341');
         //请求 返回结果
        $response_data=Curl::get($api_url.$url,array(),$query);
        return $response_data;
    }
    //======================
    //添加商品到購物車
    public static function Add($salesUnitId,$salesUnitType,$count,$token)
    {
        //请求接口
        $api_url=Yii::$app->params['api_url'];
        $url=Yii::$app->params['post_url']['add_cart'];
        $query=array('salesUnitId'=>$salesUnitId,'salesUnitType'=>$salesUnitType,'count'=>$count,'token'=>$token);
          //请求 返回结果
        $response_data=Curl::get($api_url.$url,array(),$query);
        //返回
        return $response_data;
    }
}
