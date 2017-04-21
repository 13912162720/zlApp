<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo ($l["title"]); ?></title>
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
<!--          MAIN             -->
<div>
	<ul class="mui-table-view">
		<li class="mui-table-view-cell"><p class="course-title">课程介绍</p><p class="course-content"><?php echo ($l["l_intro"]); ?></p></li>
        <li class="mui-table-view-cell"><p class="course-title">作者介绍</p><p class="course-content"><?php echo ($l["author_intro"]); ?></p></li>
	</ul>
</div>
<!--         FOOT             -->
<div>
	<nav class="mui-bar mui-bar-tab" style="text-align: center;">
		<a href="../subscribe/subscribed/?cid=<?php echo ($l["id"]); ?>">
			<button class="mui-tab-label course-index-foot-span" style="border: 1px solid black;border-radius: 10px;padding: 1px 15px;margin-top: 15px;">已订阅，开始阅读</button>
		</a>
	</nav>
</div>
</body>
<script src="/Style/mui/js/mui.min.js"></script>
	<script>
		mui.init({
			swipeBack:true //启用右滑关闭功能
		});


	</script>
</html>