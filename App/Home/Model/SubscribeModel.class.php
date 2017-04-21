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
			if (strlen($s['title'])>33) {
				$res1[$i]['title'] = mb_substr($s['title'], 0,11,'utf-8').'...';//br_insert($s['title'],11);
			}else{
				$res1[$i]['title'] = $s['title'];
			}
			$res1[$i]['author'] = $s['author'];
			$res1[$i]['l_title'] = $r['l_title'];
			$res1[$i]['l_thumbnail'] = $r['l_thumbnail'];
			$res1[$i]['time'] = $r['create_time'];
			$res1[$i]['s_intro'] = $s['s_intro'];
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
		$map['expire_time'] = array('egt',time());
		$r1 = M('Prepay') -> where($map) -> find();
		if ($r1) {
			$map1['uid'] = $uid;
			$map1['cid'] = $cid;
			$map1['s_time'] = time();
			$map1['e_time'] = $map1['s_time']+365*86400;
			$res = $this -> add($map1);
		}else{
			$res = false;
		}
		
		return $res;
	}
}

?>