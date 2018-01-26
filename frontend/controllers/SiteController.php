<?php
namespace frontend\controllers;
use frontend\controllers\BaseController;
use yii\web\Controller;
use frontend\models\index\Index;
use frontend\models\product\Product;
use Yii;
class SiteController extends BaseController
{
	//===========================
	//首页
    public function actionIndex()
    {
        $this->layout='main';
         //令牌
        try{if(!isset(Yii::$app->session['member']['token']))throw new \Exception('miss token',-1);$token=Yii::$app->session['member']['token'];}
        catch(\Exception $e){}
        //推荐    
        try{$recommendType=Yii::$app->request->get('recommendType',false);if(!$recommendType) $recommendType=1;$recommend_list=Product::get_recommend_product($recommendType,$token);}
        catch(\Exception $e){}
        //幻灯片    
        try {$banner_list=array();$banner_list=Index::get_index_banner($token);}catch(\Exception $e){}
        //分类列表    
        try{ $category_list=array();$category_list=Index::get_index_cate($token);}catch(\Exception $e){}
       //視圖
       $view = Yii::$app->view;
       //視圖賦值
       $view->params['index']="mn_dq";
       $view->params['text']=Yii::$app->params['active']['index'];
        //渲染
        return $this->render('index',['banner_list'=>$banner_list,'category_list'=>$category_list,'recommend_list'=>$recommend_list]);
    } 
    //===========================
    //首页热门
    public function actionHot()
    {
        $this->layout='main';
        try
        {
            //令牌
            if(!isset(Yii::$app->session['member']['token']))throw new \Exception('miss token',-1);
            $token=Yii::$app->session['member']['token'];
            $recommend_list=array();
            //获取推荐
            $recommendType=Yii::$app->request->get('recommendType',false);
            if(!$recommendType)throw new \Exception('miss recommendType',-1);;
            $recommend_list=Product::get_recommend_product($recommendType,$token);
            //視圖
            $view = Yii::$app->view;
            //視圖賦值
            $view->params['index']="mn_dq";
            $view->params['text']=Yii::$app->params['active']['index'];
        }
        catch(\Exception $e){}
        //渲染
        return $this->render('hot',['recommend_list'=>$recommend_list]);
    } 
}
