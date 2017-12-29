<?php
namespace frontend\controllers;
use frontend\controllers\BaseController;
use yii\web\Controller;
use Yii;    
use  common\tool\HttpCurl;
class MessageController extends BaseController
{
    //==========================
    //消息中心
    public function actionIndex()
    {
        $this->layout='main';
        //佈局視圖
        $view = Yii::$app->view;
        //佈局狀態
        $view->params['message'] = "mn_dq";
        //title
        $view->params['text']=Yii::$app->params['active']['message'];
        return $this->render('index');
    }
}
