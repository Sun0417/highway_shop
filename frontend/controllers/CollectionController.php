<?php
//我的收藏
namespace frontend\controllers;
use frontend\controllers\BaseController;
use Yii;    
class CollectionController extends BaseController
{
    //关闭YiiPost的验证
    public $enableCsrfValidation=false;
    //==========================
    //产品收藏
    public function actionProduct()
    {
        $this->layout=false;
        //渲染
        return $this->render('product');
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
