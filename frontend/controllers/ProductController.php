<?php
//商品控制层
namespace frontend\controllers;
use frontend\controllers\BaseController;
use yii\web\Controller;
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
            $spuId=Yii::$app->request->get('spuId',false);if(!$spuId)throw new \Exception("miss spuId",-1);
            //令牌
            if(!isset(Yii::$app->session['member']['token']))throw new \Exception('miss token',-1);
            $token=Yii::$app->session['member']['token'];
            //获取参数
            $produt_detail=Product::get_product_deatil($spuId,$token);
        }
        catch(\Exception $e){return Yii::$app->response->content="<script>alert('".$e->getMessage()."');history.go(-1);</script>";}
        //渲染
        return $this->render('detail',['produt_detail'=>$produt_detail]);
    }
    //==========================
    //商品详情
    public function actionCategory()
    {
        $this->layout=false;
        // try
        // {
        //     $spuId=Yii::$app->request->get('spuId',false);if(!$spuId)throw new Exception("miss spuId",-1);
        //     //令牌
        //     if(!isset(Yii::$app->session['member']['token']))throw new \Exception('miss token',-1);
        //     $token=Yii::$app->session['member']['token'];
        //     //获取参数
        //     $produt_detail=Product::get_product_deatil($spuId,$token);
        // }
        // catch(\Exception $e){return Yii::$app->response->content="<script>alert('".$e->getMessage()."');history.go(-1);</script>";}
        //渲染
        return $this->render('category');
    }

}
