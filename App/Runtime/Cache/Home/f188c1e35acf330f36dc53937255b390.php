<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo ($l["title"]); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<script type="text/javascript" src="/Style/js/jquery.js"></script>
	<!--标准mui.css-->
	<link rel="stylesheet" href="/Style/mui/css/mui.min.css">
	<!--App自定义的css-->
	<link rel="stylesheet" type="text/css" href="/Style/mui/css/app.css"/>
	<style type="text/css">
		.course-index-foot-a{
			float: left;
			width: 50%;
			text-align: center;
			margin:13px auto;
		}
	</style>
</head>
<body>
<!--          HEAD           -->
<div id="course-home-head" >
	<ul class="mui-table-view">
		<li class="mui-table-view-cell mui-media">
			<img class="mui-media-object mui-pull-left" src="<?php echo ($l["thumbnail"]); ?>">
			<div class="mui-media-body">
				<?php echo ($l["title"]); ?>
				<p class='course-title-intro'><?php echo ($l["s_intro"]); ?></p><br/>
				
			</div>
		</li>
	</ul>
</div>
<!--          MAIN          -->
<div>
	<ul class="mui-table-view">
		<li class="mui-table-view-cell"><p class="course-title">课程介绍</p><p class="course-content"><?php echo ($l["l_intro"]); ?></p></li>
        <li class="mui-table-view-cell"><p class="course-title">作者介绍</p><p class="course-content"><?php echo ($l["author_intro"]); ?></p></li>
        <li class="mui-table-view-cell"><p class="course-title">适宜人群</p><p class="course-content"><?php echo ($l["suit"]); ?></p></li>
        <li class="mui-table-view-cell"><p class="course-title">订阅须知</p><p class="course-content"><?php echo ($l["notice"]); ?></p></li>
        <li class="mui-table-view-cell"><p class="course-title">最新内容</p><p class="course-content"><?php echo ($l["news"]); ?></p></li>
        <li class="mui-table-view-cell"><p class="course-title">推荐语</p><p class="course-content"><?php echo ($l["reco"]); ?></p></li>
        <li class="mui-table-view-cell"><p class="course-title">评分</p><p class="course-content" id="comment"></p></li>
	</ul>
</div>
<!--         FOOT              -->
<div style="margin-top: 60px">
	<nav class="mui-bar mui-bar-tab">
		<a class="course-index-foot-a" href="http://zl.weilaimeixue.com/course/lists?cid=<?php echo ($l["id"]); ?>">
			<button class="mui-tab-label course-index-foot-span" style="border: 1px solid black;border-radius: 10px;padding: 1px 15px">试读</button>
		</a>
		<a class="course-index-foot-a" href="../subscribe/index/?cid=<?php echo ($l["id"]); ?>">
			<button class="mui-tab-label course-index-foot-span" style="border: 1px solid black;border-radius: 10px;padding: 1px 15px">订阅：<?php echo ($l["price"]); ?>元／<?php echo ($l["unit"]); ?></button>
		</a>
	</nav>
	<!-- <nav class="mui-bar mui-bar-tab">
		<div class="course-a">
			<a href="https://baidu.com">
			<button type="button" class="mui-btn mui-btn-outlined">
					试读
				</button></a>
				
		</div>
		<div class="course-a">
			<a href="../subscribe/index?cid=<?php echo ($l["id"]); ?>">
			<button type="button" class="mui-btn mui-btn-outlined">
					订阅：<?php echo ($l["price"]); ?>元／<?php echo ($l["unit"]); ?>
				</button></a>
		</div>sM4AOVdWfPE4DxkXGEs8VNN3pwuI0fqyhRbrZcFr-dHLMcc7yZAxyrLhlxTzFe8cAf1xWJSqiJrbXCzXA6NRDA
	</nav> -->
</div>
</body>
<script src="/Style/mui/js/mui.min.js"></script>
	<script>
		mui.init({
			swipeBack:true //启用右滑关闭功能
		});

		$("#comment").load('../course/comment');
	
	</script>
</html>