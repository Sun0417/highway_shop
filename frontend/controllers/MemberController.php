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
    //==========================
    //个人中心-详情
    public function actionDetail()
    {
        $this->layout=false;
        return $this->render('detail');
    }
    //==========================
    //个人中心-编辑名称
    public function actionEdit()
    {
        $this->layout=false;
        return $this->render('edit');
    }
}
