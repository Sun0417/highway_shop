<?php
//訂單控制层
namespace frontend\controllers;
use frontend\controllers\BaseController;
use frontend\models\product\Product;
use frontend\models\order\Order;
use frontend\models\address\Address;
use Yii;    
class OrderController extends BaseController
{
    //关闭YiiPost的验证
    public $enableCsrfValidation=false;
    //==========================
    //訂單購買
    public function actionIndex()
    {
        $this->layout=false;
        try{$order_list=Order::get_order_detail();}
        catch(\Exception $e){return Yii::$app->response->content="<script>alert('".$e->getMessage()."');history.go(-1);</script>";}
        //渲染
        return $this->render('index',['order_list'=>$order_list]);
    }
    //==========================
    //订单确认
    public function actionConfirmOrder()
    {
        $this->layout=false;
         //獲取地址列表
         try{$list=Address::get_address();}
         catch(\Exception $e){return Yii::$app->response->content="<script>alert('".$e->getMessage()."');history.go(-1);</script>";}
         try{$order_list=Order::get_order_detail();}
         catch(\Exception $e){return Yii::$app->response->content="<script>alert('".$e->getMessage()."');history.go(-1);</script>";}
        if(Yii::$app->request->isPost)
        {
            $post=Yii::$app->request->post();
        }
        return $this->render('confirm-order',['address_list'=>$list,'order_list'=>$order_list]);
    }
    //==========================
    //訂單購買
    public function actionBuyOrder()
    {
        $this->layout=false;
        // try
        // {
        //     $spuId=Yii::$app->request->get('spuId',false);if(!$spuId)throw new \Exception("miss spuId",-1);
        //     //令牌
        //     if(!isset(Yii::$app->session['member']['token']))throw new \Exception('miss token',-1);
        //     $token=Yii::$app->session['member']['token'];
        //     //获取参数
        //     $produt_detail=Product::get_product_deatil($spuId,$token);
        // }
        // catch(\Exception $e){return Yii::$app->response->content="<script>alert('".$e->getMessage()."');history.go(-1);</script>";}
        //渲染
        return $this->render('buy-order');
    }
}
