<!doctype html>
<html>
<head>
<meta charset='utf-8' />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<meta name="format-detection" content="telephone=no"/>
<title>正善商城-地址管理</title>
<link href="assets/shop/css/global.css" rel="stylesheet" type="text/css">
<link href="assets/shop/css/font.css" rel="stylesheet" type="text/css">
<link href="assets/shop/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="assets/shop/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/shop/js/response.js"></script> 
<link href="assets/shop/css/loadSimple.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
$(document).ready(function(e) {
    // 设定每一行的宽度=屏幕宽度+按钮宽度
    $(".ra_rolllayer").width($(".r_address_li").width() + 2 + $(".rapro_delete").width());
    // 设定常规信息区域宽度=屏幕宽度
    $(".rarol_lt").width($(".r_address_li").width());
    // 获取所有行，对每一行设置监听
    var lines = $(".rarol_lt");
    var len = lines.length; 
    var lastX, lastXForMobile;
    // 用于记录被按下的对象
    var pressedObj;  // 当前左滑的对象
    var lastLeftObj; // 上一个左滑的对象
    // 用于记录按下的点
    var start;
    // 网页在移动端运行时的监听
    for (var i = 0; i < len; ++i) {
        lines[i].addEventListener('touchstart', function(e){
            lastXForMobile = e.changedTouches[0].pageX;
            pressedObj = this; // 记录被按下的对象 

            // 记录开始按下时的点
            var touches = event.touches[0];
            start = { 
                x: touches.pageX, // 横坐标
                y: touches.pageY  // 纵坐标
            };
        });

        lines[i].addEventListener('touchmove',function(e){
            // 计算划动过程中x和y的变化量
            var touches = event.touches[0];
            delta = {
                x: touches.pageX - start.x,
                y: touches.pageY - start.y
            };

            // 横向位移大于纵向位移，阻止纵向滚动
            if (Math.abs(delta.x) > Math.abs(delta.y)) {
                event.preventDefault();
            }
        });

        lines[i].addEventListener('touchend', function(e){
            if (lastLeftObj && pressedObj != lastLeftObj) { // 点击除当前左滑对象之外的任意其他位置
                $(lastLeftObj).animate({marginLeft:"0"}, 200); // 右滑
                lastLeftObj = null; // 清空上一个左滑的对象
            }
            var diffX = e.changedTouches[0].pageX - lastXForMobile;
            if (diffX < -40) {
                $(pressedObj).animate({marginLeft:"-5rem"}, 200); // 左滑
                lastLeftObj && lastLeftObj != pressedObj && 
                    $(lastLeftObj).animate({marginLeft:"0"}, 200); // 已经左滑状态的按钮右滑
                lastLeftObj = pressedObj; // 记录上一个左滑的对象
            } else if (diffX > 40) {
              if (pressedObj == lastLeftObj) {
                $(pressedObj).animate({marginLeft:"0"}, 200); // 右滑
                lastLeftObj = null; // 清空上一个左滑的对象
              }
            }
        });
    }
    // 网页在PC浏览器中运行时的监听
    for (var i = 0; i < len; ++i) {
        $(lines[i]).bind('mousedown', function(e){
            lastX = e.clientX;
            pressedObj = this; // 记录被按下的对象
        });

        $(lines[i]).bind('mouseup', function(e){
            if (lastLeftObj && pressedObj != lastLeftObj) { // 点击除当前左滑对象之外的任意其他位置
                $(lastLeftObj).animate({marginLeft:"0"}, 200); // 右滑
                lastLeftObj = null; // 清空上一个左滑的对象
            }
            var diffX = e.clientX - lastX;
            if (diffX < -40) {
                $(pressedObj).animate({marginLeft:"-5rem"}, 200); // 左滑
                lastLeftObj && lastLeftObj != pressedObj && 
                    $(lastLeftObj).animate({marginLeft:"0"}, 200); // 已经左滑状态的按钮右滑
                lastLeftObj = pressedObj; // 记录上一个左滑的对象
            } else if (diffX > 40) {
              if (pressedObj == lastLeftObj) {
                $(pressedObj).animate({marginLeft:"0"}, 200); // 右滑
                lastLeftObj = null; // 清空上一个左滑的对象
              }
            }
        });
    }
});
</script>
</head>
<body>
<link rel="stylesheet" type="text/css" href="assets/shop/css/loader.min.css">
<script type="text/javascript">         
    // 等待所有加载
    $(window).load(function(){
        $('body').addClass('loaded');
        $('#loader-wrapper .load_title').remove();
    }); 
</script>    
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
    <div class="load_title">正在加载....<br><span>正善</span></div>
</div>
<header>
</header>
<article class="paddingbtm">
  <div class="r_address">
  <form name="form1" method="post" action="">
    <?php if($address_list): ?>
      <?php foreach($address_list as $key=>$v): ?>
      <ul class='address_<?php echo $v['id'];?>'>
          <li class="r_address_li ">
            <div class="ra_rolllayer">
               <div class="rarol_lt">
                 <div class="ra_text">
                   <h5><span><?php echo $v['name'] ?></span><span><?php echo $v['phone']; ?></span></h5>
                   <p><?php $address=str_replace("市辖区,","",$v['areaFullName']); echo str_replace(","," ",$address)?><?php echo $v['address'] ?></p>
                 </div>
                 <div class="ra_radio">
                  <input type="radio" name="RadioGroup1"  id="radio-1-<?php echo  $v['id']; ?>" value='<?php echo  $v['id']; ?>' class="radiocs">
                  <label for="radio-1-<?php echo  $v['id']; ?>"></label>
                 </div>
                 <div class="rapro_delete" data-id="<?php echo $v['id'] ?>"></div>
                </div>
            </div>
          </li>
      </ul>
      <?php endforeach; ?>
     <?php else:?>
     <div class="no_data">
        <p><span class="iconfont icon-wushuju"></span></p>
        <p>请填写收货地址</p>
    </div>    
     <?php endif; ?>
  </form>
  </div>
</article>
<footer>
  <ul class="ab_rightbtn">
    <!--<li class="blackbtn"><a href="javascript:;" class="iconfont icon-moren">默認</a></li>-->
    <li class="blackbtn"><a href="javascript:;" class="iconfont icon-bianji edit">編輯</a></li>
    <li class="blackbtn"><a href="javascript:;" class="iconfont icon-shanchu del">删除</a></li>
    <li><a href="<?php echo \yii\helpers\Url::to(['address/add']); ?>">新增地址</a></li>
  </ul>
</footer>
<script src="assets/shop/js/jquery-2.1.1.js"></script>
<script type="text/javascript" src="assets/shop/js/jimiAlert.js"></script>
<script type="text/javascript" src="assets/shop/js/controller.js"></script>
<script>
$(function(){
        //獲取radi選擇的值
       function get_radio_check()
       {
          var address_id='';
          $("input[type='radio']").each(function(){if($(this).is(":checked")){address_id=$(this).val();}});
          if(!address_id){alert('請選擇地址');return false;}
          return address_id;
       }
      //侧滑删除地址
      $('.rapro_delete').click(function(){
          var address_id=$(this).attr('data-id');
           loaderHelper.show({'text':"收货地址删除中...."});
           $.ajax({
                type: 'POST',
                url:"<?php echo yii\helpers\Url::to(['address/del-address']);?>",
                data: {address_id:address_id},
                success: function(data){
                    loaderHelper.hide();
                    if(typeof data=='string')data=JSON.parse(data);
                    if(data.error!=0){alert(data.message);return false;}
                     $('.address_'+address_id).remove();
                },
                error:function(res){
                    loaderHelper.hide();
                    alert("網絡異常,請重試!");
                    return false;
                }
            })
        })
        //选中删除
      $('.del').click(function(){
            //獲取選擇的值
            address_id=get_radio_check();
            $('.address_'+address_id).remove();return false;
            loaderHelper.show({'text':"收货地址删除中...."});
            $.ajax({
                type: 'POST',
                url:"<?php echo yii\helpers\Url::to(['address/del-address']);?>",
                data: {address_id:address_id},
                success: function(data){
                    loaderHelper.hide();
                    if(typeof data=='string')data=JSON.parse(data);
                    if(data.error!=0){alert(data.message);return false;}
                     $('.address_'+address_id).remove();
                },
                error:function(res){
                    loaderHelper.hide();
                    alert("網絡異常,請重試!");
                    return false;
                }
            })
        })
      //編輯跳轉
      $('.edit').click(function(){
          //遍歷所有的radio，獲取選擇的值
           address_id=get_radio_check();
          //跳轉編輯頁面
          $location_url='<?php echo yii\helpers\Url::to(['address/del-address']);?>'+'&address_id='+address_id;
          location.href= $location_url;
      })
})
</script>
</body>
</html>
