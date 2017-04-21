<?php
return array(
	//'配置项'=>'配置值'
	//数据库配置信息
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => 'localhost', // 服务器地址
	'DB_NAME'   => 'zl', // 数据库名
	'DB_USER'   => 'root', // 用户名
	'DB_PWD'    => 'jlkj%F2s', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => '', // 数据库表前缀 
	'DB_CHARSET'=> 'utf8', // 字符集
	'DB_DEBUG'  =>  FALSE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增

	//Redis相关
	//cache Drive
	'DATA_CACHE_TYPE'=>'redis',	
	'REDIS_HOST'=>'127.0.0.1', 
	'REDIS_PORT'=>6379, 
	'DATA_CACHE_TIMEOUT'=>300,
	//密码
	'REDIS_AUTH'=>'root',

	//启用路由
	'URL_ROUTER_ON' => true,

	'URL_MODEL' => '2',

	'MODULE_ALLOW_LIST'    =>    array('Home','Admin'),

	'DEFAULT_MODULE'       =>    'Home',  // 默认模块
	//'DEFAULT_CONTROLLER'   =>	 'Subscribe',

	'SHOW_PAGE_TRACE' => false,

	'TMPL_PARSE_STRING'  =>array(
     '__STYLE__'    =>	 '/Style', // 增加新的JS类库路径替换规则
     '__MUI__'		=>	'/Style/mui',
     '__IMG__'		=>	'/Style/img',
     '__JS__'		=>	'/Style/js',
     '__CSS__'		=>	'/Style/css',
     '__API__'		=>  '/Style/Api',
     '__BTS__'		=>	'/Style/bootstrap',
     // '__UPLOAD__'	=> '/Uploads', // 增加新的上传路径替换规则
	),
);