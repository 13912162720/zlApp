<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo ($l["l_title"]); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">

	<!--标准mui.css-->
	<link rel="stylesheet" href="/Style/mui/css/mui.min.css">
	<!--App自定义的css-->
	<link rel="stylesheet" type="text/css" href="/Style/mui/css/app.css"/>
</head>
<body>
<!--          HEAD           -->
	<div>
		<img src="<?php echo ($l["l_banner"]); ?>" style="width: 100%;height: 150px">
	</div>
	
<!--          MAIN           -->
	<div>
		<?php echo ($l["author"]); ?>  <?php echo ($l["time"]); ?><BR/>
		<?php echo ($l["text"]); ?>
	</div>
<!--          FOOT           -->
	<div>
		<nav class="mui-bar mui-bar-tab">
			<a class="mui-tab-item mui-active" href="https://baidu.com">
				<span class="mui-icon mui-icon-home"></span>
				<span class="mui-tab-label">评论</span>
			</a>
			<a class="mui-tab-item" href="https://baidu.com">
				<span class="mui-icon mui-icon-email"></span>
				<span class="mui-tab-label">点赞</span>
			</a>
			<a class="mui-tab-item" href="https://baidu.com">
				<span class="mui-icon mui-icon-contact"></span>
				<span class="mui-tab-label">红包</span>
			</a>
			<a class="mui-tab-item" href="https://baidu.com">
				<span class="mui-icon mui-icon-gear"></span>
				<span class="mui-tab-label">更多</span>
			</a>
		</nav>
	</div>
</body>
</html>