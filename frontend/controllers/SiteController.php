<?php
namespace frontend\controllers;
use frontend\controllers\BaseController;
use yii\web\Controller;
use Yii;
class SiteController extends BaseController
{
	//===========================
	//首页
    public function actionIndex()
    {
    	$this->layout='main';
    	//視圖
    	$view = Yii::$app->view;
    	//視圖賦值
        $view->params['index']="mn_dq";
        $view->params['text']=Yii::$app->params['active']['index'];
        //獲取的產品列表
		return $this->render('index');
    } 
}
