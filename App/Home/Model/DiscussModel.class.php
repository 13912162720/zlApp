<?php
namespace Home\Model;
use Think\Model;
class DiscussModel extends Model
{
	public function postInfo($uid,$lid,$text)
	{
		$map['uid'] = $uid;
		$map['lid'] = $lid;
		$map['discuss'] = $text;
		$map['create_time'] = time();
		$res = $this -> add($map);
		if ($res) {
			return true;
		}else{
			return false;
		}
	}

	public function getDiscuss($lid,$p)
	{
		$map['lid'] = $lid;
		$map['p'] = $p;
		$res = $this -> where($map) -> field('id,uid,discuss,create_time') -> limit(($p-1)*5,5) -> order('id desc') -> select();
		
		if ($res) {
			return $res;
		}else{
			return false;
		}

	}
}