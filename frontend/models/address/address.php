<?php
//地址
namespace frontend\models\address;
use Yii;    
use common\tool\Curl;
use yii\helpers\Html;
class Address 
{
    //查詢收貨地址
    public static function get_address()
    {
        $session=Yii::$app->session;
        $address_list=[];
        //请求接口
        $api_url=Yii::$app->params['api_url'];
        $url=Yii::$app->params['post_url']['address_list'];
        //get請求參數
        $query=array('token'=>$session['member']['token']);
        //请求 返回结果
        $response_data=Curl::get($api_url.$url,array(),$query);
        //返回
        return $response_data;
    }
    //======================
    //獲取省的數據
    public static function get_areas()
    {
        $areas_list=[];
         //请求接口
        $api_url=Yii::$app->params['api_url'];
        $url=Yii::$app->params['post_url']['address_areas'];
         //请求 返回结果
        $response_data=Curl::get($api_url.$url,array(),array());
        //返回
        return $response_data;
    }
    //=======================
    //城市三级联动
    public static function get_child_areas($areasId)
    {
         //请求接口
        $api_url=Yii::$app->params['api_url'];
        $url=Yii::$app->params['post_url']['address_child'];
        $query=array('areaId'=>$areasId);
        //请求 返回结果
        $response_data=Curl::get($api_url.$url,array(),$query);
        if(!$response_data)throw new \Exception('没有选择的市',-1);
        foreach($response_data as $key=>$v){$array[]=array('id'=>$v['area_id'], 'value'=>$v['area_name'],'parentId'=>$v['parent_id']);}
        return  $array;
    }
    //======================
    //添加地址
    public static function Add($consignee,$phone,$areaId,$address,$postCode,$token)
    {
        //请求接口
        $api_url=Yii::$app->params['api_url'];
        $url=Yii::$app->params['post_url']['address_add'];
        $query=array('name'=>$consignee,'phone'=>$phone,'areaId'=>$areaId,'address'=>$address,'postCode'=>$postCode,'token'=>$token);
          //请求 返回结果
        $response_data=Curl::post($query,$api_url.$url);
        //返回
        return $response_data;
    }
}
