<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>已订专栏</title>
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
  <ul class="mui-table-view mui-table-view-striped mui-table-view-condensed">
	 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$l): $mod = ($i % 2 );++$i;?><li id="subscribed-head-li" class="mui-table-view-cell ">
	        <div class="mui-table">
	            <div class="mui-table-cell mui-col-xs-10">
	                <h4 class="mui-ellipsis"><span><?php echo ($l["title"]); ?>1</span><span style="float: right;margin-right: 50%"><?php echo ($l["author"]); ?>2</span><a href="http://zl.weilaimeixue.com/course/course/?cid=<?php echo ($l["id"]); ?>" style="position:absolute;left: 90%;top: 5px;color: black">更多></a></h4>
	                <h5><img style="width: 99%;height: 178px;margin-top: 20px;" src="<?php echo ($l["l_thumbnail"]); ?>"></h5>
	                <p class="mui-h4 mui-ellipsis subscribed-head-p"><span><?php echo ($l["time"]); ?></span><a href="http://zl.weilaimeixue.com/course/text/?lid=<?php echo ($l["tid"]); ?>" style="float: right;color: #999">阅读全文</a></p>
	            </div>
	            
	        </div>
	    </li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<!--           MAIN         -->
<!--           FOOT         -->
</body>
<script src="/Style/mui/js/mui.min.js"></script>
	<script>
		mui.init({
			swipeBack:true //启用右滑关闭功能
		});


</script>
</html>