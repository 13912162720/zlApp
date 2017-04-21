<?php
namespace Home\Controller;
use Home\Controller\HController;

class SubscribeController extends HController
{

	private $appId = 'wx9922497712255467';
  	private $appSecret = 'f5d5e9355c335edeec98c4d3695788e9';

//付费页面首页，生成订单
	public function index()
	{
		$cid = I('get.cid');
    $uid = session('uid');
		$res = D('Course') -> getSubscribeInfo($cid);
    $r = D('Prepay') -> postPrepay($uid,$cid);
		$wx_js = $this -> js_info();
    $a = array(
      'title' => $res['title'],
      'price' => $res['price']*100,
      'cid'   => $res['id']
      );
  
    $wx_pay = A("Pay") -> prePay($a);
    $wx_sign = $this -> getSign($wx_pay['prepay_id'],$wx_js['nonceStr'],$wx_js['timestamp']);
    $this -> assign('prepay_id',$wx_pay['prepay_id']);
		$this -> assign('wx',$wx_js);
		$this -> assign('l',$res);
    $this -> assign('s',$wx_sign);
		$this -> display();	
	}

//支付成功回调页面
	public function success()
	{
    $cid = I('get.cid');
    $uid = session('uid');
  
    $r = D('Subscribe') -> postSubscribe($uid,$cid);
    if (!$r) {
      E("订阅失败，请联系管理员");
    }else{
      $res = D('Course') -> getSuccessInfo($cid);
      $this -> assign('l',$res);
      $this -> display();
    }
  }

//已订阅页面
	public function subscribed()
	{	
    	$uid = session('uid');
    	$res = D('Subscribe','Logic') -> getSubscribedList($uid);
      // dump($res);
      // exit;
  	if($res){
      	$this -> assign('list',$res);
  			$this -> display();
  	}else{
        $this -> display('nosubscribe');
  	}
	}

	public function js_info(){
		  $jsapiTicket = $this->getJsApiTicket();

	    // 注意 URL 一定要动态获取，不能 hardcode.
	    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	    $url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	    $timestamp = time();
	    $nonceStr = $this->createNonceStr();

	    // 这里参数的顺序要按照 key 值 ASCII 码升序排序
	    $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";
	    $signature = sha1($string);
	    $signPackage = array(
	      "appId"     => $this->appId,
	      "nonceStr"  => $nonceStr,
	      "timestamp" => $timestamp,
	      "url"       => $url,
	      "signature" => $signature,
	      "rawString" => $string
	    );
	    return $signPackage; 
	}

	private function getJsApiTicket() {
    // jsapi_ticket 应该全局存储与更新，以下代码以写入到文件中做示例
    $ticket = redis_get('jsapi_ticket');
    if (!$ticket) {
      $accessToken = $this->getAccessToken();
      // 如果是企业号用以下 URL 获取 ticket
      // $url = "https://qyapi.weixin.qq.com/cgi-bin/get_jsapi_ticket?access_token=$accessToken";
      $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
      $res = json_decode($this->httpGet($url));
      $ticket = $res->ticket;
      redis_set("jsapi_ticket",$ticket,3600);
    } else {
      
    }
    return $ticket;
  }

  private function getAccessToken() {
    // access_token 应该全局存储与更新，以下代码以写入到文件中做示例
    $access_token = redis_get("access_token");
    if (!$access_token) {
      $access_token = $this->get_wx_token();
    } else {
      
    }
    return $access_token;
  }

  private function get_wx_token(){
    $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->appId."&secret=".$this->appSecret;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // 对认证证书来源的检查
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); // 从证书中检查SSL加密算法是否存在
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // curl_setopt($ch, CURLOPT_HEADER, 0);
    $res = curl_exec( $ch );
    if ($res===false) {
      echo "CURL Error:".curl_error($ch);
      exit;
    }
    $r = json_decode($res);
    $token = $r->access_token;
    redis_set('access_token',$token,3600);
    return $token;
  }

  private function httpGet($url) {

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
    // 为保证第三方服务器与微信服务器之间数据传输的安全性，所有微信接口采用https方式调用，必须使用下面2行代码打开ssl安全校验。
    // 如果在部署过程中代码在此处验证失败，请到 http://curl.haxx.se/ca/cacert.pem 下载新的证书判别文件。
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_URL, $url);

    $res = curl_exec($curl);
    curl_close($curl);

    return $res;
  }

  private function createNonceStr($length = 16) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $str = "";
    for ($i = 0; $i < $length; $i++) {
      $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
    }
    return $str;
  }

  private function getSign($a,$b,$c){
    
    $appid = $this->appId;//"wx9922497712255467";
    $nonceStr = $b;
    $package = "prepay_id=".$a;
    $signType = "MD5";
    $timestamp = $c;
    $stringA = "appId=$appid&nonceStr=$nonceStr&package=$package&signType=MD5&timeStamp=$timestamp";
    $sign = strtoupper(md5("$stringA&key=weilaimeixuewwwwwwwwwwwwwwwwwwww"));
    return $sign;
  }

}


?>
