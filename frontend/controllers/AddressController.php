<?php
namespace frontend\controllers;
use frontend\controllers\BaseController;
use yii\web\Controller;
use frontend\models\address\Address;
use Yii;    
use common\tool\HttpCurl;
class AddressController extends BaseController
{
    //关闭YiiPost的验证
    public $enableCsrfValidation=false;
    //========================
    //我的地址列表
    public function actionList()
    {
        $this->layout=false;
        //獲取地址列表
        try{$list=Address::get_address();}
        catch(\Exception $e){return Yii::$app->response->content="<script>alert('".$e->getMessage()."');history.go(-1);</script>";}
        //渲染
        return $this->render('list',['address_list'=>$list]);
    }
    //======================
    //地址添加
    public function actionAdd()
    {
        $this->layout=false;
        try 
        {
             if(Yii::$app->request->isPost)
            {
                $post=Yii::$app->request->post();
                //收貨人
                $consignee=$post['consignee'];if(!$consignee)throw new \Exception('miss consignee',-1);
                //收貨人聯繫電話
                $phone=$post['phone'];if(!$phone)throw new \Exception('miss phone',-1);
                //收貨人聯繫電話
                $areaId=$post['areaId'];if(!$areaId)throw new \Exception('miss areaId',-1);
                //詳細地址
                $address=$post['address'];if(!$address)throw new \Exception('miss address',-1);
                //郵編
                $postCode=$post['postCode'];
                //令牌
                if(!isset(Yii::$app->session['member']['token']))throw new \Exception('miss token',-1);
                $token=Yii::$app->session['member']['token'];
                //添加地址
                $result=Address::Add($consignee,$phone,$areaId,$address,$postCode,$token);
               return \yii\helpers\Json::encode(['error'=>$result,'message'=>'添加成功']);
            }
        }
        catch(\Exception $e){return \yii\helpers\Json::encode(['error'=>$e->getCode(),'message'=>$e->getMessage()]);}
        //渲染
        return $this->render('add');
    }
    //======================
    //地址刪除
    public function actionDel()
    {}
    //======================
    //地址編輯
    public function actionEdit()
    {}
    //======================
    //======================
    //获取市辖区 ajax
    public function actionAreas()
    {
        try
        {
            $areas_list=Address::get_areas();
            $array=[];
            foreach($areas_list as $v){$array[]=array('id'=>$v['area_id'],'value'=>$v['area_name'],'parentId'=>$v['parent_id']);}
            //返回
            return \yii\helpers\Json::encode(['error'=>0,'data'=>$array]);
        }
        catch(\Exception $e){return \yii\helpers\Json::encode(['error'=>$e->getCode(),'message'=>$e->getMessage()]);}
    }
    //======================
    //获取市辖区 ajax
    public function actionChildAreas()
    {
        try
        {
            $parents_id=Yii::$app->request->get('parents_id',false);if(!$parents_id)throw new \Exception('miss parents_id',-1);
            //请求接口
            $html=Address::get_child_areas($parents_id);
            //返回
            return \yii\helpers\Json::encode(['error'=>0,'data'=>$html]);
        }
        catch(\Exception $e){return \yii\helpers\Json::encode(['error'=>$e->getCode(),'message'=>$e->getMessage()]);}
    }
}
