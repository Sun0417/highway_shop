<?php
//購物車
namespace frontend\controllers;
use frontend\controllers\BaseController;
use frontend\models\cart\Cart;
use Yii;    
use  common\tool\HttpCurl;
class CartController extends BaseController
{
    //==========================
    //購物車列表
    public function actionIndex()
    {
        $this->layout='main';
        //佈局視圖
        $view = Yii::$app->view;
        //佈局狀態
        $view->params['cart'] = "mn_dq";
        //title
        $view->params['text']=Yii::$app->params['active']['cart'];
        //获取购物车列表 
         //獲取省級
        try{$cart_list=Cart::get_cart_list();}
        catch(\Exception $e){return Yii::$app->response->content="<script>alert('".$e->getMessage()."');history.go(-1);</script>";}
        //渲染
        return $this->render('index',['cart_list'=>$cart_list]);
    }
    //=========================
    //添加產品到購物車
    public function acionAddCart()
    {
        try
        {
            //商品ID
            $skuId=Yii::$app->request->post('skuId',false);if(!$skuId)throw new \Exception('miss skuId',-1);
            //數量
            $count=1;
            //令牌
            if(!isset(Yii::$app->session['member']['token']))throw new \Exception('miss token',-1);
            $token=Yii::$app->session['member']['token'];
            //發送驗證碼
            Cart::add($skuId,$count,$token);
            //返回
            return \yii\helpers\Json::encode(['error'=>0,'message'=>'加入購物車成功']);
            
        }catch(\Exception $e){return \yii\helpers\Json::encode(['error'=>$e->getCode(),'message'=>$e->getMessage()]);}
    }
}
