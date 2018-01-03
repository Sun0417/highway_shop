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
<script>
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
    <div class="pdp_left"><a href="javascript:;"><small><img src="assets/shop/img/tx_img_02.png"></small><span>Woman</span></a></div>
    <div class="pdp_right"><a href="javascript:;" class="iconfont icon-jia">关注</a></div><!--已关注的话 class="iconfont icon-jia"改成class="iconfont icon-jia qxgz"-->
  </div>
  <div class="pd_bt" style="background:url(assets/shop/img/proimg_01.png) center 0 no-repeat">
  <h3><span>美國自然牛USDAPRIME極佳級，厚切西冷牛排,全國配送，順風冷鏈</span></h3>
  </div>
  <div class="pd_details">
    <p>冷鲜肉又称保鲜肉、排酸肉，是指严格执行兽医检疫制度，对屠宰后的畜胴体迅速进行冷却处理，使胴体温度在24小时内降为0-4℃，并进行高标准排酸，在后续的加工、流通和销售过程中始终保持0-4℃范围内的生鲜肉（需具备完善的冷链运输体系）。在发达国家的生鲜肉消费中，冷鲜肉已90%。</p>
  </div>
  <div class="pd_imgyun">
    <a href="assets/shop/img/proxq_img_01.png"><img src="assets/shop/img/proxq_img_01.png"></a>
    <a href="assets/shop/img/proxq_img_02.png"><img src="assets/shop/img/proxq_img_02.png"></a>
    <a href="assets/shop/img/proxq_img_03.png"><img src="assets/shop/img/proxq_img_03.png"></a>
    <a href="assets/shop/img/proxq_img_04.png"><img src="assets/shop/img/proxq_img_04.png"></a>
    <a href="assets/shop/img/proxq_img_05.png"><img src="assets/shop/img/proxq_img_05.png"></a>
    <a href="assets/shop/img/proxq_img_06.png"><img src="assets/shop/img/proxq_img_06.png"></a>
    <a href="assets/shop/img/proxq_img_07.png"><img src="assets/shop/img/proxq_img_07.png"></a>
    <a href="assets/shop/img/proxq_img_08.png"><img src="assets/shop/img/proxq_img_08.png"></a>
    <a href="assets/shop/img/proxq_img_09.png"><img src="assets/shop/img/proxq_img_09.png"></a>
  </div>
  <div class="pd_purchase">
   <div class="pdmai_left"><p><strong>￥99.0</strong></p><p>快递：￥10.0</p></div>
   <div class="pdmai_right"><a href="javascript:;" class="gmbtn add_text" data-id="1">加入购物车</a><a href="javascript:;" class="gmbtn add_text_buy" data-id='2'>立即购买</a></div>
  </div>
  <div class="pd_fabulous">
    <div class="pdf_top"><span>32个人觉得很牛逼</span></div>
    <dl class="pdf_btm">
      <dd><a href="javascript:;" class="iconfont icon-dianzan"></a></dd><!--已点赞的话icon-dianzan改成 icon-yizan-->
      <dd><a href="javascript:;"><img src="assets/shop/img/tx_img_01.png"></a></dd>
      <dd><a href="javascript:;"><img src="assets/shop/img/tx_img_02.png"></a></dd>
      <dd><a href="javascript:;"><img src="assets/shop/img/tx_img_03.png"></a></dd>
      <dd><a href="javascript:;"><img src="assets/shop/img/tx_img_04.png"></a></dd>
      <dd><a href="javascript:;"><img src="assets/shop/img/tx_img_05.png"></a></dd>
      <dd><a href="javascript:;"><img src="assets/shop/img/tx_img_01.png"></a></dd>
      <dd><a href="javascript:;"><img src="assets/shop/img/tx_img_02.png"></a></dd>
      <dd><a href="javascript:;"><img src="assets/shop/img/tx_img_01.png"></a></dd>
      <dd><a href="javascript:;"><img src="assets/shop/img/tx_img_03.png"></a></dd>
      <dd><a href="javascript:;"><img src="assets/shop/img/tx_img_04.png"></a></dd>
      <dd><a href="javascript:;"><img src="assets/shop/img/tx_img_05.png"></a></dd>
      <dd><a href="javascript:;"><img src="assets/shop/img/tx_img_01.png"></a></dd>
      <dd><a href="javascript:;"><img src="assets/shop/img/tx_img_02.png"></a></dd>
      <dd><a href="javascript:;"><img src="assets/shop/img/tx_img_03.png"></a></dd>
      <dd><a href="javascript:;"><img src="assets/shop/img/tx_img_01.png"></a></dd>
      <dd><a href="javascript:;"><img src="assets/shop/img/tx_img_02.png"></a></dd>
      <dt class="pdf_more"><a href="javascript:;" class=" iconfont icon-gengduo"></a></dt>
    </dl>
  </div>
  <div class="pd_comment">
    <div class="pdc_top">评论(71)</div>
    <ul class="pdc_btm">
       <li>
         <div class="pdc_people"><small><a href="javascript:;"><img src="assets/shop/img/tx_img_04.png"></a></small><span>看不清的脸庞丶</span><i>1月13日 18:21</i></div>
         <div class="pdc_content hfbtn">牛排很厚，味道不错，好评</div>
         <div class="pdc_reply">
           <p class="hfbtn"><i>Woman</i> <strong>回复@看不清的脸庞丶</strong>  喜欢吃的话别忘记了分享给朋友喔。 <br /><span>1月13日 19:59</span></p>
           <p class="hfbtn"><i>看不清的脸庞丶</i> <strong>回复@Woman</strong>  已经分享了，哈哈，他们都很喜欢呢，已经下单了吧。 <br /><span>1月13日 19:59</span></p>
         </div>
       </li>
       <li>
         <div class="pdc_people"><small><a href="javascript:;"><img src="assets/shop/img/tx_img_01.png"></a></small><span>天佑佑天</span><i>1月13日 18:21</i></div>
         <div class="pdc_content hfbtn"><h6>手一抖买了三件</h6></div>
       </li>
       <li>
         <div class="pdc_people"><small><a href="javascript:;"><img src="assets/shop/img/tx_img_01.png"></a></small><span>天佑佑天</span><i>1月13日 18:21</i></div>
         <div class="pdc_content hfbtn">店家发货及物流都超快，很赞！牛排也很不错，厚切的口感很好！日期都很新，很愉快的一次购物。</div>
       </li>
    </ul>
  </div>
  <div class="popup_mask" style="display:none;"></div>
  <!--回复功能弹窗-->
  <div class="pdpm_reply" style="display:none;">
    <div class="pdpm_reply_t"><textarea name="" cols="" rows=""  placeholder="随便说点什么"></textarea></div>
    <div class="pdpm_reply_b">
        <div class="pr_imgxz">
        
        <!--选择图片-->
        <a href="javascript:;" class="imgxzq iconfont icon-xzimg " style=' display: none; '></a>
        
        <!--已选择图片-->
        <span style="background:url(assets/shop/img/proxq_img_08.png) center center no-repeat; background-size:auto 100%">
          <!--删除图片-->
          <a href="javascript:;" class="primg_gb iconfont icon-scimg"></a>
          <!--图片上传中进度-->
          <small><i style="width:30%"></i></small>
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
       <li>
         <div class="pdpmb_spec">
           <h3>100g美国牛排九折美国牛排九折美国牛排九折美国牛排九折 (两行测试)</h3>
           <p><span>￥90.0</span>库存：15</p>
         </div>
         <div class="pdpmb_radio">
            <input type="radio" value='1' name="RadioGroup3" value="单选" id="radio-3-0" class="radiocs">
            <label for="radio-3-0"></label>
         </div>
       </li>
       <li>
         <div class="pdpmb_spec">
           <h3>200g美国牛排八五折</h3>
           <p><span>￥170.0</span>库存：15</p>
         </div>
         <div class="pdpmb_radio">
            <input type="radio" name="RadioGroup3" value="2" id="radio-3-1" class="radiocs">
            <label for="radio-3-1"></label>
         </div>
       </li>
       <li>
         <div class="pdpmb_spec">
           <h3>300g美国牛排八折</h3>
           <p><span>￥240.0</span>库存：15</p>
         </div>
         <div class="pdpmb_radio">
            <input type="radio" name="RadioGroup3" value="3" id="radio-3-2" class="radiocs">
            <label for="radio-3-2"></label>
         </div>
       </li>
       <li>
         <div class="pdpmb_spec">
           <h3>300g美国牛排八折</h3>
           <p><span>￥240.0</span>库存：15</p>
         </div>
         <div class="pdpmb_radio">
            <input type="radio" name="RadioGroup3" value="4" id="radio-3-3" class="radiocs">
            <label for="radio-3-3"></label>
         </div>
       </li>
       <li>
         <div class="pdpmb_spec">
           <h3>300g美国牛排八折</h3>
           <p><span>￥240.0</span>库存：15</p>
         </div>
         <div class="pdpmb_radio">
            <input type="radio" name="RadioGroup3" value="5" id="radio-3-4" class="radiocs">
            <label for="radio-3-4"></label>
         </div>
       </li>
       <li>
         <div class="pdpmb_spec">
           <h3>400g美国牛排七五折（无货测试）</h3>
           <p><span>￥300.0</span>库存：0</p>
         </div>
         <div class="pdpmb_radio">
            <input type="radio" name="RadioGroup3" value="" onClick="return false" id="radio-3-3" class="radiocs">
            <label for="radio-3-3"></label>
         </div>
       </li>
     </form>
     </ul>
     <div class="pdpmb_btn"><a href="javascript:;" class="add_cart"></a></div><!--如果是点击的加入购物车弹开此弹窗 这里需要把A里面文案改成加入购物车-->
  </div>
</article>
<footer>
    <ul class="ab_rightbtn">
      <li class="blackbtn"><a href="<?php echo yii\helpers\Url::to(['site/index']); ?>" class="iconfont icon-shouye">首页</a></li>
      <li class="blackbtn"><a href="javascript:;" class="iconfont icon-kefu">客服</a></li>
      <li class="blackbtn"><a href="javascript:;" class="iconfont icon-yicang">收藏</a></li><!--已收藏的话icon-shoucang改成 icon-yicang-->
      <li class="blackbtn"><a href="<?php echo yii\helpers\Url::to(['cart/index']); ?>" class="iconfont icon-gouwuche">购物车<i></i></a></li>
      <li><a href="javascript:;" class="hfbtn">写评论</a></li>
    </ul>
</footer>
<script src="assets/shop/js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="assets/shop/js/jimiAlert.js"></script>
<script type="text/javascript" src="assets/shop/js/controller.js"></script>
<script>
//设置文字
$(function (){ 
    var aa = $(".pdf_btm > dd,.pdf_btm > dt").innerWidth(); 
    $(".pdf_btm > dd,.pdf_btm > dt").css('height',aa); 
}) 
$(document).ready(function(e) {
  //獲取radi選擇的值
  function get_radio_check()
  {
    var sku_id='';
    $("input[type='radio']").each(function(){if($(this).is(":checked")){sku_id=$(this).val();}});
    if(!sku_id){alert('請選擇商品');return false;}
    return sku_id;
  }
  //添加購物車
	$('.add_cart').click(function(){
        var status=$(this).attr('data-id');
        //加入購物車
        if(status==1)
        {
          var salesUnitId=get_radio_check();
          loaderHelper.show({'text':"購物車添加中...."});
          $.ajax({
                type: 'POST',
                url:"<?php echo \yii\helpers\Url::to(['cart/add-cart']); ?>",
                data:{salesUnitId:salesUnitId},
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
  var le=$('.pdf_btm dd').length;
	if(le<=15)
	{
	  $('.pdf_more').css('display','none');
	}
}); 
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
</script> 
</body>
</html>
