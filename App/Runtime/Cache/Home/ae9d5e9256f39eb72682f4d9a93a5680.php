<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo ($l["title"]); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<script type="text/javascript" src="/Style/js/jquery.js"></script>
</head>
<style type="text/css">
	#main{
		margin-left: 5%;
	}
	.star{
		float: left;
	}

	.press{
		margin-top: 6px;
		margin-left: 10px;
		float: left;
		width:65%;
		height: 10px;
		border: 1px solid black;
	}

	.percent{
		background-color: black;
		float: left;
		margin: 0;
		height: 100%;

	}
</style>
<body>
	<div id="main">
		<div class="line">
			<div class="star">★★★★★</div><div class="press"><div class="percent" style="width: <?php echo ($l["5"]); ?>%"></div></div><br/>
		</div>
		<div class="line">
			<div class="star">★★★★★</div><div class="press"><div class="percent" style="width: <?php echo ($l["4"]); ?>%"></div></div><br/>
		</div>
		<div class="line">
			<div class="star">★★★★★</div><div class="press"><div class="percent" style="width: <?php echo ($l["3"]); ?>%"></div></div><br/>
		</div>
		<div class="line">
			<div class="star">★★★★★</div><div class="press"><div class="percent" style="width: <?php echo ($l["2"]); ?>%"></div></div><br/>
		</div>
		<div class="line">
			<div class="star">★★★★★</div><div class="press"><div class="percent" style="width: <?php echo ($l["1"]); ?>%"></div></div><br/>
		</div>
	</div>
</body>
</html>