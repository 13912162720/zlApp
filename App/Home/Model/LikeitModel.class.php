<?php
namespace Home\Model;
use Think\Model;
class LikeitModel extends Model
{
	public function like($uid,$lid)
	{
		$map['uid'] = $uid;
		$map['lid'] = $lid;
		$map['create_time'] = time();
		$res = $this -> add($map);
		if ($res) {
			return true;
		}else{
			return false;
		}
	}

	public function unlike($uid,$lid)
	{
		$map['uid'] = $uid;
		$map['lid'] = $lid;
		$res = $this -> where($map) -> delete();
		if ($res) {
			return true;
		}else{
			return false;
		}
	}

	public function likeItOrNot($uid,$lid)
	{
		$map['uid'] = $uid;
		$map['lid'] = $lid;
		$res = $this -> where($map) -> find();
		if ($res) {
			return 1;
		}else{
			return 0;
		}
	}
}