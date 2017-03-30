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
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$l): $mod = ($i % 2 );++$i;?><div class="mui-card">
		<div class="mui-card-header mui-card-media" style="height:40vw;background-image:url(<?php echo ($l["l_banner"]); ?>)"><div>name</div></div>
		<div class="mui-card-content">
			<div class="mui-card-content-inner" style="padding-bottom: 0px;">
				<p style=""><?php echo ($l["s_text"]); ?></p>
				<p><span><?php echo ($l["time"]); ?></span>
				<?php if($l["view"] == 1): ?><a href="http://zl.weilaimeixue.com/course/unsubscribe/?lid=<?php echo ($l["id"]); ?>" style="float: right;">阅读全文</a>
				<?php else: ?> 
				<a href="http://zl.weilaimeixue.com/subscribe/index/?cid=<?php echo ($t["id"]); ?>" style="float: right;">购买此文</a><?php endif; ?>
				

				</p>
			</div>
		</div>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>
</body>
</html>