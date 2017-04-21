<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo ($t["title"]); ?></title>
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
		<img src="<?php echo ($t["banner"]); ?>" style="width: 100%;height: 150px">
	</div>
<!--          MAIN           -->
	<div>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$l): $mod = ($i % 2 );++$i;?><ul class="mui-table-view" style="width: 96%;margin-left: 2%">
				<li class="mui-table-view-cell mui-media" style="margin-top: 10px">
					<a href="http://zl.weilaimeixue.com/course/text/?lid=<?php echo ($l["id"]); ?>">
						<img class="mui-media-object mui-pull-left" src="<?php echo ($l["l_banner"]); ?>">
						<div class="mui-media-body">
							<p style="color: black;height: 100px;overflow: inherit;">
							<?php echo ($l["l_title"]); ?>
							</p>
							<p class='mui-ellipsis'><?php echo ($l["create_time"]); ?></p>
						</div>
					</a>
				</li>
			</ul><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
</body>
<script src="/Style/mui/js/mui.min.js"></script>
	<script>
		mui.init({
			swipeBack:true //启用右滑关闭功能
		});


	</script>
</html>