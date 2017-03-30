<?php
namespace Home\Controller;
//use Home\Controller\HController;
use Think\Controller;
class IndexController extends Controller {
	public function index(){
		$this -> display();
	}
    public function home()
    {
    	if (null!==session('uid')) {
    		$uid = session('uid');

    		$res = D("Course")->getCourses($uid);
    		//dump($res);
    		$this -> assign('list',$res);
    		$this -> assign('uid',$uid);
			$this -> display();
    	}else{
    		$code = I('get.code');
	  		$state = I('get.state');
	  		if (is_null($code)||($state!='wlmx')) {
	  			E("Empty Input");
	  		}
	  		$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx9922497712255467&secret=f5d5e9355c335edeec98c4d3695788e9&code=".$code."&grant_type=authorization_code";
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // 对认证证书来源的检查
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); // 从证书中检查SSL加密算法是否存在
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			// curl_setopt($ch, CURLOPT_HEADER, 0);
			$res = curl_exec( $ch );
			if ($res===false) {
				echo "Get Error:".curl_error($ch);
				exit;
			}
			$data = json_decode($res);
			$openid = $data->openid;

			$uid = D("User") -> getUid($openid);
			session('uid',$uid);
			$res = D("Course")->getCourses($uid);
    		//dump($res);
    		$this -> assign('list',$res);
    		$this -> assign('uid',$uid);
			$this -> display();
    	}
    }

}
