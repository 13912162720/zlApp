<?php
namespace Home\Controller;
use Home\Controller\HController;

class LikeController extends HController
{
	public function likeit()
	{
		$lid = I('post.lid');
		$uid = session('uid');
		$res = D('Likeit') -> likeItOrNot($uid,$lid);
		if ($res) {
			$res = $this -> unlike($uid,$lid);
			$d = 0;
		}else{
			$res = $this -> like($uid,$lid);
			$d = 1;
		}
		$this -> ajaxReturn(array('s' => $res,'d'=>$d));
	}

	public function like($uid,$lid)
	{
		$res = D('Likeit') -> like($uid,$lid);
		if ($res) {
			return true;
		}else{
			return false;
		}
	}

	public function unlike($uid,$lid)
	{
		$res = D('Likeit') -> unlike($uid,$lid);
		if ($res) {
			return true;
		}else{
			return false;
		}
	}
}