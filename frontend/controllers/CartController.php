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
    //文化首頁
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
}
