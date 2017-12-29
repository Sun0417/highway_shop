<?php
namespace frontend\controllers;
use frontend\controllers\BaseController;
use frontend\models\reg\Reg;
use Yii;    
class RegController extends BaseController
{
    //关闭YiiPost的验证
    public $enableCsrfValidation=false;
    //==========================
    //微信登录
    public function actionIndex()
    {
        $this->layout=false;
        return $this->render('index');
    }
    //==========================
    //ajax发送验证码
    public function actionSendCode()
    {
        try
        {
            //获取手机号
            $phone=Yii::$app->request->post('phone',false);if(!$phone)throw new \Exception('miss phone',-1);
            //openID是否存在
            if(!isset(Yii::$app->$session['member']['openid']))throw new \Exception('miss openid',-1);
            //获取openid
            $openid=Yii::$app->$session['member']['openid'];
            //發送驗證碼
            Reg::send_verification_code($openid,$phone);
            //返回
            return \yii\helpers\Json::encode(['error'=>0]);
            
        }catch(\Exception $e){return \yii\helpers\Json::encode(['error'=>$e->getCode(),'message'=>$e->getMessage()]);}
    }
    //==========================
    //ajax验证验证码 注册用户
    public function actionCheckCode()
    {
        try
        {
            //验证码是否存在
            $identifyingCode=Yii::$app->request->post('identifyingCode',false);if(!$identifyingCode)throw new \Exception('miss identifyingCode');
            //判斷是否有訂單號
            if(!isset($_COOKIE['orderId']))throw new \Exception("miss orderId",-1);
            //訂單號
            $orderId=$_COOKIE['orderId'];
            //驗證驗證碼 提交註冊
            Reg::check_verification_code($orderId,$identifyingCode);
            //返回
            return \yii\helpers\Json::encode(['error'=>0]);
        }
        catch(\Exception $e){return \yii\helpers\Json::encode(['error'=>$e->getCode(),'message'=>$e->getMessage()]);}
    }
}
