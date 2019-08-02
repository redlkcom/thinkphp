<?php
namespace app\wp\controller;
use pay\alipay\Config;
use pay\alipay\Submit;
use pay\alipay\Notify;
class Pay extends Base
{
    public function alipay()
    {
    	$Config=new Config;
    	$alipay=$Config->get_config();
    	
	   $out_trade_no = input('WIDout_trade_no');

        //订单名称，必填
        $subject = '京东'.$out_trade_no;

        //付款金额，必填
        $total_fee = session('sumtotal');

        //商品描述，可空
        $body = '京东';

		//构造参数
		$parameter=$Config->parameter($out_trade_no,$subject,$total_fee,$body);

		//建立请求
		$alipaySubmit = new Submit($alipay);
		$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
		echo $html_text;
			       
	    }
	    //支付结果通知
	    public function notify_url(){
	    	$Config=new Config;
    		$alipay_config=$Config->get_config();

			//计算得出通知验证结果
			$alipayNotify = new AlipayNotify($alipay_config);
			$verify_result = $alipayNotify->verifyNotify();

			if($verify_result) {//验证成功
				/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//请在这里加上商户的业务逻辑程序代

				
				//——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
				
			    //获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表
				
				//商户订单号

				$out_trade_no = $_POST['out_trade_no'];

				//支付宝交易号

				$trade_no = $_POST['trade_no'];

				//交易状态
				$trade_status = $_POST['trade_status'];


			    if($trade_status == 'TRADE_FINISHED') {
					echo "支付失败";
			    }
			    else if ($trade_status == 'TRADE_SUCCESS') {
					db('order',[],false)->where(['order_num'=>$out_trade_no])->update(['status'=>2]);
					unset($_SESSION['order']);
					unset($_SESSION['order_buy']);
					unset($_SESSION['num']);
					unset($_SESSION['sumtotal']);
					unset($_SESSION['address']);
					$res=db('cart',[],false)->where(['uid'=>session('user.id')])->delete(); 
			    }

				//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
			        
				echo "success";		//请不要修改或删除
			}
			else {
			    //验证失败
			    echo "fail";

			    //调试用，写文本函数记录程序运行情况是否正常
			    //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
			}
		}
		//支付宝回调
		public function return_url(){
			$this->success('支付成功','Vip/index');
		}
}
