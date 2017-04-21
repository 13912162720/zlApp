<?php
namespace Home\Controller;
use Think\Controller;
/**
 * 系统自动调用类
 */
class SysController extends Controller {
	/**
	 * @todo 这里是否应该把试图访问系统控制类的用户ip加入到系统黑名单中加以控制，提高安全性能
	 */
	public function _initialize(){
		$cip = $_SERVER['REMOTE_ADDR'];
		if ($cip != '123.206.47.20') {
			echo 'U R not welcome';
			exit;
		}
	}

	public function delete_expire_data(){
		$model = M('Prepay');
		$time = time();
		$map['expire_time'] = array('lt',$time);
		$model -> where($map) -> delete();
	}

}
?>
