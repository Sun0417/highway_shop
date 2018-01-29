<!doctype html>
<html>
<head>
<meta charset='utf-8' />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<meta name="format-detection" content="telephone=no"/>
<title>正善商城-產品詳情</title>
<link href="assets/shop/css/global.css" rel="stylesheet" type="text/css">
<link href="assets/shop/css/font.css" rel="stylesheet" type="text/css">
<link href="assets/shop/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="assets/shop/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/shop/js/response.js"></script>
<link href="assets/shop/css/loadSimple.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="assets/shop/js/wechat.js"></script>
<script>
   function changeFrameHeight(){
                    var ifm= document.getElementById("myiframe"); 
                    ifm.height=document.documentElement.clientHeight;
                }
                window.onresize=function(){  
                    changeFrameHeight();  
    
    } 
    $(function(){
	  var h=$('.pdpm_reply,.pdpm_buy').outerHeight();
	  var w=$('.pdpm_reply,.pdpm_buy').outerWidth();
	  $('.hfbtn').click(function(){
		$('.popup_mask').fadeIn(200);
		$('.pdpm_reply').css({'opacity':0,top:'-50%',left:'50%',transform: ' translateX(-50%)',display:'block'}).animate({top:'1rem','opacity':1},240);
	  })
	  $('.pr_qx,.pr_hf').click(function(){
		$('.popup_mask').fadeOut(200);
		$('.pdpm_reply').animate({top:'-50%','opacity':0},240,'swing',function(){$('.pdpm_reply').hide()});
	  })
    $('.gmbtn').click(function(){
    var status=$(this).attr('data-id');
    //购物车
    if(status==1){$('.add_cart').text('加入購物車');$('.add_cart').attr('data-id',1);}
    //立即购买
    if(status==2){$('.add_cart').text('立即購買');$('.add_cart').attr('data-id',2);}  
		$('.popup_mask').fadeIn(200);
		$('.pdpm_buy').css({'opacity':0,bottom:'-50%',left:'0',display:'block'}).animate({bottom:'0','opacity':1},240);
	  })
	  $('.pb_gbbtn').click(function(){
		$('.popup_mask').fadeOut(200);
		$('.pdpm_buy').animate({bottom:'-50%','opacity':0},240,'swing',function(){$('.pdpm_buy').hide()});
	  })
	})
</script>
</head>
<body>
<header>
</header>
<article class="paddingbtm">
  <div class="pd_publisher">
    <div class="pdp_left"><a href="<?php echo yii\helpers\Url::to(['shop/index']); ?>">
    <?php if(isset($produt_detail['shop'])): ?>
        <small>
        <?php if($produt_detail['shop']['avatar']): ?>
              <img src="<?php echo $produt_detail['shop']['avatar'] ?>">
            <?php else: ?>
              <img src="assets/shop/img/avatar.jpg">
        <?php endif; ?> 
        </small>
        <span><?php echo $produt_detail['shop']['name']; ?></span>
    <?php endif; ?> 
    </a></div>
    <div class="pdp_right">
           <a href="javascript:;" class="iconfont follow" 
           data-id="<?php if(isset($produt_detail['shop']['followId'])&&!is_null($produt_detail['shop']['followId'])): ?><?php echo $produt_detail['shop']['followId']; ?>
                  <?php else: ?><?php echo $produt_detail['shop']['sourceId']?>,<?php echo $produt_detail['shop']['sourceType']?>
                  <?php endif; ?>"
           data-val="<?php if(isset($produt_detail['shop']['followId'])&&!is_null($produt_detail['shop']['followId'])): ?>1
                          <?php else: ?>2<?php endif; ?>"
           >
           <?php if(isset($produt_detail['shop']['followId'])&&!is_null($produt_detail['shop']['followId'])): ?>
           已关注
           <?php else: ?>
           关注
           <?php endif; ?>
          </a>
    </div><!--已关注的话 class="iconfont icon-jia"改成class="iconfont icon-jia qxgz"-->
  </div>
  <div class="pd_bt" style="background:url(<?php echo $produt_detail['cover']; ?>) center 0 no-repeat">
  <h3><span><?php echo $produt_detail['desc']; ?></span></h3>
  </div>
  <?php if(isset($produt_detail['detail'])&&!is_null($produt_detail['detail'])): ?>
      <?php echo $produt_detail['detail']; ?>
  <?php elseif(isset($produt_detail['uri'])&&!is_null($produt_detail['uri'])): ?>   
            <iframe style='width:100%' src="https://www.baidu.com" id="myiframe" scrolling="no" onload="changeFrameHeight()" frameborder="0"></iframe>
  <?php endif; ?>
  <div class="pd_purchase">
   <div class="pdmai_left"><p>
   <strong>
   <?php if($produt_detail['price']['min']||$produt_detail['price']['max']): ?>
     ￥<?php echo $produt_detail['price']['min']; ?>
   <?php endif; ?>  
   </strong>
   </p><p>快递：￥<?php echo $produt_detail['freight']; ?></p></div>
   <div class="pdmai_right"><a href="javascript:;" class="gmbtn add_text" data-id="1">加入购物车</a><a href="javascript:;" class="gmbtn add_text_buy" data-id='2'>立即购买</a></div>
  </div>
  <div class="pd_fabulous">
     <!--点赞功能-->      
    <div class="pdf_top"><span><?php echo count($lived_list); ?>个人觉得很牛逼</span></div>
    <dl class="pdf_btm">
        <dd><a href="javascript:;" 
          data-id="<?php if(isset($produt_detail['upvoteId'])&&!is_null($produt_detail['upvoteId'])): ?><?php echo $produt_detail['upvoteId']; ?>
                    <?php else: ?><?php echo $produt_detail['sourceId']?>,<?php echo $produt_detail['sourceType']?>
                    <?php endif; ?>"
          data-val="<?php if(isset($produt_detail['upvoteId'])&&!is_null($produt_detail['upvoteId'])): ?>1
                            <?php else: ?>2<?php endif; ?>"
        class="iconfont <?php if(isset($produt_detail['upvoteId'])&&!is_null($produt_detail['upvoteId'])): ?>icon-yizan 
                          <?php else: ?>icon-dianzan<?php endif; ?> dianzhan"></a></dd><!--已点赞的话icon-dianzan改成 icon-dianzan icon-yizan-->
      <!--点赞功能-->      

      <!--点赞列表-->           
      <?php if(isset($lived_list)&&$lived_list): ?>
        <?php foreach($lived_list as $v): ?>
            <dd><a href="javascript:;">
              <img 
              src="<?php if(isset($v['avatar'])&&!is_null($v['avatar'])): ?>
                      <?php echo $v['avatar'];  ?>
                    <?php else: ?>
                    assets/shop/img/avatar.jpg
                  <?php endif; ?>">
            </a>
          </dd>
        <?php endforeach; ?>  
      <?php endif; ?>       
      <dt class="pdf_more"><a href="javascript:;" class=" iconfont icon-gengduo"></a></dt>
     <!--点赞列表-->    
    </dl>
  </div>
  <!-- <div class="pd_comment">
    <div class="pdc_top">评论(71)</div>
    <ul class="pdc_btm">
       <li>
         <div class="pdc_people"><small><a href="javascript:;"><img src="assets/shop/img/tx_img_04.png"></a></small><span>看不清的脸庞丶</span><i>1月13日 18:21</i></div>
         <div class="pdc_content "><p class="hfbtn">牛排很厚，味道不错，好评</p></div>
         <div class="pdc_reply">
           <p class="hfbtn"><i>Woman</i> <strong>回复@看不清的脸庞丶</strong>  喜欢吃的话别忘记了分享给朋友喔。 <br /><span>1月13日 19:59</span></p>
           <p class="hfbtn"><i>看不清的脸庞丶</i> <strong>回复@Woman</strong>  已经分享了，哈哈，他们都很喜欢呢，已经下单了吧。 <br /><span>1月13日 19:59</span></p>
         </div>
       </li>
       <li>
         <div class="pdc_people"><small><a href="javascript:;"><img src="assets/shop/img/tx_img_01.png"></a></small><span>天佑佑天</span><i>1月13日 18:21</i></div>
         <div class="pdc_content "><h6 class="hfbtn">手一抖买了三件</h6></div>
       </li>
       <li>
         <div class="pdc_people"><small><a href="javascript:;"><img src="assets/shop/img/tx_img_01.png"></a></small><span>天佑佑天</span><i>1月13日 18:21</i></div>
         <div class="pdc_content ">
         <p class="hfbtn">店家发货及物流都超快，很赞！牛排也很不错，厚切的口感很好！日期都很新，很愉快的一次购物。</p>
         <p><a href="javascript:;" onclick="previewImage(this)"  style="  center 0 no-repeat; background-size:auto 100%"></a></p>
         </div>
       </li>
    </ul>
  </div> -->
  <div class="popup_mask" style="display:none;"></div>
  <!--回复功能弹窗-->
  <div class="pdpm_reply" style="display:none;">
    <div class="pdpm_reply_t"><textarea name="" cols="" rows=""  placeholder="随便说点什么"></textarea></div>
    <div class="pdpm_reply_b">
        <div class="pr_imgxz">
        <!--选择图片-->
        <a href="javascript:;" onclick="chooseImage(this)" class="imgxzq iconfont icon-xzimg"></a>
        <!--已选择图片-->
         <span class='img' style="display:none">
          <i><img class='img_url' style="width:100%"/></i>
          <!--删除图片-->
          <a href="javascript:;" class="primg_gb iconfont icon-scimg"></a> 
        </span>
        </div>
        <div class="pr_hfcz"><a href="javascript:;" class="pr_qx">取消</a> <a href="javascript:;" class="pr_hf">回复</a></div>
    </div>
  </div>
  <!--购买功能弹窗-->
  <div class="pdpm_buy">
     <div class="pdpmb_gb"> <a href="javascript:;" class="pb_gbbtn">关闭</a></div>
     <ul>
     <form name="form1" method="post" action="">
     <?php if(isset($produt_detail['skus'])): ?>
        <?php foreach($produt_detail['skus'] as $key=>$v): ?>
         <li>
           <div class="pdpmb_spec">
             <h3><?php echo $v['title']; ?></h3>
             <p><span>￥<?php echo $v['price']; ?></span>库存：<?php echo $v['count']; ?></p>
           </div>
           <div class="pdpmb_radio">
              <input type="radio" value='<?php echo $v['id']; ?>' name="RadioGroup3" value="单选" id="radio-3-<?php echo $key ?>" class="radiocs">
              <label for="radio-3-<?php echo $key; ?>"></label>
           </div>
         </li>
       <?php  endforeach;?>
     <?php endif; ?>    
     </form>
     </ul>
     <div class="pdpmb_sl">
      <div class="pdpmb_sll">数量：</div>
      <div class="pdpmb_slr"><small class="iconfont icon-jian"></small><span class='num' data-val=1>1</span><small class="iconfont icon-jia"></small></div>
     </div>
     <div class="pdpmb_btn"><a href="javascript:;" class="add_cart"></a></div><!--如果是点击的加入购物车弹开此弹窗 这里需要把A里面文案改成加入购物车-->
  </div>
</article>
<footer>
    <ul class="ab_rightbtnsb">
      <li class="blackbtn"><a href="<?php echo yii\helpers\Url::to(['site/index']); ?>" class="iconfont icon-shouye">首页</a></li>
      <li class="blackbtn"><a href="javascript:;" class="iconfont icon-kefu">客服</a></li>
      <li class="blackbtn">
        <a href="javascript:;" 
          data-id="<?php if(isset($produt_detail['collectionId'])&&!is_null($produt_detail['collectionId'])): ?><?php echo $produt_detail['collectionId']; ?>
                    <?php else: ?><?php echo $produt_detail['sourceId']?>,<?php echo $produt_detail['sourceType']?>
                    <?php endif; ?>"
          data-val="<?php if(isset($produt_detail['collectionId'])&&!is_null($produt_detail['collectionId'])): ?>1
                            <?php else: ?>2<?php endif; ?>"
        class="iconfont <?php if(isset($produt_detail['collectionId'])&&!is_null($produt_detail['collectionId'])): ?>icon-yicang 
                          <?php else: ?> icon-shoucang<?php endif; ?> shoucang">收藏</a>
      </li><!--已收藏的话icon-shoucang改成 icon-yicang-->
      <li class="blackbtn"><a href="<?php echo yii\helpers\Url::to(['cart/index']); ?>" class="iconfont icon-gouwuche">购物车
      <?php if(isset(Yii::$app->session['cart']['is_cart'])&&Yii::$app->session['cart']['is_cart']): ?><i></i><?php endif; ?>
       </a>
    </li>
      <!-- <li><a href="javascript:;" class="hfbtn">写评论</a></li> --> -->
    </ul>
</footer>
<script type="text/javascript" src="assets/shop/js/jimiAlert.js"></script>
<script type="text/javascript" src="assets/shop/js/controller.js"></script>
<script>
 $(document).ready(function(e) {
	var aa = $(".pdf_btm > dd,.pdf_btm > dt").innerWidth(); 
    $(".pdf_btm > dd,.pdf_btm > dt").css('height',aa); 
    var le=$('.pdf_btm dd').length;
	if(le<=15)
	{
	  $('.pdf_more').css('display','none');
	}
	$(".pdf_more").toggle(
    function()
	 {
	    $(".pdf_btm > dd:gt(14)").css('display','inline-block');
	    $(".icon-gengduo").addClass('icon-shouqi').removeClass('icon-gengduo');
	 },
    function()
	{
		$(".pdf_btm > dd:gt(14)").css('display','none');
		$(".icon-shouqi").addClass('icon-gengduo').removeClass('icon-shouqi');
    }  
  );
  });  
//设置文字
//=============================================
//点赞  收藏  關注
$(function (){ 
    var aa = $(".pdf_btm > dd,.pdf_btm > dt").innerWidth(); 
    $(".pdf_btm > dd,.pdf_btm > dt").css('height',aa); 
    //点赞
    $(".dianzhan").click(function(){
      var sourceId=$(this).attr('data-id');
      var type=$(this).attr('data-val');
      var that=$(this);
      loaderHelper.show({'text':"加载中...."});
          $.ajax({
                    type: 'GET',
                    url:"<?php echo \yii\helpers\Url::to(['product/liked']); ?>",
                    data:{sourceId:sourceId,type:type},
                    success: function(data){
                        loaderHelper.hide();
                        if(typeof data=='string')data=JSON.parse(data);
                        if(data.error!=0){alert(data.message);return false;}
                        alert(data.message);
                        if(type==1){
                          that.attr('data-id',<?php echo $produt_detail['sourceId']?>+','+<?php echo $produt_detail['sourceType']?>);that.attr('data-val',2);
                          that.addClass('icon-dianzan');
                          that.removeClass('icon-yizan');
                          location.reload();
                        }else{
                          that.attr('data-id',data.LikedId);that.attr('data-val',1);
                          that.removeClass('icon-dianzan');
                          that.addClass('icon-yizan');
                          location.reload();
                        }
                    },
                    error:function(res){
                        loaderHelper.hide();
                        alert("網絡異常,請重試!");
                        return false;
                  }
              })
    })
    //收藏
    $(".shoucang").click(function(){
      var sourceId=$(this).attr('data-id');
      var type=$(this).attr('data-val');
      var that=$(this);
      loaderHelper.show({'text':"加载中...."});
          $.ajax({
                  type: 'GET',
                  url:"<?php echo \yii\helpers\Url::to(['product/recommend']); ?>",
                  data:{sourceId:sourceId,type:type},
                  success: function(data){
                      loaderHelper.hide();
                      if(typeof data=='string')data=JSON.parse(data);
                      if(data.error!=0){alert(data.message);return false;}
                      alert(data.message);
                      if(type==1){
                        that.attr('data-id',<?php echo $produt_detail['sourceId']?>+','+<?php echo $produt_detail['sourceType']?>);that.attr('data-val',2);
                        that.addClass('icon-shoucang');
                        that.removeClass('icon-yicang');
                      }else{
                        that.attr('data-id',data.recommendId);that.attr('data-val',1);
                        that.removeClass('icon-shoucang');
                        that.addClass('icon-yicang');
                      }
                  },
                  error:function(res){
                      loaderHelper.hide();
                      alert("網絡異常,請重試!");
                      return false;
                }
              })
    })
    //關注
    $('.follow').click(function(){
      var sourceId=$(this).attr('data-id');
      var type=$(this).attr('data-val');
      var that=$(this);
      loaderHelper.show({'text':"加载中...."});
      $.ajax({
                type: 'GET',
                url:"<?php echo \yii\helpers\Url::to(['shop/fllow']); ?>",
                data:{sourceId:sourceId,type:type},
                success: function(data){
                    loaderHelper.hide();
                    if(typeof data=='string')data=JSON.parse(data);
                    if(data.error!=0){alert(data.message);return false;}
                    alert(data.message);
                    if(type==1){
                      that.attr('data-id',<?php echo $produt_detail['shop']['sourceId']?>+','+<?php echo $produt_detail['shop']['sourceType']?>);that.attr('data-val',2);
                      that.html('关注');
                    }else{
                      that.attr('data-id',data.fllowId);that.attr('data-val',1);
                      that.html('已关注');
                    }
                },
                error:function(res){
                    loaderHelper.hide();
                    alert("網絡異常,請重試!");
                    return false;
              }
          })
    })
}) 
//============================================
//购物车模板
$(document).ready(function(e) {
  //獲取radi選擇的值
  function get_radio_check()
  {
    var sku_id='';
    $("input[type='radio']").each(function(){if($(this).is(":checked")){sku_id=$(this).val();}});
    if(!sku_id){alert('請選擇商品');return false;}
    return sku_id;
  }
  //選擇更新
  $('.radiocs').click(function(){
    if($(this).is(":checked"))
    {
      $('.num').html(1);
      $('.num').attr('data-val',1);
    }
  })
   //減去
  $('.icon-jian').click(function(){
        var sku_id=get_radio_check();
        if(!sku_id){alert('請選擇商品');return false;}
        var num=$('.num').attr('data-val');
        if(num>1){
          var nums;
          nums=--num;
          $('.num').html(nums);
          $('.num').attr('data-val',nums);
        }
    })
  //加加
  $('.icon-jia').click(function(){
      var sku_id=get_radio_check();
      if(!sku_id){alert('請選擇商品');return false;}
      var num=$('.num').attr('data-val');
      var nums;
      nums=++num;
      $('.num').html(nums);
      $('.num').attr('data-val',nums);
  })
  //添加購物車
	$('.add_cart').click(function(){
        var status=$(this).attr('data-id');
        var count=$('.num').attr('data-val');
        //加入購物車
        if(status==1)
        {
          var salesUnitId=get_radio_check();
          if(!salesUnitId){alert('請選擇商品');return false;}
          loaderHelper.show({'text':"購物車添加中...."});
          $.ajax({
                type: 'POST',
                url:"<?php echo \yii\helpers\Url::to(['cart/add-cart']); ?>",
                data:{salesUnitId:salesUnitId,count:count},
                success: function(data){
                    loaderHelper.hide();
                    if(typeof data=='string')data=JSON.parse(data);
                    if(data.error!=0){alert(data.message);return false;}
                    alert(data.message);
                },
                error:function(res){
                    loaderHelper.hide();
                    alert("網絡異常,請重試!");
                    return false;
              }
          })
        }
        //直接購買
        if(status==2)
        {
          var url='<?php echo \yii\helpers\Url::to(['order/buy-order']); ?>';
          location.href=url;
        }
       
   })
  
}); 

</script> 
</body>
</html>
