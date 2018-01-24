<?php
//我的关注
namespace frontend\controllers;
use frontend\controllers\BaseController;
use Yii;    
class ShopController extends BaseController
{
    //关闭YiiPost的验证
    public $enableCsrfValidation=false;
    //==========================
    //我的关注
    public function actionIndex()
    {
        $this->layout=false;
        //渲染
        return $this->render('index');
    }
    
}
