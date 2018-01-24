<?php
//訂單控制层
namespace frontend\controllers;
use frontend\models\order\Order;
use frontend\controllers\BaseController;
use common\widgets\payment\Weixinjspi;
use Yii;    
class PayController extends BaseController
{
    //关闭YiiPost的验证
    public $enableCsrfValidation=false;
    //==========================
    //訂單購買
    public function actionIndex()
    {
        $openid=Yii::$app->session['member']['openid'];
		//$openid='oeu9cwfyA9yD5Ul0_lIdgXvLPm68';
		if($openid)
		{
			try
			{
					$order_list=Order::get_order_detail();
					//print_r($_POST);die;
					$address_index='address_backend\models\orderFactory\shopOrderFactory_1_1';
					$address_value=1;
					$memo_index='memo_backend\models\orderFactory\shopOrderFactory_1_1';
					$memo_value='国庆送';
					$pay=(float)$order_list['pay'];
					$order_res=Order::commit_order($pay,$address_index,$address_value,$memo_index,$memo_value);
					//$order_res=array('orderId'=>'20154875454545454','payPrice'=>100);
					//获取订单的信息
					$order_=[
						'goods_desc'=>'生鲜',
						'order_sn' =>$order_res['orderId'],
						'total_fee' =>$order_res['payPrice'],
						'body'=>'',
						'time_start' =>date("YmdHis"),
						'time_expire'=>date("YmdHis", time() + 86400*300),
						'goods_tag' =>'',
						'notify_url'=>Yii::$app->params['post_url']['callback_url'],//这是回调地址，微信通知的地址
						'openid'=>$openid,
					];
					$paymodel=Yii::$app->payment->getWeixinjspi();
					$result=$paymodel->pay($order_);//生成预付单
					//根据预付单信息生成js，详细的可以看上面的类的方法。
					if($result){$jsstr=$paymodel->getJs($result,$order_['order_sn']);}
					echo $jsstr;
				}
				catch(\Exception $e){return Yii::$app->response->content="<script>alert('".$e->getMessage()."');</script>";}
		}
		
    }
}
