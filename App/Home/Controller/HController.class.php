<?php
namespace Home\Controller;
use Think\Controller;
class HController extends Controller
{
	public function _initialize(){
		
		if (!session('uid')) {
			E("Login Please");
		}
	}
}

?>