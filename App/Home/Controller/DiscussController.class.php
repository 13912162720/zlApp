<?php
namespace Home\Controller;
use Home\Controller\HController;

class DiscussController extends HController
{
	public function post()
	{
		$uid = session('uid');
		$lid = I('post.lid');
		$text = I('post.discuss');
		$res = D('Discuss') -> postInfo($uid,$lid,$text);
		if ($res) {
			return true;
		}else{
			return false;
		}
	}

	public function getDiscuss(){
		$p = I('post.p');
		$p = $p?$p:1;
		$lid = I('post.lid');
		$res = D('Discuss') -> getDiscuss($lid,$p);
		if ($res) {
			$this -> ajaxReturn($res);
		}else{
			return false;
		}
		
	}
}