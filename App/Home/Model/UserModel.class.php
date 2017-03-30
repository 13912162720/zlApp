<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model
{
	public function getUid($openid)
	{
		$map['openid'] = $openid;
		$res = $this -> where($map) -> field('id') ->find();
		if ($res) {
			return $res['id'];
		}else{
			$res = $this -> add($map);
			return $res;
		}
	}

	public function getOpenid($uid)
	{
		$map['id'] = $uid;
		$res = $this -> where($map) -> field('openid') -> find();
		return $res['openid'];
	}
}

?>