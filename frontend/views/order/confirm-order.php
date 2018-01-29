<!doctype html>
<html>
<head>
<meta charset='utf-8' />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<meta name="format-detection" content="telephone=no"/>
<title>金额确认</title>
<link href="assets/shop/css/global.css" rel="stylesheet" type="text/css">
<link href="assets/shop/css/font.css" rel="stylesheet" type="text/css">
<link href="assets/shop/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="assets/shop/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/shop/js/response.js"></script>
</head>
<body>
<script>
    //支付
    function pay_(id)
    {
        var address_id=$('.icon-more').attr('data-id');
        if(!address_id){alert('请先去填写地址！');location.href="<?php echo \yii\helpers\Url::to(['address/address-selection']); ?>";}
        $.ajax({
            type:"get",
            url:"<?php echo \yii\helpers\Url::to(['pay/index']); ?>",//这是访问的地址
            datatype:"json",
            data:{},
            success: function(data)
            {
                if(data!='')
                {
                    $("#js_").html(data);
                    callpay();
                }
            }
        })
    }
</script>
<div id="js_">
</div>
<header>
</header>
<article class="paddingbtm confirm">
    <ul class="ac_ul">
      <li><span>订单金额：</span><small><strong>￥<?php echo $order_list['price'] ?></strong></small></li>
      <li class='select_address'><span>配送地址：</span><small><a href="<?php echo \yii\helpers\Url::to(['address/address-selection']); ?>" 
      class="iconfont icon-more"
      data-id=<?php if(isset($_SESSION['order_address'])&&$_SESSION['order_address']['address_id']): ?>
      <?php echo $_SESSION['order_address']['address_id']; ?>
      <?php endif; ?>>
      <?php if(isset($_SESSION['order_address'])&&$_SESSION['order_address']['address']): ?>
        <?php echo $_SESSION['order_address']['address']; ?>
        <?php else: ?>
        请选择地址
      <?php endif; ?>
     
    </a></small></li>
    </ul>
</article>
<footer>
  <ul class="ab_rightbtn">
    <li><a  onclick="pay_();" href="javascript:;">确认支付</a></li>
  </ul>
</footer>
<script src="assets/shop/js/jquery-2.1.1.js"></script>
</body>
</html>
