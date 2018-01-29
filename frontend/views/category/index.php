<!doctype html>
<html>
<head>
<meta charset='utf-8' />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<meta name="format-detection" content="telephone=no"/>
<title>分类列表</title>
<link href="assets/shop/css/global.css" rel="stylesheet" type="text/css">
<link href="assets/shop/css/font.css" rel="stylesheet" type="text/css">
<link href="assets/shop/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="assets/shop/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/shop/js/response.js"></script>
<script type="text/javascript" src="assets/shop/js/touchslide.1.1.js"></script>
<link href="assets/shop/css/dropload.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="assets/shop/js/tab.js"></script>
</head>
<body>
<header>
</header>
<article>
  <div class="sybanner pcbanner">
    <div id="slider" class="sybanner pcbanner">
				<div class="pagenavi">
					<ul></ul>
				</div>
				<div class="swipe">
					<ul>
              <?php if(isset($category_banner)&&$category_banner): ?>
                  <?php foreach($category_banner as $v): ?>
                   <li><a href="<?php echo \yii\helpers\Url::to(['product/detail','spuId'=>$v['sourceId']]); ?>"><img src="<?php echo $v['cover']; ?>"></a></li>
                  <?php endforeach; ?>
              <?php endif; ?>
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
    <!-- <div class="pc_btwz">日食：壹日三餐主菜精選食材專場</div> -->
  </div>
  <div class="clist_tab">
   <div class="clist_tab_bt find_nav">
    <div class="ctabbt_left find_nav_left">
      <div class="ctabbt_list find_nav_list">
        <ul>
          <?php if(isset($category_child)&&$category_child): ?>
            <?php  foreach($category_child as $key=>$v): ?>
                <li id="clisttab1" 
                <?php if($key==0):?>class="hover"<?php endif; ?> 
                onclick="setTab('clisttab',<?php echo $ks=$key+1; ?>,<?php echo count($category_child) ?>)" >
                <a href="<?php echo  \yii\helpers\Url::to(['category/index','category_id'=>$_GET['category_id'],'cate_id'=>$v['id'],'key'=>$ks]) ?>" class='list_p'  data-id='<?php echo $v['id']; ?>' data-val=<?php echo $ks; ?>><?php echo $v['name']; ?></a></li>
            <?php endforeach; ?>
         <?php endif; ?>
          <li class="sideline"></li>
        </ul>
      </div>
    </div>
    </div>
    <div class="content clist_tab_nr"> 
        <div id="con_clisttab_<?php echo $cate=isset($_GET['key'])?$_GET['key']:1; ?>" class=' test'>
          <ul class='lists'>
          </ul>
        </div>
      </div> 
   </div>
</article>
<script type="text/javascript" src="assets/shop/js/dropload.min.js"></script>
<script>
$(function(){
    var paging = 1;//页码数
    var category_id=<?php echo $cate=isset($_GET['cate_id'])?$_GET['cate_id']:$category_child[0]['id']; ?>;
    // dropload函数接口设置
    $('.content').dropload({
        scrollArea : window,
        // 下拉刷新模块显示内容
        domUp : {
            domClass   : 'dropload-up',
            // 下拉过程显示内容
            domRefresh : '<div class="dropload-refresh">↓下拉过程显示内容-下拉刷新</div>',
            // 下拉到一定程度显示提示内容
            domUpdate  : '<div class="dropload-update">↑释放更新</div>',
            // 释放后显示内容
            domLoad    : '<div class="dropload-load"><span class="loading"></span>疯狂加载中...</div>'
        },
        domDown : {
            domClass   : 'dropload-down',
            // 滑动到底部显示内容
            domRefresh : '<div class="dropload-refresh">↑上拉加载更多</div>',
            // 内容加载过程中显示内容
            domLoad    : '<div class="dropload-load"><span class="loading"></span>疯狂加载中...</div>',
            // 没有更多内容-显示提示
            domNoData  : '<div class="dropload-noData">没有更多内容</div>'
        },
        // 1 . 下拉刷新 回调函数
        loadUpFn : function(me){
            $.ajax({
                type: 'GET',
                // 每次获取最新的数据即可
                url: '<?php echo \yii\helpers\Url::to(['category/list','paging'=>1]) ?>'+'&category_id='+ category_id,
                dataType: 'json',
                success: function(data){
                    // $.ajax()虽然接口提供json字符串，但接收到的是 json对象
                    // alert(typeof(data));
                    var result = '';
                    // 循环拼接显示内容 DOM
                    // 刷新获取多少数据，显示多少 使用html()重置 lists DOM
                    for(var i = 0; i <data.data.products.length; i++){
                      result +='<li>';
                      result +='<a href="/highway_shop/frontend/web/index.php?r=product/detail&spuId='+data.data.products[i]['sourceId']+'">';
                      result +='<p><small style="background:url('+data.data.products[i]['cover']+') center 0 no-repeat;"></small></p>';
                      result +='<h3>'+data.data.products[i]['title']+'</h3>';
                      result +=' </a></li>';
                  }
                    // 为了测试，延迟1秒加载
                    setTimeout(function(){
                        // 插入加载使用 html() 重置 DOM
                        $('.lists').html(result);
                        // 每次数据加载完，必须重置
                        me.resetload();
                    },1000);
                },
                // 加载出错
                error: function(xhr, type){
                    //alert('Ajax error!');
                    // 即使加载出错，也得重置
                   // me.resetload();
                }
            });
        },
        // 2 . 上拉加载更多 回调函数
        loadDownFn : function(me){
          
            paging++; // 每次请求，页码加1
            $.ajax({
                type: 'GET',
                url: '<?php echo \yii\helpers\Url::to(['category/list']) ?>'+'&paging='+paging+'&category_id='+category_id,
                dataType: 'json',
                success: function(data){
                    // data = JSON.parse(data);
                    var result = '';
                    // 选择需要显示的数据 拼接 DOM
                    if(data.data.products.length==0){
                          // 再往下已经没有数据
                          // 锁定
                          me.lock();
                          // 显示无数据
                          me.noData();
                    }
                    for(var i = 0; i < data.data.products.length; i++){
                        result +='<li>';
                        result +='<a href="/highway_shop/frontend/web/index.php?r=product/detail&spuId='+data.data.products[i]['sourceId']+'">';
                        result +='<p><small style="background:url('+data.data.products[i]['cover']+') center 0 no-repeat;"></small></p>';
                        result +='<h3>'+data.data.products[i]['title']+'</h3>';
                        result +=' </a></li>';
                        if(data.data.products.length<15){
                            // 再往下已经没有数据
                            // 锁定
                            me.lock();
                            // 显示无数据
                            me.noData();
                            break;
                        }
                    }
                    // 为了测试，延迟1秒加载
                    setTimeout(function(){
                        // 加载 插入到原有 DOM 之后
                        $('.lists').append(result);
                        // 每次数据加载完，必须重置
                        me.resetload();
                    },1000);
                },
                // 加载出错
                error: function(xhr, type){
                    alert('Ajax error!');
                    // 即使加载出错，也得重置
                    me.resetload();
                }
            });
        },
        threshold : 50 // 什么作用???
    });
});
</script>
<footer>
</footer>

<script type="text/javascript">
  $(".ctabbt_list").css("left",0);
  $(".ctabbt_list li").each(function(){
  $(".ctabbt_list li").eq(0).addClass("find_nav_cur").siblings().removeClass("find_nav_cur");
  });
  var nav_w=$(".ctabbt_list li").first().width();
  $(".sideline").width(nav_w);
  $(".ctabbt_list li").on('click', function(){
    nav_w=$(this).width();
    $(".sideline").stop(true);
    $(".sideline").animate({left:$(this).position().left},300);
    $(".sideline").animate({width:nav_w});
    $(this).addClass("find_nav_cur").siblings().removeClass("find_nav_cur");
    var fn_w = ($(".clist_tab_bt").width() - nav_w) / 2;
    var fnl_l;
    var fnl_x = parseInt($(this).position().left);
    if (fnl_x <= fn_w) {
      fnl_l = 0;
    } else if (fn_w - fnl_x <= flb_w - fl_w) {
      fnl_l = flb_w - fl_w;
    } else {
      fnl_l = fn_w - fnl_x;
    }
    $(".ctabbt_list").animate({
      "left" : fnl_l
    }, 300);
    
  });
  var fl_w=$(".ctabbt_list").width();
  var flb_w=$(".ctabbt_left").width();
  $(".ctabbt_list").on('touchstart', function (e) {
    var touch1 = e.originalEvent.targetTouches[0];
    x1 = touch1.pageX;
    y1 = touch1.pageY;
    ty_left = parseInt($(this).css("left"));
  });
  $(".ctabbt_list").on('touchmove', function (e) {
    var touch2 = e.originalEvent.targetTouches[0];
    var x2 = touch2.pageX;
    var y2 = touch2.pageY;
    if(ty_left + x2 - x1>=0){
      $(this).css("left", 0);
    }else if(ty_left + x2 - x1<=flb_w-fl_w){
      $(this).css("left", flb_w-fl_w);
    }else{
      $(this).css("left", ty_left + x2 - x1);
    }
    if(Math.abs(y2-y1)>0){
      e.preventDefault();
    }
  });
</script>

</body>
</html>
