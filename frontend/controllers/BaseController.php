<?php
//基類
namespace frontend\controllers;
use yii\web\Controller;
use Yii;    
use frontend\models\token\Token;
use frontend\models\cart\Cart;
class BaseController extends Controller
{
    //====================================
    //驗證用戶是否登錄
    public function beforeAction($action) 
    {
        try 
        {  
          
            //不需要驗證token的控制器名稱的數組
            $actions=Yii::$app->params['check_token_action'];
            //控制器名
            $controllerID=$action->controller->id;
            //操作
            $actionID=$action->id;
            //拼接get參數
            $url=http_build_query($_GET);
            //跳轉路徑
            $location=substr($url,2,strlen($url));
            //openid是否存在
            $session=Yii::$app->session;
            //$session['member']=['openid'=>'o2OSC09-ma0l6ZlYpIRAa9za0abc'];
            if(!isset($session['member']['openid'])&&!$session['member']['openid']){$this->redirect(['oauth/wei-xin','location'=>$location]);}
            //存在數組中 不需要驗證token
            if(in_array($controllerID.'/'.$actionID,$actions))return true;
            //驗證token
            $check_res=Token::check_token();
            //正常情況 token存在並且沒有過期
            if($check_res)
            {
                $this->get_cart_status();
                return true;
            };
            //token不存在或者已經過期 直接請求獲取token接口
            $token_status=Token::get_token();
            //通過  //獲取成功
            if($token_status)
            {
                $this->get_cart_status();
                return true;
            }
            //失敗
            return $this->redirect(['reg/index']);  
        }
        catch(\Exception $e){echo Yii::$app->response->content="<script>alert('".$e->getMessage()."');history.go(-1);</script>";}
    }
    //=============================
    //获取购物车状态
    public function get_cart_status()
    {
        try{
            $session=Yii::$app->session;
            $cart_list=Cart::get_cart_list();
            if(isset($cart_list)
                &&$cart_list['isEffective'])
                {$session['cart']=['is_cart'=>true];}
            else $session['cart']=['is_cart'=>false];
        }catch(\Exception $e){}
    }
}

