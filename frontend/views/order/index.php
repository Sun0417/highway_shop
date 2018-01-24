<!doctype html>
<html>
<head>
<meta charset='utf-8' />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<meta name="format-detection" content="telephone=no"/>
<title>订单确认</title>
<link href="assets/shop/css/global.css" rel="stylesheet" type="text/css">
<link href="assets/shop/css/font.css" rel="stylesheet" type="text/css">
<link href="assets/shop/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="assets/shop/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/shop/js/response.js"></script>
</head>
<body>
<header>
</header>
<form action='<?php echo \yii\helpers\Url::to(['order/confirm-order']); ?>' method='post'>
  <article class="paddingbtm">
  <?php if($order_list['isEffective']&&isset($order_list['childOrder'])): ?> 
      <?php foreach($order_list['childOrder'] as $vt): ?>
            <dl class="coodl">
              <dt><?php echo $vt['title']; ?></dt>
              <?php if($vt['isEffective']): ?> 
              <?php foreach($vt['salesUnits'] as $key=>$vt_sku): ?>
              <dd class="coo_pro">
                <h4><span><?php echo $vt_sku['title'];?></span><small>￥<?php echo $vt_sku['price']; ?> x <?php echo $vt_sku['buyCount']; ?></small></h4>
                <p><?php echo $vt_sku['viceTitle']; ?></p>
              </dd>
              <dd><span>运费：</span><small>￥<?php echo $vt['freight']; ?></small></dd>
              
              <?php  endforeach;?>    
              <?php endif;?>
            </dl>
      <?php  endforeach;?>
    <dl class="coodl"> 
      <dd><span>备注：</span><small><input type="text" name="<?php echo $vt['index']; ?>" placeholder="如果您有什么特殊的要求，请在此备注"></small></dd> 
      <dd><span>总价：</span><small><strong>￥<?php echo $order_list['price']; ?></strong></small></dd>
    </dl>
  <?php endif;?>
  </article>
<footer>
  <ul class="ab_rightbtn">
    <li><button >下一步</button></li>
  </ul>
</footer>
</form>
</body>
</html>
