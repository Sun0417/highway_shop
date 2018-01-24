<?php

namespace common\widgets\payment;
use Yii;
use common\widgets\payment\Weixinjspi;
use backend\models\User;
use backend\models\Order;
use backend\models\PayOrder;
class Notifyurl
{
   
    public function notify($code)
   {
        $funame='get'.$code;
        $respmodel=Yii::$app->payment->$funame();
        $result=$respmodel->notify();
        if($result){
            //更新回调的信息
            $pay=PayOrder::find()->where('oid=:oid',[':oid'=>$result['out_trade_no']])->one();
            if(count($pay)>0)
            {
                $pay['callback_data'] = json_encode($result);
                $pay['callback _time'] = time();
                $pay['trade_no'] = $result['trade_no'];
                $pay->update();
            }
            //商户订单号
            $out_trade_no=$result['out_trade_no'];
            //交易号
            $trade_no=$result['trade_no'];
            //交易状态
            $trade_status=$result['trade_status'];
            if($trade_status=='TRADE_SUCCESS')
            {
                $this->update_status($out_trade_no,$trade_no,2);
            }else{
                die("fail");
            }
        }else{

            die("签名错误");
        }
   }
   //支付状态更改
   public function update_status($out_trade_no,$trade_no,$pay_status)
   {
       //支付处理正确-判断是否已处理过支付状态
       $orders=Order::find()->where(['order_no'=>$out_trade_no,'order_status' =>1])->one();
       if(count($orders)>0){
           //更新订单
           $orders['order_status']=$pay_status;
           $orders['trade_no']=$trade_no;
           $orders->update();
           echo  '<xml><return_code><![CDATA[SUCCESS]]></return_code><return_msg><![CDATA[OK]]></return_msg></xml>';
       } else {
           //订单状态已更新，直接返回
           echo '<xml><return_code><![CDATA[SUCCESS]]></return_code><return_msg><![CDATA[OK]]></return_msg></xml>';
       }
   }
}

?>