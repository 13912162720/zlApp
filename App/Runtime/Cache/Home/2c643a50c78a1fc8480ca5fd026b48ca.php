<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo ($l["l_title"]); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>

	<!--标准mui.css-->
	<link rel="stylesheet" href="/Style/mui/css/mui.min.css">
	<!--App自定义的css-->
	<link rel="stylesheet" type="text/css" href="/Style/mui/css/app.css"/>
</head>
<style type="text/css">
	.item{
		display: table-cell;
	    overflow: hidden;
	    width: 1%;
	    height: 50px;
	    text-align: center;
	    vertical-align: middle;
	    white-space: nowrap;
	    text-overflow: ellipsis;
	    color: #929292;
	}
</style>
<body>
<!--          HEAD           -->
	<div>
		<img src="<?php echo ($l["l_banner"]); ?>" style="width: 100%;height: 150px">
	</div>
	
<!--          MAIN           -->
	<div style="margin-bottom: 100px">
		<?php echo ($l["author"]); ?>  <?php echo ($l["time"]); ?><BR/>
		<?php echo ($l["text"]); ?>
	</div>
<!--          FOOT           -->
	<div>
		<nav class="mui-bar mui-bar-tab">
			<a class="item mui-active" onclick="sharePenyouquan()">
				<span class="mui-icon mui-icon-home"></span>
				<span class="mui-tab-label">分享</span>
			</a>
			<a class="item" onclick="order()">
				<span class="mui-icon mui-icon-email"></span>
				<span class="mui-tab-label">订阅</span>
			</a>
			
		</nav>
	</div>
</body>
<script src="/Style/mui/js/mui.min.js"></script>
	<script>
	function order()
	{
		window.location.href='http://zl.weilaimeixue.com/subscribe/index/?cid=<?php echo ($l["cid"]); ?>';
	}

		mui.init({
			swipeBack:true //启用右滑关闭功能
		});
		wx.config({
		    debug: false,
		    appId: '<?php echo ($wx["appId"]); ?>',
		    timestamp: <?php echo ($wx["timestamp"]); ?>,
		    nonceStr: '<?php echo ($wx["nonceStr"]); ?>',
		    signature: '<?php echo ($wx["signature"]); ?>',
		    jsApiList: [
		      // 所有要调用的 API 都要加到这个列表中
			'onMenuShareTimeline',
			'onMenuShareAppMessage',
			'onMenuShareWeibo',
			'onMenuShareQQ',
			'onMenuShareQZone'
		    ]
		  });

		wx.ready(function(){
			wx.onMenuShareTimeline({
			    title: 'F.B.L', // 分享标题
			    link: 'http://zl.weilaimeixue.com/', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
			    imgUrl: 'http://static.cnbetacdn.com/article/2017/0331/69d2e5483955f54.png', // 分享图标
			    success: function () { 
			    	
			        // 用户确认分享后执行的回调函数
			    },
			    cancel: function () {
			    	
			        // 用户取消分享后执行的回调函数
			    }
			});

			wx.onMenuShareAppMessage({
			    title: 'F.B.L', // 分享标题
			    desc: 'test', // 分享描述
			    link: 'http://zl.weilaimeixue.com/', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
			    imgUrl: 'http://static.cnbetacdn.com/article/2017/0331/69d2e5483955f54.png', // 分享图标
			    type: 'link', // 分享类型,music、video或link，不填默认为link
			    dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
			    success: function () { 
			    	//alert('success');
			        // 用户确认分享后执行的回调函数
			    },
			    cancel: function () { 
			    	//alert('cancel');
			        // 用户取消分享后执行的回调函数
			    }
			});

			wx.onMenuShareQQ({
			    title: 'F.B.L', // 分享标题
			    desc: 'test', // 分享描述
			    link: 'http://zl.weilaimeixue.com/', // 分享链接
			    imgUrl: 'http://static.cnbetacdn.com/article/2017/0331/69d2e5483955f54.png', // 分享图标
			    success: function () { 
			       // 用户确认分享后执行的回调函数
			    },
			    cancel: function () { 
			       // 用户取消分享后执行的回调函数
			    }
			});

			wx.onMenuShareQZone({
			   	title: 'F.B.L', // 分享标题
			    desc: 'test', // 分享描述
			    link: 'http://zl.weilaimeixue.com/', // 分享链接
			    imgUrl: 'http://static.cnbetacdn.com/article/2017/0331/69d2e5483955f54.png', // 分享图标
			    success: function () { 
			       // 用户确认分享后执行的回调函数
			    },
			    cancel: function () { 
			        // 用户取消分享后执行的回调函数
			    }
			});

			wx.onMenuShareWeibo({
			    title: 'F.B.L', // 分享标题
			    desc: 'test', // 分享描述
			    link: 'http://zl.weilaimeixue.com/', // 分享链接
			    imgUrl: 'http://static.cnbetacdn.com/article/2017/0331/69d2e5483955f54.png', // 分享图标
			    success: function () { 
			       // 用户确认分享后执行的回调函数
			    },
			    cancel: function () { 
			        // 用户取消分享后执行的回调函数
			    }
			});
		})
	</script>
</html>