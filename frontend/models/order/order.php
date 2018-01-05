<?php
//购物车
namespace frontend\models\order;
use Yii;    
use common\tool\Curl;
class Order 
{
    //查詢購物車
    public static function get_order_detail()
    {
        $session=Yii::$app->session;
        $cart_list=[];
        //请求接口
        $api_url=Yii::$app->params['api_url'];
        $url=Yii::$app->params['post_url']['buying_detail'];
        //get請求參數
        $query=array('token'=>$session['member']['token']);
         //请求 返回结果
        $response_data=Curl::get($api_url.$url,array(),$query);
        return $response_data;
    }
 
}
