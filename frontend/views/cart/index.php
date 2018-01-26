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
<body>
<header>
</header>
<article class="paddingbtm">
  <div class="shoppingcart">
       <?php if($cart_list['isEffective']&&isset($cart_list['childOrder'])): ?> 
                <?php foreach($cart_list['childOrder'] as $vt): ?>
                	<dl>
                      <form name="form1" method="post" action="">
                        <dt>
                         <!--<div class="sc_checkbox">
                          <input type="checkbox" name="CheckboxGroup1" value="复选框" id="checkbox-1-0" class="ckbox">
                          <label for="checkbox-1-0"></label>
                         </div> -->
                         <div class="shop_headlines iconfont icon-dianpu"><a href="javascript:;"><?php echo $vt['title'];  ?></a></div>
                         <!-- <button type="button" class="ck_button">清空</button> -->
                        </dt>
                        <?php if($vt['isEffective']): ?> 
                        <?php foreach($vt['salesUnits'] as $key=>$vt_sku): ?>
                            <dd class="sccart_dd cart_<?php echo  $key; ?>_<?php echo $vt['index'];  ?>">
                              <div class="sc_rolllayer">
                                 <div class="scrol_lt">
                                  <!--<div class="sc_checkbox">
                                    <input type="checkbox" name="CheckboxGroup1" value="复选框" id="checkbox-1-1" class="ckbox">
                                    <label for="checkbox-1-1"></label>
                                   </div>--><?php //echo $vt_sku['skuCover']; ?>
                                   <div class="scpro_img"><a href="<?php echo \yii\helpers\Url::to(['product/detail','spuId'=>$vt_sku['salesUnitId']]); ?>"><img src="<?php echo $vt_sku['cover']; ?>"></a></div>
                                   <div class="scpro_text">
                                     <h4><?php echo $vt_sku['title']; ?></h4>
                                     <p><span><?php echo $vt_sku['viceTitle'];?></span><small>￥<?php echo $vt_sku['price']; ?> x <?php echo $vt_sku['buyCount']; ?></small></p>
                                     <div class="scpro_number">
                                     <small rel="<?php echo $vt_sku['salesUnitNo']; ?>" data-id='<?php echo $vt_sku['buyCount']; ?>' class="iconfont icon-jian cartqtydown"></small>
                                     <span><?php echo $vt_sku['buyCount']; ?></span>
                                     <small rel="<?php echo $vt_sku['salesUnitNo']; ?>" class="iconfont icon-jia cartqtyup"></small></div>
                                   </div>
                                  </div>
                                 <div rel="<?php echo $vt_sku['salesUnitNo']; ?>" class="scpro_delete btn-remove" data-val="<?php echo $vt['index'];  ?>" data-id="<?php echo  $key; ?>"></div>
                              </div>
                            </dd>
                        <?php  endforeach;?>  
                        <?php endif; ?>  
                       </form>
                  </dl>
                <?php  endforeach;?>
        <?php else:?>
        <div class="no_data">
            <p><span class="iconfont icon-wushuju"></span></p>
            <p>购物车空空如也</p>
         </div> 
        <?php endif; ?>
        <div class="pao_xf">
           <div class="pao_jiage">總價：<strong>￥<?php echo $cart_list['price']; ?></strong><small>不含運費</small></div>
           <div class="pao_btn">
            <?php if($cart_list['isEffective']&&isset($cart_list['childOrder'])): ?> 
                <button readonly='true' onclick="location.href='<?php echo \yii\helpers\Url::to(['order/index']); ?>'">下单吃肉</button>
                <?php else: ?>
                <button readonly='true' onclick="location.href='<?php echo \yii\helpers\Url::to(['site/index']); ?>'">去逛逛</button>
            <?php endif; ?>
           </div>
       </div>
  </div>
</article>
<script src="assets/shop/js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="assets/shop/js/jimiAlert.js"></script>
<script type="text/javascript" src="assets/shop/js/controller.js"></script>
<script type="text/javascript">
$(document).ready(function(e) {
          currentUrl = "<?php echo \yii\helpers\Url::to(['cart/index']); ?>"
          updateCartInfoUrl = "<?php echo \yii\helpers\Url::to(['cart/edit-cart']); ?>"
            //减
            $(".cartqtydown").click(function(e){
            e.preventDefault(); 
            //购物车的主键ID
            var salesUnitNo = $(this).attr("rel");
            var num = $(this).attr('data-id');
            var keys = $(this).attr('data-val');
            //购买数量
            var count=-1;
            //如果大于1 才会
            if(num>1){
                loaderHelper.show({'text':"购物车处理中...."});
                    //ajax请求
                    $.ajax({
                        async:true,
                        timeout: 6000,
                        dataType: 'json', 
                        type:'post',
                        data:{salesUnitNo:salesUnitNo,count:count},
                        url:updateCartInfoUrl,
                        success:function(data, textStatus){ 
                            if(typeof data=='string')data=JSON.parse(data);
                            if(data.error!=0)
                            {
                                loaderHelper.hide();
                                alert(data.message);return false;
                            }
                            window.location.reload();
                        }, 
                        error:function(res){
                            loaderHelper.hide();
                            alert("網絡異常,請重試!");
                            return false;
                        }
                    });
                }
        });
        //加
        $(".cartqtyup").click(function(){
            //购物车的主键ID
            var salesUnitNo = $(this).attr("rel");
            //购买数量
            var count=1;
            loaderHelper.show({'text':"购物车处理中...."});
            //ajax请求
            $.ajax({
              async:true,
              timeout: 6000,
              dataType: 'json', 
              type:'post',
              data:{salesUnitNo:salesUnitNo,count:count},
              url:updateCartInfoUrl,
              success:function(data, textStatus){ 
                    if(typeof data=='string')data=JSON.parse(data);
                    if(data.error!=0)
                    {
                        loaderHelper.hide();
                        alert(data.message);return false;
                    }
                    window.location.reload();
              },
              error:function(res){
                    loaderHelper.hide();
                    alert("網絡異常,請重試!");
                    return false;
              }
        });});
        //删除商品
        $(".btn-remove").click(function(){
          var salesUnitNo = $(this).attr("rel");
          var keys = $(this).attr("data-id");
          var shopId = $(this).attr("data-val");
          var delCartInfoUrl="<?php echo \yii\helpers\Url::to(['cart/del-cart-record']); ?>";
          loaderHelper.show({'text':"删除商品中...."});
            $.ajax({
                    async:true,
                    timeout: 6000,
                    dataType: 'json', 
                    type:'POST',
                    data:{salesUnitNo:salesUnitNo},
                    url:delCartInfoUrl,
                    success:function(data, textStatus){ 
                        if(typeof data=='string')data=JSON.parse(data);
                        if(data.error!=0)
                        {
                            loaderHelper.hide();
                            alert(data.message);return false;
                        }
                        $('.cart_'+keys+'_'+shopId).fadeOut({
                            duration: 300,
                            complete: function(){
                                $('.cart_'+keys+'_'+shopId).remove();
                            }
                        })
                       
                        window.location.reload();
                },
                error:function(res){
                    loaderHelper.hide();
                    alert("網絡異常,請重試!");
                    return false;
              }
          });});
        // 设定每一行的宽度=屏幕宽度+按钮宽度
        $(".sc_rolllayer").width($(".sccart_dd").width() + 2 + $(".scpro_delete").width());
        // 设定常规信息区域宽度=屏幕宽度
        $(".scrol_lt").width($(".sccart_dd").width());
        // 获取所有行，对每一行设置监听
        var lines = $(".scrol_lt");
        var len = lines.length; 
        var lastX, lastXForMobile;
        // 用于记录被按下的对象
        var pressedObj;  // 当前左滑的对象
        var lastLeftObj; // 上一个左滑的对象
        // 用于记录按下的点
        var start; 
        // 网页在移动端运行时的监听
        for (var i = 0; i < len; ++i) {
            lines[i].addEventListener('touchstart', function(e){
                lastXForMobile = e.changedTouches[0].pageX;
                pressedObj = this; // 记录被按下的对象 

                // 记录开始按下时的点
                var touches = event.touches[0];
                start = { 
                    x: touches.pageX, // 横坐标
                    y: touches.pageY  // 纵坐标
                };
            });

            lines[i].addEventListener('touchmove',function(e){
                // 计算划动过程中x和y的变化量
                var touches = event.touches[0];
                delta = {
                    x: touches.pageX - start.x,
                    y: touches.pageY - start.y
                };

                // 横向位移大于纵向位移，阻止纵向滚动
                if (Math.abs(delta.x) > Math.abs(delta.y)) {
                    event.preventDefault();
                }
            });

            lines[i].addEventListener('touchend', function(e){
                if (lastLeftObj && pressedObj != lastLeftObj) { // 点击除当前左滑对象之外的任意其他位置
                    $(lastLeftObj).animate({marginLeft:"0"}, 200); // 右滑
                    lastLeftObj = null; // 清空上一个左滑的对象
                }
                var diffX = e.changedTouches[0].pageX - lastXForMobile;
                if (diffX < -30) {
                    $(pressedObj).animate({marginLeft:"-5rem"}, 200); // 左滑
                    lastLeftObj && lastLeftObj != pressedObj && 
                        $(lastLeftObj).animate({marginLeft:"0"}, 200); // 已经左滑状态的按钮右滑
                    lastLeftObj = pressedObj; // 记录上一个左滑的对象
                } else if (diffX > 30) {
                  if (pressedObj == lastLeftObj) {
                    $(pressedObj).animate({marginLeft:"0"}, 200); // 右滑
                    lastLeftObj = null; // 清空上一个左滑的对象
                  }
                }
            });
        }
        // 网页在PC浏览器中运行时的监听
        for (var i = 0; i < len; ++i) {
            $(lines[i]).bind('mousedown', function(e){
                lastX = e.clientX;
                pressedObj = this; // 记录被按下的对象
            });

            $(lines[i]).bind('mouseup', function(e){
                if (lastLeftObj && pressedObj != lastLeftObj) { // 点击除当前左滑对象之外的任意其他位置
                    $(lastLeftObj).animate({marginLeft:"0"}, 200); // 右滑
                    lastLeftObj = null; // 清空上一个左滑的对象
                }
                var diffX = e.clientX - lastX;
                if (diffX < -30) {
                    $(pressedObj).animate({marginLeft:"-5rem"}, 200); // 左滑
                    lastLeftObj && lastLeftObj != pressedObj && 
                        $(lastLeftObj).animate({marginLeft:"0"}, 200); // 已经左滑状态的按钮右滑
                    lastLeftObj = pressedObj; // 记录上一个左滑的对象
                } else if (diffX > 30) {
                  if (pressedObj == lastLeftObj) {
                    $(pressedObj).animate({marginLeft:"0"}, 200); // 右滑
                    lastLeftObj = null; // 清空上一个左滑的对象
                  }
                }
            });
        }
});
</script>
<footer>
  <ul class="menu_ul">
    <li class="<?php echo isset($this->params['index'])?$this->params['index']:''; ?>"><a href="<?php echo \yii\helpers\Url::to(['site/index']); ?>" class="iconfont icon-shouye">首頁</a></li>
    <li class="<?php echo isset($this->params['culture'])?$this->params['culture']:''; ?>"><a href="<?php echo \yii\helpers\Url::to(['culture/index']); ?>" class="iconfont icon-wenhua">文化</a></li>
    <li class="<?php echo isset($this->params['cart'])?$this->params['cart']:''; ?>">
<a href="<?php echo \yii\helpers\Url::to(['cart/index']); ?>" class="iconfont icon-gouwuche">購物車 <?php if(isset($cart_list['detail'])&&$cart_list['detail']): ?><i></i><?php endif; ?></a></li>
    <!-- <li class="<?php echo isset($this->params['message'])?$this->params['message']:''; ?>"><a href="<?php echo \yii\helpers\Url::to(['message/index']); ?>" class="iconfont icon-xiaoxi">消息</a></li> -->
    <li class="<?php echo isset($this->params['member'])?$this->params['member']:''; ?>"><a href="<?php echo \yii\helpers\Url::to(['member/index']); ?>" class="iconfont icon-wode">我的</a></li>
  </ul>
</footer>
<script type="text/javascript" src="assets/shop/js/jimiAlert.js"></script>
<script type="text/javascript" src="assets/shop/js/controller.js"></script>
</body>
</html>
