<!doctype html>
<html>
<head>
<meta charset='utf-8' />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<meta name="format-detection" content="telephone=no"/>
<title>关注</title>
<link href="assets/shop/css/global.css" rel="stylesheet" type="text/css">
<link href="assets/shop/css/font.css" rel="stylesheet" type="text/css">
<link href="assets/shop/css/style.css" rel="stylesheet" type="text/css">
<link href="assets/shop/css/dropload.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="assets/shop/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/shop/js/response.js"></script>
</head>
<body>
<header>
</header>
<article>
<div class="content">    
   <ul class="lists fl_ul">
   </ul>
</div>  
</article>
<script type="text/javascript" src="assets/shop/js/dropload.min.js"></script>
<script>
$(function(){
    var paging = 1;//页码数
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
                url: '<?php echo \yii\helpers\Url::to(['follow/list','paging'=>1]) ?>',
                dataType: 'json',
                success: function(data){
                    // $.ajax()虽然接口提供json字符串，但接收到的是 json对象
                    // alert(typeof(data));
                    var result = '';
                    // 循环拼接显示内容 DOM
                    // 刷新获取多少数据，显示多少 使用html()重置 lists DOM
                    for(var i = 0; i <data.data.shops.length; i++){
                        if(data.data.shops[i].avatar)
                        {
                            $avatar=data.data.shops[i].avatar;
                        }else
                        {
                            $avatar='  assets/shop/img/avatar.jpg';
                        }
                        result +='<li><a href="javascript:;"><small><img src="'+$avatar+'" ></small><span>'+data.data.shops[i].nickName+'</span></a></li>';
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
                url: '<?php echo \yii\helpers\Url::to(['follow/list']) ?>'+'&paging='+paging,
                dataType: 'json',
                success: function(data){
                    // data = JSON.parse(data);
                    var result = '';
                    // 选择需要显示的数据 拼接 DOM
                    if(data.data.shops.length==0){
                            // 再往下已经没有数据
                            // 锁定
                            me.lock();
                            // 显示无数据
                            me.noData();
                    }
                    for(var i = 0; i < data.data.shops.length; i++){
                        if(data.data.shops[i].avatar)
                        {
                            $avatar=data.data.shops[i].avatar;
                        }else
                        {
                            $avatar='  assets/shop/img/avatar.jpg';
                        }
                        result +='<li><a href="javascript:;"><small><img src="'+$avatar+'" ></small><span>'+data.data.shops[i].nickName+'</span></a></li>';
                        if(data.data.shops.length<15){
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
</body>
</html>
