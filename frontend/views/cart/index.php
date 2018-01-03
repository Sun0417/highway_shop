<header>
</header>
<article class="paddingbtm">
  <div class="shoppingcart">
       <?php if($cart_list['detail']&&isset($cart_list['detail'])): ?> 
                <?php foreach($cart_list['detail'] as $vt): ?>
                	<dl>
                      <form name="form1" method="post" action="">
                        <dt>
                         <!--<div class="sc_checkbox">
                          <input type="checkbox" name="CheckboxGroup1" value="复选框" id="checkbox-1-0" class="ckbox">
                          <label for="checkbox-1-0"></label>
                         </div> -->
                         <div class="shop_headlines iconfont icon-dianpu"><a href="javascript:;"><?php echo $vt['shopName'];  ?></a></div>
                         <button type="button" class="ck_button">清空</button>
                        </dt>
                        <?php foreach($vt['salesUnits'] as $vt_sku): ?>
                            <dd class="sccart_dd cart_1">
                              <div class="sc_rolllayer">
                                 <div class="scrol_lt">
                                  <!--<div class="sc_checkbox">
                                    <input type="checkbox" name="CheckboxGroup1" value="复选框" id="checkbox-1-1" class="ckbox">
                                    <label for="checkbox-1-1"></label>
                                   </div>--><?php //echo $vt_sku['skuCover']; ?>
                                   <div class="scpro_img"><a href="javascript:;"><img src="assets/shop/img/proimg_01.png"></a></div>
                                   <div class="scpro_text">
                                     <h4><?php echo $vt_sku['title']; ?></h4>
                                     <p><span><?php echo $vt_sku['viceTitle'];?></span><small>￥<?php echo $vt_sku['price']; ?> x <?php echo $vt_sku['buyCount']; ?></small></p>
                                     <div class="scpro_number">
                                     <small rel="<?php echo $vt_sku['recordId']; ?>" num="<?php echo $vt_sku['buyCount']; ?>" class="iconfont icon-jian cartqtydown"></small>
                                     <span><?php echo $vt_sku['buyCount']; ?></span>
                                     <small rel="<?php echo $vt_sku['recordId']; ?>" num="<?php echo $vt_sku['buyCount']; ?>" class="iconfont icon-jia cartqtyup"></small></div>
                                   </div>
                                  </div>
                                 <div class="scpro_delete" data-id="1"></div>
                              </div>
                            </dd>
                        <?php  endforeach;?>    
                       </form>
                  </dl>
                <?php  endforeach;?>
        <?php else:?>
           <div>购物车空空如也11</div>
        <?php endif; ?>
        <div class="pao_xf">
           <div class="pao_jiage">總價：<strong>￥<?php echo $cart_list['totalPrice']; ?></strong><small>不含運費</small></div>
           <div class="pao_btn"><a href='<?php echo \yii\helpers\Url::to(['order/index']); ?>'>下单吃肉</a></div>
       </div>
  </div>
</article>
<script src="assets/shop/js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="assets/shop/js/jimiAlert.js"></script>
<script type="text/javascript">
$(document).ready(function(e) {
          currentUrl = "<?php echo \yii\helpers\Url::to(['cart/index']); ?>"
          updateCartInfoUrl = "<?php echo \yii\helpers\Url::to(['cart/edit-cart']); ?>"
            //减
            $(".cartqtydown").click(function(){
            //购物车的主键ID
            $item_id = $(this).attr("rel");
            //购买数量
            num = $(this).attr("num");
        //如果大于1 才会
        if(num>1){
                loaderHelper.show({'text':"购物车处理中...."});
                //ajax请求
                $.ajax({
                async:true,
                timeout: 6000,
                dataType: 'json', 
                type:'get',
                data: $data,
                url:updateCartInfoUrl,
                success:function(data, textStatus){ 
                    loaderHelper.hide();
                    if(typeof data=='string')data=JSON.parse(data);
                    if(data.error!=0){alert(data.message);return false;}
                    window.location.href=currentUrl;
                },
                error:function (XMLHttpRequest, textStatus, errorThrown){}
                });
            }
        });
        //加
        $(".cartqtyup").click(function(){
            //购物车的主键ID
            $item_id = $(this).attr("rel");
            //参数
            $data = {
              item_id:$item_id,
              up_type:"add_one"
            };
            loaderHelper.show({'text':"购物车处理中...."});
            //ajax请求
            $.ajax({
              async:true,
              timeout: 6000,
              dataType: 'json', 
              type:'get',
              data: $data,
              url:updateCartInfoUrl,
              success:function(data, textStatus){ 
                    loaderHelper.hide();
                    if(typeof data=='string')data=JSON.parse(data);
                    if(data.error!=0){alert(data.message);return false;}
                    window.location.href=currentUrl;
              },
              error:function (XMLHttpRequest, textStatus, errorThrown){}
            });});
        //删除商品
        $(".btn-remove").click(function(){
          $item_id = $(this).attr("rel");
          $data = {
            item_id:$item_id,
            up_type:"remove"
          };
          loaderHelper.show({'text':"删除商品中...."});
          $.ajax({
            async:true,
            timeout: 6000,
            dataType: 'json', 
            type:'get',
            data: $data,
            url:updateCartInfoUrl,
            success:function(data, textStatus){ 
                loaderHelper.hide();
                if(typeof data=='string')data=JSON.parse(data);
                if(data.error!=0){alert(data.message);return false;}
                window.location.href=currentUrl;
            },
            error:function (XMLHttpRequest, textStatus, errorThrown){}
          });});
        $('.scpro_delete').click(function(){
            var id=$(this).attr('data-id');
            $('.cart_'+id).fadeOut({
             duration: 300,
             complete: function(){
                //ajax請求了
                $('.cart_'+id).remove();
              }
            })})
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