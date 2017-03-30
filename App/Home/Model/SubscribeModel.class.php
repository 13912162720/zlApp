<?php
namespace Home\Model;
use Think\Model;
class SubscribeModel extends Model
{
	public function getCourses($uid)
	{
		$map['uid'] = $uid;
		$res = $this -> where($map) -> field('cid') -> select();
		for ($i=0; $i < sizeof($res); $i++) { 
			$r = D('Book') -> getNewest($res[$i]['cid']);
			$s = D('Course') -> getTitleAndAuthor($res[$i]['cid']);
			$res1[$i]['id'] = $s['id'];
			$res1[$i]['tid'] = $r['id'];
			$res1[$i]['title'] = $s['title'];
			$res1[$i]['author'] = $s['author'];
			$res1[$i]['l_title'] = $r['l_title'];
			$res1[$i]['l_thumbnail'] = $r['l_thumbnail'];
			$res1[$i]['time'] = $r['create_time'];
		}
		return $res1;
	}

	public function subscribeOrNot($uid,$cid)
	{
		$map['uid'] = $uid;
		$map['cid'] = $cid;
		//todo timeout or not
		$res = $this -> where($map) -> find();
		if ($res) {
			return true;
		}else{
			return false;
		}
	}

	public function postSubscribe($uid,$cid){
		if (!$cid) {
			exit;
		}
		$map['uid'] = $uid;
		$map['cid'] = $cid;
		$r1 = M('Prepay') -> where($map) -> find();
		if ($r1) {
			$map['s_time'] = time();
			$map['e_time'] = $map['s_time']+365*86400;
			$res = $this -> add($map);
		}else{
			$res = false;
		}
		
		return $res;
	}
}

?>