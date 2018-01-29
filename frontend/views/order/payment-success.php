<!doctype html>
<html>
<head>
    <meta charset='utf-8' />
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta name="format-detection" content="telephone=no"/>
    <title>付款成功</title>
    <link href="assets/shop/css/global.css" rel="stylesheet" type="text/css">
    <link href="assets/shop/css/font.css" rel="stylesheet" type="text/css">
    <link href="assets/shop/css/style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="assets/shop/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/shop/js/response.js"></script>
    <script language="JavaScript">
        $(document).ready(function() {
            if (window.history && window.history.pushState) {
                $(window).on('popstate', function () {
                    window.history.pushState('forward', null, '#');
                    window.history.forward(1);
                });
            }
            window.history.pushState('forward', null, '#'); //在IE中必须得有这两行
            window.history.forward(1);
        })
    </script>
</head>

<body>

<header>
</header>

<article>
    <div class="ps_img"><img src="assets/shop/img/zfcg_banner.png"></div>
    <ul class="ps_ul">
<!--        <li><span>收货地址:</span><small>刘克金 18711254566上海上海市金赢108创意广场品座 纳什空间6楼619室</small></li>-->
<!--        <li><span>总额:</span><small><strong>￥385.0</strong></small></li>-->
        <li><a href="<?php echo \yii\helpers\Url::to(['order/order-list']) ?>">查看订单</a></li>
        <li><a href="<?php echo \yii\helpers\Url::to(['site/index']) ?>">返回首页</a></li>
    </ul>
</article>

<footer>
</footer>

</body>
</html>
