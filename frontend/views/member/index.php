<header class="mc_data" style="background: url(assets/shop/img/mc_bg.png) center top; background-size: 100% auto; height:16rem;">
  <p>
  <span>
  <?php if(isset(Yii::$app->session['member']['headimgurl'])): ?>
      <img src="<?php echo Yii::$app->session['member']['headimgurl']; ?>">
  <?php else: ?>
     <img src="assets/shop/img/avatar.jpg">
  <?php endif; ?>
  </span></p>
  <h2>
  <?php if(isset(Yii::$app->session['member']['headimgurl'])): ?>
      <?php echo Yii::$app->session['member']['nickname']; ?>
  <?php else: ?>
     正善
  <?php endif; ?>
 
  </h2>
 <!--  <p>138****1088</p> -->
  <p><a href="javascript:;">資料</a></p>
</header>
<article class="paddingbtm">
  <ul class="mc_order">
   <li><strong>0</strong><br />待發貨</li>
   <li><strong>0</strong><br />已發貨</li>
   <li><strong>0</strong><br />已完成</li>
  </ul>
  
  <ul class="mc_function">
    <li class="iconfont icon-mjdt"><a href="javascript:;" class="iconfont icon-more">賣家動態</a></li>
    <li class="iconfont icon-wdgz"><a href="javascript:;" class="iconfont icon-more">我的關注</a></li>
    <li class="iconfont icon-wdsc"><a href="<?php echo yii\helpers\Url::to(['collection/product']); ?>" class="iconfont icon-more">我的收藏</a></li>
    <li class="iconfont icon-shdz"><a href="<?php echo \yii\helpers\Url::to(['address/list']); ?>" class="iconfont icon-more">收货地址</a></li>
  </ul>
</article>
