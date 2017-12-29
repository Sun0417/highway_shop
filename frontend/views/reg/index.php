<!doctype html>
<html>
<head>
<meta charset='utf-8' />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<meta name="format-detection" content="telephone=no"/>
<title>正善商城-賬號綁定</title>
<link href="assets/shop/css/global.css" rel="stylesheet" type="text/css">
<link href="assets/shop/css/font.css" rel="stylesheet" type="text/css">
<link href="assets/shop/css/style.css" rel="stylesheet" type="text/css">
<link href="assets/shop/css/loadSimple.css" rel="stylesheet" type="text/css">
</head>
<body class="ab_bg">
<header></header>
<article class="ab_nr">
 <div class="ab_top"><img src="assets/shop/img/dl_img01.png" ></div>
 <ul class="ab_btm">
   <li class="iconfont icon-sjh"><input type="number" name="" placeholder='請在這裏輸入手機號' class="phone"></li>
   <li  class="iconfont icon-yzm"><input type="number" name="" placeholder='請在這裏輸入驗證碼' class="checkcode"><a href="javascript:;" class='send'>發送驗證碼</a><a style="display: none;" id="time">60秒</a></li>
   <li><button class="submit" type="button">綁 定</button></li>
 </ul>
</article>
<footer></footer>
<script src="assets/shop/js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="assets/shop/js/jimiAlert.js"></script>
<script type="text/javascript" src="assets/shop/js/response.js"></script>
<script type="text/javascript" src="assets/shop/js/controller.js"></script>
<script type="text/javascript">
$(function(){
    //提交
    $('.submit').click(function(){
         var phone=$('.phone').val();
         var identifyingCode=$('.checkcode').val();
         if(!identifyingCode){alert('手機號/驗證碼不能空');return false;}
         var that=$(this);
         if(!phone){alert('請填寫手機號碼');return false;}
         loaderHelper.show({'text':"註冊中...."});
         $.ajax({
                type: 'POST',
                url:"<?php echo yii\helpers\Url::to(['reg/check-code']);?>",
                data: {identifyingCode:identifyingCode},
                success: function(data){
                    loaderHelper.hide();
                    if(typeof data=='string')data=JSON.parse(data);
                    if(data.error!=0){alert(data.message);return false;}
                    location.href="<?php echo yii\helpers\Url::to(['site/index']);?>";
                },
                error:function(res){
                    loaderHelper.hide();
                    alert("網絡異常,請重試!");
                    return false;
                }
            })
        })
    //发送验证码
    $('.send').click(function(){
         var phone=$('.phone').val();
         var time=parseInt($("#time").text());
         var that=$(this);
         if(!phone){alert('請填寫手機號');return false;}
         if (!phone.match(/^(((13[0-9]{1})|(15[0-9]{1})||(17[0-9]{1})||(18[0-9]{1})||190)+\d{8})$/))
         {
            alert('手機號格式不正確');return false;
         }
         var checkcode=$('.checkcode').val();
         loaderHelper.show({'text':"驗證碼發送中...."});
         $.ajax({
                type: 'POST',
                url:"<?php echo yii\helpers\Url::to(['reg/send-code']);?>",
                data: {phone:phone},
                success: function(data){
                    loaderHelper.hide();
                    if(typeof data=='string')data=JSON.parse(data);
                    if(data.error!=0){alert(data.message);return false;}
                    that.css('display','none');
                    $("#time").css('display','block');
                    setTime=setInterval(function(){
                        if(time<=0){
                            clearInterval(setTime);
                            that.css('display','block');
                            $("#time").css('display','none');
                            that.text('重新發送驗證碼');
                            $("#time").text(60);
                            return;
                        }
                        time--;
                        $("#time").text(time+'秒');
                    },1000);
                },
                error:function(res){
                     loaderHelper.hide();
                     alert("網絡異常,請重試!");
                     return false;
                }
            })
        })
})
</script>
</body>
</html>
