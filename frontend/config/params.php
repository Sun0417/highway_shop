<?php
return [
    'adminEmail' => 'admin@example.com',
    'api_url'=>'http://jiangs8888.tunnel.echomod.cn/smartShop/backend/web/index.php?r=',
    //请求的接口
    'post_url'=>[
    				'member_sign_wechat'=>'member/api-sign-in-by-wechat-open-id',
    				'member_apply'=>'member/api-apply-sign-up',
    				'member_sign'=>'member/api-sign-up',
    				'address_areas'=>'area/api-get-top-areas',
    				'address_child'=>'area/api-get-child-areas',
                    'address_list'=>'address/api-get-address-list',
                    'address_add'=>'address/api-add-address',
                    'cart_list'=>'shopping-cart/api-get-shopping-cart',
                    'product_detail'=>'product/api-get-product-detail'
			    ],
    'check_token_action'=>['reg/index','reg/send-code','reg/check-code'],
    'active'=>[
                'member'=>'我的',
                'index'=>'首頁',
                'culture'=>'文化',
                'message'=>'消息',
                'cart'=>'購物車',
                'product'=>'商品',
    ]
];
