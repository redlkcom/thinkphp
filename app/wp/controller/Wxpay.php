<?php
namespace app\wp\controller;
use pay\wx\Pay;
class Wxpay extends Base
{
    public function wxpay(){
	    	$pay = new Pay();
			$res = $pay->getRes();
			return $res;	       
	    }
	    //支付结果通知
    public function notify_url(){
    	
	}
	//支付宝回调
	public function return_url(){
		$this->success('支付成功','Vip/index');
	}
}
