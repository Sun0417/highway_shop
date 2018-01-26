
<!doctype html>
<html>
<head>
<meta charset='utf-8' />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<meta name="format-detection" content="telephone=no"/>
<title>正善商城-<?php echo isset($this->params['text'])?$this->params['text']:''; ?></title>
<link href="assets/shop/css/global.css" rel="stylesheet" type="text/css">
<link href="assets/shop/css/font.css" rel="stylesheet" type="text/css">
<link href="assets/shop/css/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="assets/shop/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="assets/shop/css/default.css">
<link rel="stylesheet" type="text/css" href="assets/shop/css/loadSimple.css">
<script src="assets/shop/js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="assets/shop/js/response.js"></script>
</head>
<link rel="stylesheet" type="text/css" href="assets/shop/css/loader.min.css">
<script type="text/javascript">         
    // 等待所有加载
    $(window).load(function(){
        $('body').addClass('loaded');
        $('#loader-wrapper .load_title').remove();
    }); 
</script>  
<body>
<link rel="stylesheet" type="text/css" href="assets/shop/css/loader.min.css">
<script type="text/javascript">         
    // 等待所有加载
    $(window).load(function(){
        $('body').addClass('loaded');
        $('#loader-wrapper .load_title').remove();
    }); 
</script>    
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
    <div class="load_title">正在加载......<br><span>正善</span></div>
</div>
<?php echo $content; ?>
<footer>
  <ul class="menu_ul">
    <li class="<?php echo isset($this->params['index'])?$this->params['index']:''; ?>"><a href="<?php echo \yii\helpers\Url::to(['site/index']); ?>" class="iconfont icon-shouye">首頁</a></li>
    <li class="<?php echo isset($this->params['culture'])?$this->params['culture']:''; ?>"><a href="<?php echo \yii\helpers\Url::to(['culture/index']); ?>" class="iconfont icon-wenhua">文化</a></li>
    <li class="<?php echo isset($this->params['cart'])?$this->params['cart']:''; ?>">
     
    <a href="<?php echo \yii\helpers\Url::to(['cart/index']); ?>" class="iconfont icon-gouwuche">
    購物車
    <?php if(isset(Yii::$app->session['member']['is_cart'])&&Yii::$app->session['member']['is_cart']): ?><i></i><?php endif; ?>
    </a>
    </li>
    <!-- <li class="<?php echo isset($this->params['message'])?$this->params['message']:''; ?>"><a href="<?php echo \yii\helpers\Url::to(['message/index']); ?>" class="iconfont icon-xiaoxi">消息<i></i></a></li> -->
    <li class="<?php echo isset($this->params['member'])?$this->params['member']:''; ?>"><a href="<?php echo \yii\helpers\Url::to(['member/index']); ?>" class="iconfont icon-wode">我的</a></li>
  </ul>
</footer>
<script type="text/javascript" src="assets/shop/js/jimiAlert.js"></script>
<script type="text/javascript" src="assets/shop/js/controller.js"></script>
</body>
</html>
