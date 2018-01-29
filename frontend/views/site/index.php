<script type="text/javascript" src="assets/shop/js/touchslide.1.1.js"></script>
<header>
  <ul class="top_tab">
    <li class="ttab_dq"><a href="javascript:;">推薦</a></li>
    <li><a href="<?php echo \yii\helpers\Url::to(['site/hot','recommendType'=>Yii::$app->params['category']['hot']]); ?>">熱門</a></li>
    <li><a href="javascript:;" class="ss_btn">搜索</a></li>
  </ul>
</header>
<article class="paddingbtm">
      <div id="slider" class="sybanner">
     <div id="slider" class="sybanner pcbanner">
        <div class="pagenavi">
          <ul></ul>
        </div>
        <div class="swipe">
          <ul>
              <?php foreach($banner_list as $v): ?>
                 <li><a href="<?php echo \yii\helpers\Url::to(['product/detail','spuId'=>$v['sourceId']]); ?>"><img src="<?php echo $v['cover'] ?>"></a></li>
             <?php endforeach; ?>
          </ul>
        </div>
      </div>
    <script type="text/javascript">
        TouchSlide({ 
          slideCell:"#slider",
          titCell:".pagenavi ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
          mainCell:".swipe ul", 
          effect:"left", 
          autoPlay:true,//自动播放
          autoPage:true, //自动分页
          switchLoad:"_src" //切换加载，真实图片路径为"_src" 
        });
    </script>
  </div>
  <!-- 分类 -->
  <ul class="syclassify">
    <?php foreach($category_list as $v):?>
    <li>
      <a href="<?php echo \yii\helpers\Url::to(['category/index','category_id'=>$v['id']]); ?>">
        <p><img src="<?php echo $v['icon'] ?>"></p>
        <p><?php echo $v['name'] ?></p>
      </a>
    </li>
    <?php endforeach; ?>
    </li>
  </ul>
   <!-- 产品 -->
  <ul class="sypro_lb">
    <?php if(isset($recommend_list)): ?>
      <?php foreach($recommend_list as $v): ?>
      <li>
         <div class="splb_top"><a href="<?php echo \yii\helpers\Url::to(['product/detail','spuId'=>$v['sourceId']]); ?>">
          <p><img src=<?php echo $v['cover'] ?>></p>
          <p><?php echo $v['title'] ?></p>
        </a></div>
        <div class="splb_btm">
         <a href="<?php echo yii\helpers\Url::to(['shop/index']); ?>" class="splb_yh">
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
</script>