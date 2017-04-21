<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> </title>
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">

	<!--标准mui.css-->
	<link rel="stylesheet" href="/Style/mui/css/mui.min.css">
	<!--App自定义的css-->
	<link rel="stylesheet" type="text/css" href="/Style/mui/css/app.css"/>
</head>
<body>
<!--           HEAD         -->
<!--           MAIN         -->
<div class="subscribe-success-main-div-1">
	<p class="subscribe-success-main-label">《<?php echo ($l["title"]); ?>》专栏订阅成功</p>
</div>
<div class="subscribe-success-main-div-2">
<a href="<?php echo U('Course/course');?>?cid=<?php echo ($l["id"]); ?>">
	<button type="button" class="mui-btn subscribe-success-main-button">
					开始阅读
				</button>
</a>
</div>
<!--           FOOT         -->
<div class="subscribe-success-foot-div-1">
	遇到问题克联系客服邮箱<br/>
	service@weilaimeixue.com
</div>
</body>
<script src="/Style/mui/js/mui.min.js"></script>
	<script>
		// mui.init({
		// 	swipeBack:true //启用右滑关闭功能
		// });

	</script>
</html>