<?php
namespace frontend\controllers;
use frontend\controllers\BaseController;
use yii\web\Controller;
use Yii;    
use  common\tool\HttpCurl;
class MemberController extends BaseController
{
    //==========================
    //个人中心
    public function actionIndex()
    {
        $this->layout='main';
        //佈局視圖
        $view = Yii::$app->view;
        //佈局狀態
        $view->params['member'] = "mn_dq";
        //title
        $view->params['text']=Yii::$app->params['active']['member'];
        return $this->render('index');
    }
}
