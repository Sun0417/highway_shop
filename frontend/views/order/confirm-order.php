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
      <li class='select_address'><span>配送地址：</span><small><a href="javascript:;" class="iconfont icon-more">请选择地址</a></small></li>
    </ul>
</article>
<article class="paddingbtm addresss" style='display:none;'>
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
<footer>
  <ul class="ab_rightbtn">
    <li><a  onclick="pay_();" href="javascript:;">确认支付</a></li>
  </ul>
</footer>
<script src="assets/shop/js/jquery-2.1.1.js"></script>
<script>
    $('.select_address').click(function(){
        $(document).attr("title","地址选择");
        var id=$('.address').attr('data-id');
        if(!id){alert('请先去填写地址！');location.href="<?php echo \yii\helpers\Url::to(['address/add']); ?>";}
        $('.confirm').css('display','none');
        $('.addresss').css('display','block');
    })
    $('.address').click(function(){
        $(document).attr("title","金额确认");
        var id=$(this).attr('data-id');
        var address=$('.address_content_'+id).val();
        $('.icon-more').html(address);
        $('.icon-more').attr('data-id',id);
        $('.confirm').css('display','block');
        $('.addresss').css('display','none');
    })
</script>
</body>
</html>
