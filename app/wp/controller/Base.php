<?php
namespace app\wp\controller;
use think\Controller;
use think\Session;
class Base extends controller{
    public function _initialize(){
    	Session::init([
            'prefix'    =>'module',
            'type'      =>'',
            'auto_start'=>true,
        ]);
           $nav_list=db('pro_category',[],false)->where(['is_del'=>0,'pid'=>0])->select();
            $menu_list=db('menu',[],false)->where(['is_del'=>0,'type'=>1,'pid'=>0])->select();
            $this->assign(['menu_list'=>$menu_list,'nav_list'=>$nav_list]);
        }
        //验证登录
        public function check_login(){
            if (!session('?user')) {
                $this->redirect('User/login');
            }
    }
     //提示信息
    public function msg($res,$url){
        if ($res) {
        $this->success('操作成功',$url);
        }else{
            $this->error('操作失败');
        }
    }
}
