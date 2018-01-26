<?php
//商品控制层
namespace frontend\controllers;
use frontend\controllers\BaseController;
use yii\web\Controller;
use frontend\models\product\Product;
use frontend\models\cart\Cart;
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
       
        //令牌
        try
        {
            $spuId=Yii::$app->request->get('spuId',false);if(!$spuId)throw new \Exception("miss spuId",-1);
            if(!isset(Yii::$app->session['member']['token']))throw new \Exception('miss token',-1);
            $token=Yii::$app->session['member']['token'];
        }
        catch(\Exception $e){}
       //推荐    
       try{$produt_detail=array();$produt_detail=Product::get_product_deatil($spuId,$token);}catch(\Exception $e){}
       //获取点赞列表
       try
        {
            $markType=3;
            $lived_list=array();
            $lived_list=Product::get_lived_list($markType,$produt_detail['sourceType'],$produt_detail['sourceId'],$token);
        }
        catch(\Exception $e){}
        //渲染
        return $this->render('detail',['produt_detail'=>$produt_detail,'lived_list'=>$lived_list]);
    }
    //==========================
    //分类
    public function actionCategory()
    {
        $this->layout=false;
        //渲染
        return $this->render('category');
    }
    //==========================
    //点赞商品
    public function actionLiked()
    {
        $this->layout=false;
        try
        {
            //资源id
            $sourceId=Yii::$app->request->get('sourceId',false);if(!$sourceId)throw new \Exception("miss sourceId",-1);
            $type=Yii::$app->request->get('type',false);if(!$type)throw new \Exception("miss type",-1);
            //令牌
            if(!isset(Yii::$app->session['member']['token']))throw new \Exception('miss token',-1);
            $token=Yii::$app->session['member']['token'];
            //点赞
            if($type==2)
            {
                $sourceId=explode(',', $sourceId);
                //标记类型
                $markType=3;
                //获取参数
                $produt_detail=Product::liked_product($markType,$sourceId[1],$sourceId[0],$token);
                //返回
                return \yii\helpers\Json::encode(['error'=>0,'message'=>'点赞成功','LikedId'=>$produt_detail]);
            }
            //取消点赞
            if($type==1)
            {
                //获取参数
                $produt_detail=Product::no_liked_product($sourceId,$token);
                //返回
                return \yii\helpers\Json::encode(['error'=>0,'message'=>'取消点赞成功']);
            }
        }
        catch(\Exception $e){return \yii\helpers\Json::encode(['error'=>$e->getCode(),'message'=>'失敗']);}
    }
    //==========================
    //收藏商品
    public function actionRecommend()
    {
        $this->layout=false;
        try
        {
            //资源id
            $sourceId=Yii::$app->request->get('sourceId',false);if(!$sourceId)throw new \Exception("miss sourceId",-1);
            $type=Yii::$app->request->get('type',false);if(!$type)throw new \Exception("miss type",-1);
            //令牌
            if(!isset(Yii::$app->session['member']['token']))throw new \Exception('miss token',-1);
            $token=Yii::$app->session['member']['token'];
            //点赞
            if($type==2)
            {
                $sourceId=explode(',', $sourceId);
                //标记类型
                $markType=1;
                //获取参数
                $produt_detail=Product::recommen_product($markType,$sourceId[1],$sourceId[0],$token);
                //返回
                return \yii\helpers\Json::encode(['error'=>0,'message'=>'收藏成功','recommendId'=>$produt_detail]);
            }
            //取消点赞
            if($type==1)
            {
                //获取参数
                $produt_detail=Product::no_recommen_product($sourceId,$token);
                //返回
                return \yii\helpers\Json::encode(['error'=>0,'message'=>'取消收藏成功']);
            }
        }
        catch(\Exception $e){return \yii\helpers\Json::encode(['error'=>$e->getCode(),'message'=>'失敗']);}
    }
    
}
