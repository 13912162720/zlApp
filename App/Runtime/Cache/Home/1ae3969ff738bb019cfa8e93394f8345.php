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
	<link rel="stylesheet" type="text/css" href="/Style/mui/css/icons-extra.css" />
	<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>

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
	.mui-table-view-cell{
		height: 50px;
	}
</style>
<body>
<!--          HEAD           -->
	<div>
		<img src="<?php echo ($l["l_banner"]); ?>" style="width: 100%;height: 150px">
	</div>
	
<!--          MAIN           -->
	<div style="padding: 20px;" class="mui-card">
		<p style="margin-bottom: 15px;"><?php echo ($l["author"]); ?>  <?php echo ($l["time"]); ?></p><BR/>
		<?php echo ($l["text"]); ?>
	</div>

<!--          DISCUSS        -->
	<div class="mui-card" style="margin-bottom: 55px;padding: 20px 20px 0px;" >
		<div class="mui-card-header">评论:</div>
			<div class="mui-card-content">
				<!--数据列表-->
				<ul class="mui-table-view" id="refresh">
					
				</ul>
			</div>
			<div class="mui-card-footer" id="pullRefresh" onclick="getDiscuss()"><p id="put-in" style="width:100%;font-size: 20px;margin-top: 5px;text-align: center;">加载更多</p></div>
	</div>
	
<!--          FOOT           -->
	<div>
		<nav class="mui-bar mui-bar-tab">
			<a class="item" href="#middlePopover" id="chat">
				<span class="mui-icon mui-icon-chat"></span>
			</a>
			<a class="mui-tab-item" id="like">
				<span class="mui-icon-extra mui-icon-extra-like"></span>
			</a>
			<!-- <a class="item" href="https://baidu.com">
				<span class="mui-icon mui-icon-contact"></span>
				<span class="mui-tab-label">红包</span>
			</a> -->
			<a class="item" id="share">
				<span class="mui-icon-extra mui-icon-extra-share"></span>
			</a>
		</nav>
	</div>
</body>
<div id="middlePopover" class="mui-popover" style="width:95%">
	<div class="mui-popover-arrow"></div>
	<form style="padding: 5%;width: 100%">
		<input type="text" style="float: left;width:78%;height: 40px" id="discuss-input">
		<button type="button" style="float: left;margin-left: 3%;height: 40px;padding: 5px 10px;background-color: #0080FF;color: white;font-size: 18px" id="discuss-button">提交</button>
	</form>
</div>

<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
<script src="/Style/mui/js/mui.min.js"></script>
	<script>
		mui.init({
			swipeBack:true //启用右滑关闭功能
		});

		document.getElementById("share").addEventListener('tap', function() {
				mui.toast('dianji youshang fenxiang'/*,{duration:2800,type:'div'}*/);
			});

		$(document).ready(function(){
			if (<?php echo ($l["likeit"]); ?>) {
				$("#like").addClass("mui-active");
			}
		})

		var id=<?php echo ($l["id"]); ?>;



		$("#like").on("tap",function(){
			$.ajax({
				type:'post',
				url:'http://zl.weilaimeixue.com/like/likeit/',
				data:{'lid':id},
				success:function(r){
					//alert(r.d);
					if (r.d) {
						$("#like").addClass("mui-active");
					}else{
						$("#like").removeClass("mui-active");
					}
				}
			})
		})

		$("#chat").click(function(){
			$("#discuss-input").focus();
		})


		$("#discuss-button").click(function(){
			$.ajax({
				type:'post',
				url:'http://zl.weilaimeixue.com/discuss/post/',
				data:{'lid':id,'discuss':$("#discuss-input").val()},
				success:function(r){
					alert("submit success");
				}
			})
		 	mui("#middlePopover").popover('hide');
		})

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

//上拉加载
		// mui.init({
		// 		pullRefresh: {
		// 			container: '#pullrefresh',
		// 			up: {
		// 				height:50,
		// 				contentrefresh: '正在加载...',
		// 				contentnomore:'没有更多数据了',
		// 				callback: getDiscuss
		// 			}
		// 		}
		// 	});

			var p = 1;
			$(document).ready(function(){
				$.ajax({
					url:'http://zl.weilaimeixue.com/discuss/getDiscuss',
					type:'post',
					data:{'p':1,'lid':id},
					success:function(r){
						if (r) {
							//this.endPullupToRefresh(false);
							for (var i = 0; i < r.length; i++) {
								$("#refresh").append('<li class="mui-table-view-cell">'+r[i]['discuss']+'</li>')
							}
						}else{
							$("#put-in").html('没有评论,快来抢沙发!')
						}
					}
				});
			})
			function getDiscuss(){
				p = p+1;
				$.ajax({
					url:'http://zl.weilaimeixue.com/discuss/getDiscuss',
					type:'post',
					data:{'p':p,'lid':id},
					success:function(r){
						if (r) {
							//this.endPullupToRefresh(false);
							for (var i = 0; i < r.length; i++) {
								$("#refresh").append('<li class="mui-table-view-cell">'+r[i]['discuss']+'</li>')
							}
						}else{
							alert('没有更多数据了')
							$("#put-in").html('没有更多数据')
							
							//this.endPullupToRefresh(true);
						}
					}
				});
			}
			
			/**
			 * 上拉加载具体业务实现
			 */
			// function pullupRefresh() {
			// 	setTimeout(function() {
			// 		mui('#pullrefresh').pullRefresh().endPullupToRefresh((++count > 2)); //参数为true代表没有更多数据了。
			// 		var table = document.body.querySelector('.mui-table-view');
			// 		var cells = document.body.querySelectorAll('.mui-table-view-cell');
			// 		for (var i = cells.length, len = i + 5; i < len; i++) {
			// 			var li = document.createElement('li');
			// 			li.className = 'mui-table-view-cell';
			// 			li.innerHTML = '<a class="mui-navigate-right">Item ' + (i + 1) + '</a>';
			// 			table.appendChild(li);
			// 		}
			// 	}, 1500);
			// }
	</script>
</html>