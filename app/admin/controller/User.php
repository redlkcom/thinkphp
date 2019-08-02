<?php
namespace app\admin\controller;
use think\Controller;
use think\captcha\Captcha;
class User extends controller
{
    public function login()
    {
    	if (request()->isPost()) {
            if (!$this->check_verify(input('post.code'))) {
                $this->error('验证码错误');
            }
    		$username=input('post.username');
    		$pwd=input('post.pwd');
    		$where['is_del']=0;
    		$where['username']=$username;
    		$where['password']=md5($pwd);
    		$res=db('admin')->where($where)->find();
    		if ($res) {
    			session('user',$res);
                if (input('post.rem')) {
                    cookie('username',$username,3600);
                    cookie('pwd',$pwd,3600);
                }else{
                    cookie('username',null);
                    cookie('pwd',null);
                }
                $level=db('level')->where(['id'=>$res['level']])->find();
                $now_level=explode('|',$level['menu']);
                foreach ($now_level as $key => $value) {
                    $menu_one=db('menu',[],false)->where(['is_del'=>0,'id'=>$value])->find();
                    array_push($now_level,$menu_one['pid']);
                }
                session('level',$now_level);
    			$this->redirect('Index/index');
    		}else{
    			$this->error('用户名或密码错误');
    		}
    	}
        return $this->fetch('User/login');
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
}
