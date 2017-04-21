<?php
namespace Home\Controller;
//use Home\Controller\HController;
use Think\Controller;
class IndexController extends Controller {
	/**
	 * 跳转到首页接口
	 */
	public function index(){
		$this -> display();
	}

	/**
	 * 首页显示
	 */
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
	  		if (is_null($code)||($state!='wlmx')) {//state是返回码，验证跳转过程完整性，code为获取到的唯一一次性获取用户id的凭证。
	  			E("Empty Input");//若有一项为空，则跳转失败，输出错误。
	  		}
	  		//获取用户openid
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
			//获取用户在本地数据库的id。
			$uid = D("User") -> getUidByOpenid($openid);
			session('uid',$uid);
			//获取用户显示的课程列表，若不需要对用户是否订阅做判断，则可以不$uid
			$res = D("Course")->getCourses($uid);
    		//dump($res);
    		$this -> assign('list',$res);
    		$this -> assign('uid',$uid);
			$this -> display();
    	}
    }

    public function news()
	{
	    $lid = I('post.lid');
	    $cid = I('post.cid')?I('post.cid'):D('Book') -> getCidByLid($lid);
	    $res = D("Book") -> getNews($cid);
	    var_dump($res);exit;
	    $this -> assign('l',$res);
	    $this -> display();
	}

}
