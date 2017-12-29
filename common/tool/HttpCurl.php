<?php
namespace common\tool;
//http请求
use toohamster\Ws\Http;
class HttpCurl
{
    //==========================
    //curl请求登录 post
    public static function post($query='',$url,$headers=array('Accept'=>'application/json'),$timeout=5)
    {
        try
        {
            if(!$url||!$query)throw new \Exception("请求路径或者参数不存在");
            //创建请求对象
            $httpRequest=\Ws\Http\Request::create();
            //超时时间
            $httpRequest->timeout($timeout);
            //请求 返回结果
            $response=$httpRequest->post($url,$headers,$query);
            //判断是否是致命错误
            if(!$response)throw new \Exception('请求错误');
            //请求的code是否是200
            if($response->code!='200')throw new \Exception('请求错误');
            return array(true,json_decode($response->raw_body,true));
            // $response->code;        // 请求响应码(HTTP Status code)
            // $response->curl_info;   // curl信息(HTTP Curl info)
            // $response->headers;     // 响应头(Headers)
            // $response->body;        // 处理后的响应消息体(Parsed body)
            // $response->raw_body;    // 原始响应消息体(Unparsed body)

        }catch(\Exception $e){return array(false,$e->getMessage());}
    }
    //==========================
    //curl请求登录 get
    public static function get($url,$headers=[],$parameters=null)
    {
        try
        {
           // if(!$url||$parameters)throw new \Exception("请求路径或者参数不存在");
            //创建请求对象
            $httpRequest=\Ws\Http\Request::create();
            //请求 返回结果
            $response=$httpRequest->get($url,$headers,$parameters);
            //判断是否是致命错误
            if(!$response)throw new \Exception('请求错误');
            //请求的code是否是200
            if($response->code!='200')throw new \Exception('请求错误,狀態碼:'.$response->code);
            return array(true,json_decode($response->raw_body,true));
            // $response->code;        // 请求响应码(HTTP Status code)
            // $response->curl_info;   // curl信息(HTTP Curl info)
            // $response->headers;     // 响应头(Headers)
            // $response->body;        // 处理后的响应消息体(Parsed body)
            // $response->raw_body;    // 原始响应消息体(Unparsed body)
        }catch(\Exception $e){return array(false,$e->getMessage());}
    }
}
