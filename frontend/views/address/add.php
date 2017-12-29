<!doctype html>
<html>
<head>
<meta charset='utf-8' />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<meta name="format-detection" content="telephone=no"/>
<title>正善商城-地址添加</title>
<link href="assets/shop/css/global.css" rel="stylesheet" type="text/css">
<link href="assets/shop/css/font.css" rel="stylesheet" type="text/css">
<link href="assets/shop/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="assets/shop/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/shop/js/response.js"></script>
<link rel="stylesheet" href="assets/shop/src/iosSelect.css">
<link rel="stylesheet" type="text/css" href="assets/shop/css/loadSimple.css">
<script>
    var _hmt = _hmt || [];
    (function() {
    var hm = document.createElement("script");
    hm.src = "//hm.baidu.com/hm.js?b25bf95dd99f58452db28b1e99a1a46f";
    var s = document.getElementsByTagName("script")[0]; 
    s.parentNode.insertBefore(hm, s);
    })();
</script>
</head>
<body>

<header>
</header>

<article class="paddingbtm">
    <ul class="address_editing">
      <li><span>收貨人：</span><small><input type="text" name="consignee" class="consignee" placeholder="請輸入收貨人名稱"></small></li>
      <li><span>電話：</span><small><input type="number" name="phone" class="phone" placeholder="請輸入收貨人聯系電話"></small></li>
      <li><span>所在地區：</span><small class="iconfont icon-more">
      <div class="form-item item-line" id="select_contact">                 
        <div class="pc-box">                     
            <input type="hidden" name="contact_province_code" data-id="0001" id="contact_province_code" value="" data-province-name="">                     
            <input type="hidden" name="contact_city_code" id="contact_city_code" value="" data-city-name=""><span class="areaId" style="white-space:nowrap; " data-city-code="" data-province-code="" data-district-code="" id="show_contact">請選擇地址</span> 
        </div>             
      </div>
      </small>
      </li>
      <li><span>街道/门牌:</span><small><input type="text" class="address" name="address" placeholder="請輸入具體地址"></small></li>
      <li><span>郵編:</span><small><input type="number" class="postCode" name="postCode" placeholder="請輸入郵編"></small></li>
     <!--  <li class="ae_mr"><span>设为默认：</span><small>
       <input type="checkbox" name="CheckboxGroup2" value="复选框" id="checkbox-2-0" class="ckbox">
       <label for="checkbox-2-0"></label></small></li> -->
      <!-- <li class="ae_a"><a href="javascript:;">刪除地址</a></li> -->
    </ul>
  
</article>

<footer>
  <ul class="ab_rightbtn">
    <li><a href="javascript:;" class='save'>保存地址</a></li>
  </ul>
</footer>

</body>
<script src="assets/shop/src/zepto.js"></script>
<script src="assets/shop/src/iosSelect.js"></script>
<script src="assets/shop/src/areaData_v2.js"></script>
<script type="text/javascript" src="assets/shop/js/jimiAlert.js"></script>
<script type="text/javascript" src="assets/shop/js/controller.js"></script>
<script type="text/javascript">
    $(function(){
         //提交收貨地址 
        $('.save').click(function(){
         
            //收貨人
            var consignee=$('.consignee').val();
            if(!consignee){alert('請輸入收貨人名稱');return false;}
            //聯繫電話
            var phone=$('.phone').val();
            if(!phone){alert('請輸入收貨人聯系電話');return false;}
            //所在區
            var areaId=$('.areaId').attr('data-district-code');
            if(!areaId){alert('請選擇地址');return false;}
            //街道/門牌
            var address=$('.address').val();
            if(!address){alert('請輸入具體地址');return false;}
            //郵編
            var postCode=$('.postCode').val();
            loaderHelper.show({'text':"地址添加中...."});
            $.ajax({
                  type: 'POST',
                  url:"<?php echo \yii\helpers\Url::to(['address/add']); ?>",
                  data:{consignee:consignee,phone:phone,areaId:areaId,address:address,postCode:postCode},
                  success: function(data){
                      loaderHelper.hide();
                      if(typeof data=='string')data=JSON.parse(data);
                      if(data.error!=0){alert(data.message);return false;}
                      alert(data.message);
                      location.href="<?php echo yii\helpers\Url::to(['address/list']);?>";
                  },
                  error:function(res){
                      loaderHelper.hide();
                      alert("網絡異常,請重試!");
                      return false;
                }
            })
        })
    })
     //獲取數組   
    function get_array(data)
    {
        var Arrays = [];
            $.each(data, function (index, obj) {
                var aArray = {};
                aArray['id']=obj.area_id;
                aArray['value']=obj.area_name;
                aArray['parentId']=obj.parent_id;
                Arrays.push(aArray);
            });
            return Arrays;
    }
    var iosProvinceData= function(callback){//callback为回调函数
        //请求接口
        $.ajax({
              url:"<?php echo Yii::$app->params['api_url'].Yii::$app->params['post_url']['address_areas'];?>",
              dataType: "jsonp",
              jsonp: "jsonpcallback",
          success:function(data,textStatus){
            var Arrays=get_array(data.data);
            callback(Arrays);
          },
        });
    }
    var iosCityData= function(province,callback){// province为已经选中的省份ID
        $.ajax({
          url: '<?php echo Yii::$app->params['api_url'].Yii::$app->params['post_url']['address_child'];?>&areaId='+province,
          dataType: "jsonp",
          jsonp: "jsonpcallback",
          success:function(data,textStatus){
            var Arrays=get_array(data.data);
            callback(Arrays);
          },
        });
    }
    var iosCountyData= function(province,city,callback){// province为已经选中的省份ID,city为已经选中的城市ID
        $.ajax({
          url: '<?php echo Yii::$app->params['api_url'].Yii::$app->params['post_url']['address_child'];?>&areaId='+city,
          dataType: "jsonp",
          jsonp: "jsonpcallback",
          success:function(data,textStatus){
            var Arrays=get_array(data.data);
            callback(Arrays);
          },
        });
    }
    var selectContactDom = $('#select_contact');
    var showContactDom = $('#show_contact');
    var contactProvinceCodeDom = $('#contact_province_code');
    var contactCityCodeDom = $('#contact_city_code');
    selectContactDom.bind('click', function () {
        var sccode = showContactDom.attr('data-city-code');
        var scname = showContactDom.attr('data-city-name');
        var oneLevelId = showContactDom.attr('data-province-code');
        var twoLevelId = showContactDom.attr('data-city-code');
        var threeLevelId = showContactDom.attr('data-district-code');
        var iosSelect = new IosSelect(3,
            [iosProvinceData, iosCityData, iosCountyData],
             //[iosProvinces, iosCitys, iosCountys],
            {
                title: '地址选择',
                itemHeight: 35,
                relation: [1, 1, 0, 0],
                oneLevelId: oneLevelId,
                twoLevelId: twoLevelId,
                threeLevelId: threeLevelId,
                showLoading:true,
                callback: function (selectOneObj, selectTwoObj, selectThreeObj) {
                    contactProvinceCodeDom.val(selectOneObj.id);
                    contactProvinceCodeDom.attr('data-province-name', selectOneObj.value);
                    contactCityCodeDom.val(selectTwoObj.id);
                    contactCityCodeDom.attr('data-city-name', selectTwoObj.value);
                    showContactDom.attr('data-province-code', selectOneObj.id);
                    showContactDom.attr('data-city-code', selectTwoObj.id);
                    showContactDom.attr('data-district-code', selectThreeObj.id);
                    showContactDom.html(selectOneObj.value + ' ' + selectTwoObj.value + ' ' + selectThreeObj.value);
                }
        });
    });
</script>
</html>
