<?php
//商品控制层
namespace frontend\controllers;
use frontend\controllers\BaseController;
use frontend\models\product\Product;
use Yii;    
class ProductController extends BaseController
{
    //关闭YiiPost的验证
    public $enableCsrfValidation=false;
    //==========================
    //商品详情
    public function actionDetail()
    {
        $this->layout=false;
        try
        {
            $spuId=Yii::$app->request->get('spuId',false);if(!$spuId)throw new Exception("miss spuId",-1);
            //令牌
            if(!isset(Yii::$app->session['member']['token']))throw new \Exception('miss token',-1);
            $token=Yii::$app->session['member']['token'];
            //获取参数
            $produt_detail=Product::get_product_deatil($spuId,$token);
        }
        catch(\Exception $e){return Yii::$app->response->content="<script>alert('".$e->getMessage()."');history.go(-1);</script>";}
        //佈局視圖
        $view = Yii::$app->view;
        //佈局狀態
        $view->params['product'] = "mn_dq";
        //title
        $view->params['text']=Yii::$app->params['active']['product'];
        //渲染
        return $this->render('detail',['prodcut_detail'=>$produt_detail]);
    }
}
