<!doctype html>
<html>
<head>
<meta charset='utf-8' />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<meta name="format-detection" content="telephone=no"/>
<title>选择地址</title>
<link href="assets/shop/css/global.css" rel="stylesheet" type="text/css">
<link href="assets/shop/css/font.css" rel="stylesheet" type="text/css">
<link href="assets/shop/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="assets/shop/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/shop/js/response.js"></script>
</head>
<body>
<header>
</header>
<article class="paddingbtm">
  <div class="r_address as_ul">
  <ul>
     <?php foreach($address_list as $v): ?>
        <li class="r_address_li address" data-id='<?php echo $v['id'] ?>'>
            <a class="ra_text">
            <h5><span><?php echo $v['name']; ?></span><span><?php echo $v['phone']; ?></span></h5>
            <p><?php $address=str_replace("市辖区,","",$v['areaFullName']); echo str_replace(","," ",$address)?><?php echo $v['address']; ?></p>
            <input type='hidden' class='address_content_<?php echo $v['id'] ?>' value='<?php $address=str_replace("市辖区,","",$v['areaFullName']); echo str_replace(","," ",$address)?><?php echo $v['address']; ?>' />
            </a>
        </li>
    <?php endforeach;?>
  </ul>
  </div>
</article>
<script src="assets/shop/js/jquery-2.1.1.js"></script>
<script>
    $('.address').click(function(){
        var id=$(this).attr('data-id');
        var address=$('.address_content_'+id).val();
        var storage = window.localStorage;
        storage.setItem('confirm_order',id+','+address);
        location.href="<?php echo \yii\helpers\Url::to(['order/confirm-order']); ?>";
    })
</script>
<footer>
</footer>
</body>
</html>
