<?php
/**
*  redis set
*  
*
*/
function redis_set($name,$data,$expire=null){
	$data = serialize($data);
	$redis = new \redis();
	$redis -> connect('127.0.0.1','6379');
	$redis -> auth('root');
	$res = $redis -> set($name,$data);
	if ($expire!=null) {
		$redis ->expire($name,$expire);
	}
	return $res;
}

/**
*  redis get
*  
*
*/
function redis_get($name){
	$redis = new \redis();
	$redis -> connect('127.0.0.1','6379');
	$redis -> auth('root');
	$data = $redis -> get($name);
	if ($data) {
		return unserialize($data);
	}else{
		return false;
	}
}

/**
*  获取时间格式 
*/
function time_format($time, $now=null ){
    if (!$now) {
        $now = time();
    }
    $diff = $now-$time;
    switch ($diff) {
        case $diff<60:
            $r = $diff.'秒前';
            break;
        case $diff<3600:
            $r = floor($diff/60).'分钟前';
            break;
        case $diff<86400:
            $r = floor($diff/3600).'小时前';
            break;
        default:
            $r = date('Y-m-d',$time);
            break;
    }
    return $r;
}

function br_insert($string,$index=12,$type='utf-8')
{
    $str1 = mb_substr($string, 0, $index ,'utf-8');
    $str2 = mb_substr($string, $index,$index,'utf-8');
    return $str1.'<br/>'.$str2;
}
