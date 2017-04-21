<?php
namespace Home\Controller;
use Think\Controller;
class HController extends Controller
{
	public function _initialize(){
		 //session('uid',1);
		if (!session('uid')) {
		 	redirect('http://zl.weilaimeixue.com/');
		 }
	}
}

?>
