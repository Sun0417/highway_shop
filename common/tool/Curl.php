<?php
namespace common\tool;
//http请求
use common\tool\HttpCurl;
class Curl extends HttpCurl
{
    //==========================
    //curl请求登录 post
    public static function post($query='',$url,$headers=array('Accept'=>'application/json'),$timeout=5)
    {
         $response=parent::post($query,$url,$headers,$timeout);
         //请求 错误
        if(!$response[0])throw new \Exception($response[1],-1);
        //接口结果
        $response_data=$response[1];
        //正确
        if(isset($response_data['error'])&&$response_data['error']==0)
        {
            //返回
            return $response_data['error'];
        }
        //報錯
        if(isset($response_data['msg']))throw new \Exception($response_data['msg'],-1); else throw new \Exception("報錯信息缺失",-1);
    }
    //==========================
    //curl请求登录 get
    public static function get($url,$headers=[],$parameters=null)
    {
        $response=parent::get($url,$headers,$parameters);
        //请求 错误
        if(!$response[0])throw new \Exception($response[1],-1);
        //接口结果
        $response_data=$response[1];
        //正确
        if(isset($response_data['error'])&&$response_data['error']==0)
        {
            //接口返回的data为空
            if(!isset($response_data['data']))return true;
            //返回
            return $response_data['data'];
        }
        //報錯
        if(isset($response_data['msg'])) throw new \Exception($response_data['msg'],-1); else throw new \Exception("報錯信息缺失",-1);
    }
}
