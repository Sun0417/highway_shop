<header>
  <ul class="top_tab">
    <li ><a href="<?php echo \yii\helpers\Url::to(['site/index','recommendType'=>2]); ?>">推薦</a></li>
    <li class="ttab_dq"><a href="<?php echo \yii\helpers\Url::to(['site/hot','recommendType'=>3]); ?>">熱門</a></li>
    <li><a href="javascript:;" class="ss_btn">搜索</a></li>
  </ul>
</header>

<article class="paddingbtm">
   <!-- 产品 -->
  <ul class="sypro_lb">
    <?php if(isset($recommend_list)): ?>
      <?php foreach($recommend_list as $v): ?>
      <li>
         <div class="splb_top"><a href="<?php echo \yii\helpers\Url::to(['product/detail','spuId'=>$v['recommendedUnitType']]); ?>">
          <p><img src=<?php echo $v['cover'] ?>></p>
          <p><?php echo $v['title'] ?></p>
        </a></div>
        <div class="splb_btm">
         <a href="javascript:;" class="splb_yh">
             <small>
             <?php if($v['shop']['avatar']): ?>
                 <img src="<?php echo $v['shop']['avatar'] ?>">
              <?php else:?>
                 <img src="assets/shop/img/avatar.jpg">
              <?php endif; ?>
             </small>
         <span><?php echo $v['shop']['name'] ?></span></a>
         <a href="javascript:;" class="splb_bq">
         <?php $tags=''; ?>
         <?php foreach($v['tags'] as $t): ?>
              <?php $tags.='#'.$t['tag'];?>
         <?php endforeach; ?> 
         <?php echo $tags; ?>
         </a>
        </div>
      </li>
       <?php endforeach; ?>
     <?php endif; ?> 
  </ul>
  <div class="popup_mask" style="display:none;"></div>
  <!--搜索功能-->
  <div class="ss_search">
   <div class="sss_nr" >
    <small><input type="text" name="tname" placeholder="请输入您要搜索的关键词"></small>
    <span><button class="ss_gbbtn">搜索</button></span>
   </div>
  </div>
</article>
<script src="assets/shop/js/jquery-2.1.1.js"></script>
<script>
$(function(){
    var h=$('.ss_search').outerHeight();
    var w=$('.ss_search').outerWidth();
      $('.ss_btn').click(function(){
    $('.popup_mask').fadeIn(200);
    $('.ss_search').css({'opacity':0,top:'-30%',left:'0',display:'block'}).animate({top:'0','opacity':1},240);
    })
    $('.popup_mask,.ss_gbbtn').click(function(){
    $('.popup_mask').fadeOut(200);
    $('.ss_search').animate({top:'-30%','opacity':0},240,'swing',function(){$('.ss_search').hide()});
    })
})
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
