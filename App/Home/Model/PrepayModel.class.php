<?php
namespace Home\Model;
use Think\Model;
class PrepayModel extends Model
{
	public function postPrepay($uid,$cid)
	{
		if (!$cid) {
			exit;
		}
		$map['uid'] = $uid;
		$map['cid'] = $cid;
		$map['create_time'] = time();
		$r = $this -> add($map);
		return $r;
	}
}