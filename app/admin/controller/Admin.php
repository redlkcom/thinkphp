<?php
namespace app\admin\controller;
use think\Controller;
class Admin extends Base
{
    public function index()
    {
    	$list=db('admin',[],false)->alias('a')->field('a.id,username,email,b.name')->join('level b','a.level=b.id')->where(['a.is_del'=>0,'b.is_del'=>0,'b.name'=>['neq','超级管理员']])->order('a.id desc')->paginate(5);
        
    	$this->assign('list',$list);
        return $this->fetch('Admin/index');
    }
    //物理删除
    public function delete(){
    	if (request()->isGet()) {
    		$id=input('id');
            $admin=db('admin')->where('id',$id)->find();
            if ($admin['level']=='1') {
                $this->error('非法操作','Admin/index');
            }
    		$res=db('admin')->delete($id);
    		$this->msg($res,'index');
    	}
    }
    //逻辑删除
    public function luo_del(){
        if (request()->isGet()) {
            $id=input('id');
            $admin=db('admin')->where('id',$id)->find();
            if ($admin['level']=='1') {
                $this->error('非法操作','Admin/index');
            }
            $res=db('admin')->where('id',$id)->setField('is_del','1');
            $this->msg($res,'index');
        }
    }
    //添加
    public function add()
    {
        if (request()->isPost()) {
            $post=input();
            $post['password']=md5($post['password']);
            unset($post['pwd']);
            $res=db('admin')->insert($post);
            $this->msg($res,'index');
        }else{
            $level=db('level',[],false)->where(['is_del'=>0,'name'=>['neq','超级管理员']])->order('id desc')->select();
            $this->assign('level',$level);
        }
        return $this->fetch('Admin/add');
    }
    //修改
    public function update()
    {
        $id=input('id');
        $find=db('admin',[],false)->where(['is_del'=>0,'id'=>$id])->find();
        if ($find['level']=='1') {
                $this->error('非法操作','Admin/index');
            }
        if (request()->isPost()) {
            $post=input();
            if ($post['password']!=$find['password']) {
                $post['password']=md5($post['password']);
            }
            unset($post['pwd']);
            $res=db('admin')->update($post);
            $this->msg($res,'index');
        }else{
            
            $level=db('level',[],false)->where(['is_del'=>0,'name'=>['neq','超级管理员']])->order('id desc')->select();
            
            $this->assign(['level'=>$level,'find'=>$find]);
        }
        return $this->fetch('Admin/update');
    }
    //
    public function ajax(){
        if (request()->isPost()) {
            $username=input('post.username');
            $email=input('post.email');
            if(!empty($username)){
            $where['username']     = $username;
            }else if (!empty($email)){
                $where['email']     = $email;
            }
            $res=db('admin')->where($where)->find();
            if ($res) {
                return 1;
            }
        }
    }
}
