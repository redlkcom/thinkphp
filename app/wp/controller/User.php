<?php
namespace app\wp\controller;
use think\Controller;
use think\Db;
use think\captcha\Captcha;
use sms\SmsMultiSender;
use sms\SmsSenderUtil;
class User extends Base
{
    
    public function login(){
        if (request()->isPost()) {
            if (!$this->check_verify(input('post.code'))) {
                $this->error('验证码错误');
            }
            $post=input();
            $user=$post['username'];
            $pwd=md5($post['pwd']);
            $res=Db::table('think_user')->where("is_del=0 AND pwd='$pwd' AND (username='$user' OR tel='$user' OR email='$user')")->find();
            if ($res) {
                session('user',$res);
                if (input('post.rem')) {
                    cookie('username',$username,3600);
                    cookie('pwd',$pwd,3600);
                }else{
                    cookie('username',null);
                    cookie('pwd',null);
                }
                if (isset($_SESSION['order_buy'])) {
                    $this->redirect('Cart/confirm');
                }else if (isset($_SESSION['order'])) {
                    $this->redirect('Cart/index');
                }else{
                    $this->redirect('Vip/index');
                }
                
            }else{
                $this->error('用户名或密码错误');
            }
        }
        return $this->fetch('User/login');
    }

    public function reg(){
        if (request()->isPost()) {
            $post=input();
            $post['pwd']=md5($post['pwd']);
            if ($post['code']!=session('code')) {
                $this->error('验证码错误','User/reg');
            }
            unset($post['code']);
            $res=db('user')->insert($post);
            $this->msg($res,'login');

        }
        return $this->fetch('User/reg');
    }

    public function logout(){
    	session('user',null);
    	$this->redirect('User/login');
    }
    // 检测输入的验证码是否正确，$code为用户输入的验证码字符串，$id多个验证码标识
    public function check_verify($code, $id = ''){
        $captcha = new Captcha();
        return $captcha->check($code, $id);
    }
    public function ajax(){
        if (request()->isAjax()) {
            $username=input('username');
            $email=input('email');
            $tel=input('tel');
            if (!empty($username)) {
                $where['username']=$username;
            }else if (!empty($tel)) {
                $where['tel']=$tel;
            }else if (!empty($email)) {
                $where['email']=$email;
            }
            $where['is_del']=0;
            $res=db('user',[],false)->where($where)->find();
            if ($res) {
                echo 1;
            }
        }
    }
    //手机验证码
    public function tel_ajax(){
        $tel=input('iphone');
        $code=mt_rand(1111,9999);
        session('code',$code);
        $res=$this->smsMulti($tel,$code);
        return $res;
    }
    //邮箱验证
    public function email_ajax(){
        $email=input('email');
        $code=mt_rand(1111,9999);
        session('code',$code);
        //$content="您的验证码是：".$code;
        $res=sendEmail($code,$email);
        return $res;
    }
    //腾讯云短信验证
    public function smsMulti($tel,$code){
        // $appid $appkey $templateId $smsSign为官方demo所带，请修改为你自己的
         // 短信应用SDK AppID
        $appid = 1400200150;
        // 短信应用SDK AppKey
        $appkey = "5ab30eb4b7a4d709d1d1e7eb111dc4b3";
        // 你的手机号码。
        $phoneNumber = [$tel];
        // 短信模板ID，需要在短信应用中申请
        $templateId = 313121;  // NOTE: 这里的模板ID`7839`只是一个示例，真实的模板ID需要在短信控制台中申请
        // 签名
        $smsSign = "吟游诗人"; // NOTE: 这里的签名只是示例，请使用真实的已申请的签名，签名参数使用的是`签名内容`，而不是`签名ID`
        // 单发短信
        try {
            $ssender = new SmsMultiSender($appid, $appkey);
            $result = $ssender->send(0, "86", $phoneNumber,
                $code."为您的登录验证码，请于5分钟内填写。如非本人操作，请忽略本短信。", "", "");
            $rsp = json_decode($result,true);
            return $rsp;
        } catch(\Exception $e) {
            return $e;
        }
                //暂停3秒
        sleep(3);
        // 指定模板ID单发短信
        try {
            $ssender = new SmsMultiSender($appid, $appkey);
            $params = ["654321", "5"];
            $result = $ssender->sendWithParam("86", $phoneNumber, $templateId,
                $params, $smsSign, "", "");  // 签名参数未提供或者为空时，会使用默认签名发送短信
            $rsp = json_decode($result);
            echo $result;
        } catch(\Exception $e) {
            echo var_dump($e);
        }
    }
}
