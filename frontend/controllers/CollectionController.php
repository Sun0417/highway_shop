<?php
//我的收藏
namespace frontend\controllers;
use frontend\controllers\BaseController;
use Yii;    
use frontend\models\collection\Collection;
class CollectionController extends BaseController
{
    //关闭YiiPost的验证
    public $enableCsrfValidation=false;
    //==========================
    //产品收藏
    public function actionProduct()
    {
        $this->layout=false;
         //令牌
         try{if(!isset(Yii::$app->session['member']['token']))throw new \Exception('miss token',-1);$token=Yii::$app->session['member']['token'];}
         catch(\Exception $e){}
        
        return $this->render('product');
    }
    //==========================
    //我的产品收藏
    public function actionCollectionList()
    {
        $this->layout=false;
         //令牌
         try{if(!isset(Yii::$app->session['member']['token']))throw new \Exception('miss token',-1);$token=Yii::$app->session['member']['token'];}
         catch(\Exception $e){}
        $paging = isset($_REQUEST['paging'])?$_REQUEST['paging']:1;
        $pageSize=Yii::$app->params['pageSize'];//每页显示记录条数
        //获取我的关注
        try{
            $product_list=array();
            $product_list=Collection::get_user_collection($token,$pageSize,$paging);
            }catch(\Exception $e){}
           //渲染
        //渲染
        return \yii\helpers\Json::encode(['data'=>$product_list]);
    }
    //==========================
    //文章收藏
    public function actionArticle()
    {
        $this->layout=false;
        //渲染
        return $this->render('article');
    }
    
}
