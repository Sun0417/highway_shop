<?php
namespace frontend\controllers;
use frontend\controllers\BaseController;
use yii\web\Controller;
use Yii;    
use  common\tool\HttpCurl;
class CultureController extends BaseController
{
    //==========================
    //文化首頁
    public function actionIndex()
    {
        $this->layout='main';
        //佈局視圖
        $view = Yii::$app->view;
        //佈局狀態
        $view->params['culture'] = "mn_dq";
        //title
        $view->params['text']=Yii::$app->params['active']['culture'];
        return $this->render('index');
    }
}
