<?php
namespace Home\Logic;
use Think\Model;
class SubscribeLogic extends Model
{
	public function getSubscribedList($uid)
	{
		$res = D('Subscribe')->getCourses($uid);
		//todo  过滤数据
		return $res;

	}
}