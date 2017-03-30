<?php
namespace Home\Controller;
use Home\Controller\HController;
use Org\wx\WxPayUnifiedOrder;
use Org\wx\WxPayConfig;
use Org\wx\WxPayApi;
//use Think\Cache\Driver\Redis;

class PayController extends HController
{
	public function index(){
	
		$this -> display();
	}

	public function prePay($a){
		$uid = session('uid');
		
		$input = new WxPayUnifiedOrder();
		$input->SetBody("订阅未来美学课程");
		$input->SetAttach($a['title']);
		$input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));
		$input->SetTotal_fee($a['price']);
		$input->SetTime_start(date("YmdHis"));
		$input->SetTime_expire(date("YmdHis", time() + 600));
		$input->SetGoods_tag("test");
		$input->SetNotify_url("http://zl.weilaimeixue.com/subscribe/back");
		$input->SetTrade_type("JSAPI");
		$input->SetOpenid(D('User')->getOpenid($uid));
		
		$order = WxPayApi::unifiedOrder($input);
		return $order;
	}

}


?>