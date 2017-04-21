<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>订阅支付</title>
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
	<script type="text/javascript" src="/Style/js/jquery.js"></script>
	<!--标准mui.css-->
	<link rel="stylesheet" href="/Style/mui/css/mui.min.css">
	<!--App自定义的css-->
	<link rel="stylesheet" type="text/css" href="/Style/mui/css/app.css"/>
</head>
<body>
<!--          HEAD           -->
<div id="course-home-head" >
	<ul class="mui-table-view">
		<li class="mui-table-view-cell mui-media subscribe-head-pad">
			<img class="mui-media-object mui-pull-left" 
			id="subscribe-head-img" src="<?php echo ($l["thumbnail"]); ?>">
			<div class="mui-media-body">
				<?php echo ($l["title"]); ?>
				<p class='course-title-intro'><?php echo ($l["s_intro"]); ?></p><br/>
				
			</div>
		</li>
	</ul>
</div> 
<!--            MAIN           -->
<div>
	<div class="mui-card" style="margin:0px 0px 0px auto;">
		<div class="mui-card-content">
			<div class="subscribe-main-div1"><span class="subscribe-main-div1-p">每天仅需<b style="color: red;display: inline-block;"><?php echo ($l["daypay"]); ?></b>元，KOL精品课程马上到手</span>
			</div>
			<div class="subscribe-main-div2">
				<p class="subscribe-main-div2-p">支付金额：<b><?php echo ($l["price"]); ?></b>元</p>
			</div>
			<div class="subscribe-main-div3">
				<p class="subscribe-main-div3-p">您将订阅《<?php echo ($l["title"]); ?>》<?php echo ($l["s_time"]); ?>到<?php echo ($l["e_time"]); ?>的内容。订阅成功后不支持退款</p>
			</div>
			<div class="subscribe-main-div4">
					<button type="button" class="mui-btn subscribe-main-div4-b" onclick="pay()">
				微信支付
					</button>
			</div>
		</div>
	</div>
</div>


</body>
<script src="/Style/mui/js/mui.min.js"></script>
	<script>
		mui.init({
			swipeBack:true //启用右滑关闭功能
		});
		
		id = <?php echo ($l["id"]); ?>;
		
		wx.config({
		    debug: false,
		    appId: '<?php echo ($wx["appId"]); ?>',
		    timestamp: <?php echo ($wx["timestamp"]); ?>,
		    nonceStr: '<?php echo ($wx["nonceStr"]); ?>',
		    signature: '<?php echo ($wx["signature"]); ?>',
		    jsApiList: [
		      // 所有要调用的 API 都要加到这个列表中
		      'chooseWXPay'
		    ]
		  });
		  wx.ready(function () {
		    // 在这里调用 API
		   
		  });

		
		  function pay()
		  {
		  	wx.chooseWXPay({
		  		appId:'<?php echo ($wx["appId"]); ?>',
			    timestamp: <?php echo ($wx["timestamp"]); ?>, // 支付签名时间戳，注意微信jssdk中的所有使用timestamp字段均为小写。但最新版的支付后台生成签名使用的timeStamp字段名需大写其中的S字符
			    nonceStr: '<?php echo ($wx["nonceStr"]); ?>', // 支付签名随机串，不长于 32 位
			    package: 'prepay_id=<?php echo ($prepay_id); ?>', // 统一支付接口返回的prepay_id参数值，提交格式如：prepay_id=***）
			    signType: 'MD5', // 签名方式，默认为'SHA1'，使用新版支付需传入'MD5'
			    paySign: '<?php echo ($s); ?>', // 支付签名
			    success: function (res) {
			    	//success();
			        window.location.href="http://zl.weilaimeixue.com/subscribe/success?cid=<?php echo ($l["id"]); ?>";

			    },
			    cancel:function(res){
			    	alert('取消支付');
			    
			    	//alert(res);
			    },
			    error:function(res){
			    	alert('支付失败');
			    	//alert(res);
			    }
			});
		  }

		  // function success(){
		  // 	$.ajax({
		  // 		url:"<?php echo U(Pay/success);?>",
		  // 		data:{'cid':{$l.id}},
		  // 		type:"POST",
		  // 		success:function(r){
		  // 			if (r) {
		  // 				alert('购买成功');
		  // 			}else{
		  // 				alert('购买失败,请检查您是否已经购买此课程');
		  // 				window.location.href="http://zl.weilaimeixue.com/subscribe/subscribed";
		  // 			}
		  			
		  // 		}

		  // 	});
		  // }
	</script>
</html>