<?php
//我的关注
namespace frontend\controllers;
use frontend\controllers\BaseController;
use frontend\models\shop\Shop;
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
    //==========================no-fllow
    //關注商家
    public function actionFllow()
    {
        $this->layout=false;
        try
        {
            //资源id
            $sourceId=Yii::$app->request->get('sourceId',false);if(!$sourceId)throw new \Exception("miss sourceId",-1);
            $type=Yii::$app->request->get('type',false);if(!$type)throw new \Exception("miss type",-1);
            //令牌
            if(!isset(Yii::$app->session['member']['token']))throw new \Exception('miss token',-1);
            $token=Yii::$app->session['member']['token'];
            //关注
            if($type==2)
            {
                $sourceId=explode(',', $sourceId);
                //标记类型
                $markType=2;
                //获取参数
                $fllowId=Shop::fllow_shop($markType,$sourceId[0],$sourceId[1],$token);
                //返回
                return \yii\helpers\Json::encode(['error'=>0,'message'=>'关注成功','fllowId'=>$fllowId]);
            }
            //取消关注
            if($type==1)
            {
                //获取参数
                Shop::no_fllow_shop($sourceId,$token);
                //返回
                return \yii\helpers\Json::encode(['error'=>0,'message'=>'取消关注成功']);
            }
        }
        catch(\Exception $e){return \yii\helpers\Json::encode(['error'=>$e->getCode(),'message'=>'失敗']);}    
    }
}
