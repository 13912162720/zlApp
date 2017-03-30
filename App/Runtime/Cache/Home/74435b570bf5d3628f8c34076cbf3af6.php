<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home Page</title>
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
<div id="slider" class="mui-slider">
	<div class="mui-slider-group mui-slider-loop">
		<!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
		<div class="mui-slider-item mui-slider-item-duplicate">
			<a href="#">
				<img src="/Style/mui/images/yuantiao.jpg">
				<p class="mui-slider-title">静静看这世界</p>
			</a>
		</div>
		<div class="mui-slider-item">
			<a href="#">
				<img src="/Style/mui/images/shuijiao.jpg">
				<p class="mui-slider-title">幸福就是可以一起睡觉</p>
			</a>
		</div>
		<div class="mui-slider-item">
			<a href="#">
				<img src="/Style/mui/images/muwu.jpg">
				<p class="mui-slider-title">想要一间这样的木屋，静静的喝咖啡</p>
			</a>
		</div>
		<div class="mui-slider-item">
			<a href="#">
				<img src="/Style/mui/images/cbd.jpg">
				<p class="mui-slider-title">Color of SIP CBD</p>
			</a>
		</div>
		<div class="mui-slider-item">
			<a href="#">
				<img src="/Style/mui/images/yuantiao.jpg">
				<p class="mui-slider-title">静静看这世界</p>
			</a>
		</div>
		<!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
		<div class="mui-slider-item mui-slider-item-duplicate">
			<a href="#">
				<img src="/Style/mui/images/shuijiao.jpg">
				<p class="mui-slider-title">幸福就是可以一起睡觉</p>
			</a>
		</div>
	</div>
	<div class="mui-slider-indicator mui-text-right">
		<div class="mui-indicator mui-active"></div>
		<div class="mui-indicator"></div>
		<div class="mui-indicator"></div>
		<div class="mui-indicator"></div>
	</div>
</div>
<!--          MAIN          -->
<div>
	<ul class="mui-table-view">
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$l): $mod = ($i % 2 );++$i;?><li class="mui-table-view-cell mui-media">
			<a href="<?php echo U('Course/index');?>?cid=<?php echo ($l["id"]); ?>">
				<img class="mui-media-object mui-pull-left" src="<?php echo ($l["thumbnail"]); ?>">
				<div class="mui-media-body">
					<?php echo ($l["title"]); ?>
					<p class='home-text-1'><?php echo ($l["subhead"]); ?></p><br/>
					<p class='mui-ellipsis'><?php echo ($l["news"]); ?></p><br/>
					<p class='home-price-1'><?php echo ($l["price"]); ?> 元/<?php echo ($l["unit"]); ?></p>
				</div>
			</a>
		</li><?php endforeach; endif; else: echo "" ;endif; ?>
		<!-- <li class="mui-table-view-cell mui-media">
			<a href="course/index">
				<img class="mui-media-object mui-pull-left" src="/Style/mui/images/muwu.jpg">
				<div class="mui-media-body">
					木屋
					<p class='mui-ellipsis'>想要这样一间小木屋，夏天挫冰吃瓜，冬天围炉取暖.</p>
				</div>
			</a>
		</li>
		<li class="mui-table-view-cell mui-media">
			<a href="course/index">
				<img class="mui-media-object mui-pull-left" src="/Style/mui/images/cbd.jpg">
				<div class="mui-media-body">
					CBD
					<p class='mui-ellipsis'>烤炉模式的城，到黄昏，如同打翻的调色盘一般.</p>
				</div>
			</a>
		</li> -->
	</ul>
</div>
<!--         FOOT              -->
<div style="margin-top: 60px">
	<nav class="mui-bar mui-bar-tab">
		<a class="home-a" href="<?php echo U('Subscribe/subscribed');?>">
			已定专栏
		</a>
	</nav>
</div>
</body>
<script src="/Style/mui/js/mui.min.js"></script>
	<script>
		mui.init({
			swipeBack:true //启用右滑关闭功能
		});
		//获得slider插件对象
		var gallery = mui('#slider');
		gallery.slider({
		  interval:5000//自动轮播周期，若为0则不自动播放，默认为0；
		});

	</script>
</html>