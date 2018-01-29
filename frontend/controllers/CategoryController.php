<?php
//分类
namespace frontend\controllers;
use frontend\controllers\BaseController;
use Yii;    
use frontend\models\category\Category;
class CategoryController extends BaseController
{
    //关闭YiiPost的验证
    public $enableCsrfValidation=false;
    //==========================
    //我的关注
    public function actionIndex()
    {
        $this->layout=false;
        //令牌
        try
        {
            $category_id=Yii::$app->request->get('category_id',false);if(!$category_id)throw new \Exception("miss category_id",-1);
            if(!isset(Yii::$app->session['member']['token']))throw new \Exception('miss token',-1);
            $token=Yii::$app->session['member']['token'];
        }
        catch(\Exception $e){}
        //分类幻灯
        try
        {
            $category_banner=array();
            $siteNo='category_'.$category_id;
            $category_banner=Category::get_category_banner($siteNo,$token);
        }
        catch(\Exception $e){}
        //子分类
        try
        {
            $category_child=array();
            $category_id=$category_id;
            $category_child=Category::get_category_child($category_id,$token);
        }
        catch(\Exception $e){}
        //渲染
        return $this->render('index',['category_banner'=>$category_banner,'category_child'=>$category_child]);
    }
    //==========================
    //我的子分类下参评
    public function actionList()
    {
        $this->layout=false;
         //令牌
         try{if(!isset(Yii::$app->session['member']['token']))throw new \Exception('miss token',-1);$token=Yii::$app->session['member']['token'];}
         catch(\Exception $e){}
         $pageNum=isset($_REQUEST['paging'])?$_REQUEST['paging']:1;
         $categoryId = $_REQUEST['category_id'];
         $pageSize=Yii::$app->params['pageSize'];//每页显示记录条数
         //获取我的关注
        try{
                $product_list=array();
                $product_list=Category::get_category_product($categoryId,$pageSize,$pageNum,$token);
         }catch(\Exception $e){}
        //渲染
        return \yii\helpers\Json::encode(['data'=>$product_list]);
    }
}
