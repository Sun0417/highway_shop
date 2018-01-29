<?php
return [
    'adminEmail' => 'admin@example.com',
    'api_url'=>'http://app1.zhengshan.store/smartShop/backend/web/index.php?r=',
    'pageSize'=>15,
    //请求的接口
    'post_url'=>[
    				'member_sign_wechat'=>'member/api-get-token-by-wechat-open-id',
    				'member_apply'=>'member/api-apply-sign-up',
    				'member_sign'=>'member/api-sign-up-or-sign-in',
    				'address_areas'=>'area/api-get-top-areas',
    				'address_child'=>'area/api-get-child-areas',
                    'address_list'=>'address/api-get-address-list',
                    'address_add'=>'address/api-add-address',
                    'cart_list'=>'shopping-cart/api-get-shopping-cart',
                    'product_detail'=>'product/api-get-spu-detail',
                    'add_cart_record'=>'shopping-cart/api-add-sales-unit',
                    'edit_cart_record'=>'shopping-cart/api-update-record',//修改购物车中某个记录的数量
                    'del_cart_record'=>'shopping-cart/api-del-record',
                    'buying_detail'=>'buying/api-apply-create-order-by-shopping-cart',//訂單詳情頁面
                    'commit_order'=>'buying/api-create-order-by-shopping-cart',//訂單提交
                    'banner_list'=>'recommend/api-get-banner',//首页幻灯片
                    'category_list'=>'category/api-get-top-categories',//首页顶级分类
                    'recommend_list'=>'recommend/api-get-recommend-product-unit',//推荐热门
                    'mark'=>'mark/api-mark',//关注 收藏 点赞
                    'cancle-mark'=>'mark/api-cancle-mark',//取消关注 收藏 点赞
                    'get-marker'=>'mark/api-get-marker',//获取点赞人数
                    'get-follow-shops'=>'mark/api-get-follow-shops',//获取关注的店铺
                    'get-collect-products'=>'mark/api-get-collect-products',//获取收藏的产品
                    'get-category-childs'=>'category/api-get-childs',//首页子分类
                    'get-products-by-category'=>'category/api-get-products-by-category',//获取子分类下的产品
                    'callback_url'=>'http://app1.zhengshan.store/smartShop/backend/web/index.php'
			    ],
    'check_token_action'=>['reg/index','reg/send-code','reg/check-code'],
    'active'=>[
                'member'=>'我的',
                'index'=>'首頁',
                'culture'=>'文化',
                'message'=>'消息',
                'cart'=>'購物車',
                'product'=>'商品',
                'category'=>'分類',
    ],
    'category'=>['recommend'=>1,'hot'=>2],
];
