<!doctype html>
<html>
<head>
<meta charset='utf-8' />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<meta name="format-detection" content="telephone=no"/>
<title>正善商城-日食</title>
<link href="assets/shop/css/global.css" rel="stylesheet" type="text/css">
<link href="assets/shop/css/font.css" rel="stylesheet" type="text/css">
<link href="assets/shop/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="assets/shop/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/shop/js/response.js"></script>
<script type="text/javascript" src="assets/shop/js/touchslider.js"></script>
<script type="text/javascript" src="assets/shop/js/tab.js"></script>
</head>
<body>
<header>
</header>
<article>
  <div class="sybanner pcbanner">
     <div class="swipe">
     <ul id="slider4" style="position: relative; transition: none; width: 7612px; left: -3806px;">
      <li><a href="javascript:;"><img src="assets/shop/img/lbbanner_img_01.png"></a></li>
      <li><a href="javascript:;"><img src="assets/shop/img/lbbanner_img_01.png"></a></li>
     </ul>
    </div>
    <div id="pagenavi">
	  <a href="javascript:;" class="active">1</a>
	  <a href="javascript:;" class="">2</a>
    </div>
    <div class="pc_btwz">日食：壹日三餐主菜精選食材專場</div>
  </div>
  
  <div class="clist_tab">
   <div class="clist_tab_bt find_nav">
    <div class="ctabbt_left find_nav_left">
      <div class="ctabbt_list find_nav_list">
        <ul>
          <li id="clisttab1" onclick="setTab('clisttab',1,5)" class="hover"><a href="javascript:;">美国牛肉</a></li>
          <li id="clisttab2" onclick="setTab('clisttab',2,5)" ><a href="javascript:;">澳洲水产</a></li>
          <li id="clisttab3" onclick="setTab('clisttab',3,5)" ><a href="javascript:;">精选羊肉</a></li>
          <li id="clisttab4" onclick="setTab('clisttab',4,5)" ><a href="javascript:;">本土肉类</a></li>
          <li id="clisttab5" onclick="setTab('clisttab',5,5)" ><a href="javascript:;">日式料理</a></li>
          <li class="sideline"></li>
        </ul>
      </div>
    </div>
    </div>
    <div class="clist_tab_nr"> 
        <div id="con_clisttab_1">
          <ul>
            <li>
             <a href="<?php echo \yii\helpers\Url::to(['product/detail','spuId'=>1]); ?>">
               <p><small style="background:url(assets/shop/img/proimg_02.png) center 0 no-repeat;"></small></p>
               <h3>美國自然牛USDAPRIME極佳級，厚切西冷牛配送...</h3>
             </a>
            </li>
            <li>
             <a href="<?php echo \yii\helpers\Url::to(['product/detail','spuId'=>2]); ?>">
               <p><small style="background:url(assets/shop/img/proimg_03.png) center 0 no-repeat;"></small></p>
               <h3>首長貝柱1盒(2斤 /盒)，原料出口日本歐美等國...</h3>
             </a>
            </li>
            <li>
             <a href="<?php echo \yii\helpers\Url::to(['product/detail','spuId'=>3]); ?>">
               <p><small style="background:url(assets/shop/img/proimg_01.png) center 0 no-repeat;"></small></p>
               <h3>首長貝柱1盒(2斤 /盒)，原料出口日本歐美等國...</h3>
             </a>
            </li>
            <li>
             <a href="<?php echo \yii\helpers\Url::to(['product/detail','spuId'=>4]); ?>">
               <p><small style="background:url(assets/shop/img/proimg_02.png) center 0 no-repeat;"></small></p>
               <h3>首長貝柱1盒(2斤 /盒)，原料出口日本歐美等國...</h3>
             </a>
            </li>
            <li>
             <a href="<?php echo \yii\helpers\Url::to(['product/detail','spuId'=>5]); ?>">
               <p><small style="background:url(assets/shop/img/proimg_03.png) center 0 no-repeat;"></small></p>
               <h3>首長貝柱1盒(2斤 /盒)，原料出口日本歐美等國...</h3>
             </a>
            </li>
            <li>
             <a href="<?php echo \yii\helpers\Url::to(['product/detail','spuId'=>6]); ?>">
               <p><small style="background:url(assets/shop/img/proimg_01.png) center 0 no-repeat;"></small></p>
               <h3>美國自然牛USDAPRIME極佳級，厚排,全國配送...</h3>
             </a>
            </li>
          </ul>
      </div>
        <div id="con_clisttab_2" style="display:none">
          <ul>
            <li>
             <a href="javascript:;">
               <p><small style="background:url(assets/shop/img/proimg_02.png) center 0 no-repeat;"></small></p>
               <h3>2美國自然牛USDAPRIME極佳級，厚切西冷牛配送...</h3>
             </a>
            </li>
          </ul>
        </div>
        <div id="con_clisttab_3" style="display:none">
          <ul>
            <li>
             <a href="javascript:;">
               <p><small style="background:url(assets/shop/img/proimg_01.png) center 0 no-repeat;"></small></p>
               <h3>3美國自然牛USDAPRIME極佳級，厚切西冷牛配送...</h3>
             </a>
            </li>
          </ul>
        </div>
        <div id="con_clisttab_4" style="display:none">
         <ul>
            <li>
             <a href="javascript:;">
               <p><small style="background:url(assets/shop/img/proimg_03.png) center 0 no-repeat;"></small></p>
               <h3>4美國自然牛USDAPRIME極佳級，厚切西冷牛配送...</h3>
             </a>
            </li>
          </ul>
        </div>
        <div id="con_clisttab_5" style="display:none">
          <ul>
            <li>
             <a href="javascript:;">
               <p><small style="background:url(assets/shop/img/proimg_02.png) center 0 no-repeat;"></small></p>
               <h3>5美國自然牛USDAPRIME極佳級，厚切西冷牛配送...</h3>
             </a>
            </li>
          </ul>
        </div>
      </div> 
   </div>
</article>

<footer>
  
</footer>
<script type="text/javascript">
console=window.console || {dir:new Function(),log:new Function()};
var active=0,
	as=document.getElementById('pagenavi').getElementsByTagName('a');
for(var i=0;i<as.length;i++){
	(function(){
		var j=i;
		as[i].onclick=function(){
			t4.slide(j);
			return false;
		}
	})();
}
var t4=new TouchSlider('slider4',{speed:1000, direction:0, interval:6000, fullsize:true});
t4.on('before',function(m,n){
    as[m].className='';
	as[n].className='active';
})

var control = navigator.control || {};
    if (control.gesture) {
        control.gesture(false);
    }
</script>
<script type="text/javascript">
$(".ctabbt_list").css("left",0);
$(".ctabbt_list li").each(function(){
$(".ctabbt_list li").eq(0).addClass("find_nav_cur").siblings().removeClass("find_nav_cur");
});
var nav_w=$(".ctabbt_list li").first().width();
$(".sideline").width(nav_w);
$(".ctabbt_list li").on('click', function(){
	nav_w=$(this).width();
	$(".sideline").stop(true);
	$(".sideline").animate({left:$(this).position().left},300);
	$(".sideline").animate({width:nav_w});
	$(this).addClass("find_nav_cur").siblings().removeClass("find_nav_cur");
	var fn_w = ($(".clist_tab_bt").width() - nav_w) / 2;
	var fnl_l;
	var fnl_x = parseInt($(this).position().left);
	if (fnl_x <= fn_w) {
		fnl_l = 0;
	} else if (fn_w - fnl_x <= flb_w - fl_w) {
		fnl_l = flb_w - fl_w;
	} else {
		fnl_l = fn_w - fnl_x;
	}
	$(".ctabbt_list").animate({
		"left" : fnl_l
	}, 300);
	
});
var fl_w=$(".ctabbt_list").width();
var flb_w=$(".ctabbt_left").width();
$(".ctabbt_list").on('touchstart', function (e) {
	var touch1 = e.originalEvent.targetTouches[0];
	x1 = touch1.pageX;
	y1 = touch1.pageY;
	ty_left = parseInt($(this).css("left"));
});
$(".ctabbt_list").on('touchmove', function (e) {
	var touch2 = e.originalEvent.targetTouches[0];
	var x2 = touch2.pageX;
	var y2 = touch2.pageY;
	if(ty_left + x2 - x1>=0){
		$(this).css("left", 0);
	}else if(ty_left + x2 - x1<=flb_w-fl_w){
		$(this).css("left", flb_w-fl_w);
	}else{
		$(this).css("left", ty_left + x2 - x1);
	}
	if(Math.abs(y2-y1)>0){
		e.preventDefault();
	}
});
</script>
</body>
</html>
