<?php
//我的关注
namespace frontend\controllers;
use frontend\controllers\BaseController;
use Yii;    
use frontend\models\follow\Follow;
class FollowController extends BaseController
{
    //关闭YiiPost的验证
    public $enableCsrfValidation=false;
    //==========================
    //我的关注
    public function actionIndex()
    {
        $this->layout=false;
         //令牌
         try{if(!isset(Yii::$app->session['member']['token']))throw new \Exception('miss token',-1);$token=Yii::$app->session['member']['token'];}
         catch(\Exception $e){}
         $paging = isset($_REQUEST['paging'])?$_REQUEST['paging']:1;
         // $paging = 1;
         $num = 15;//每页显示记录条数
        $start_page = $num*($paging-1);// 每页第一条记录编号
         //获取我的关注
        // try{
             $follow_list=array();
             $follow_list=Follow::get_user_follow($token,$num,2);
          //  }catch(\Exception $e){}
        //渲染
        return $this->render('index',['follow_list'=>$follow_list]);
    }
   //==========================
    //我的关注
    public function actionList()
    {
        $this->layout=false;
         //令牌
         try{if(!isset(Yii::$app->session['member']['token']))throw new \Exception('miss token',-1);$token=Yii::$app->session['member']['token'];}
         catch(\Exception $e){}
         $paging = isset($_REQUEST['paging'])?$_REQUEST['paging']:1;
         // $paging = 1;
         $num = 15;//每页显示记录条数
          $start_page = $num*($paging-1);// 每页第一条记录编号
         //获取我的关注
        // try{
             $follow_list=array();
            $follow_list=Follow::get_user_follow($token,$num,$paging);
          //  }catch(\Exception $e){}
        //渲染
        return \yii\helpers\Json::encode(['data'=>$follow_list]);
    }
    
}
