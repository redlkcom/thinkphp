<?php
namespace app\admin\controller;
use think\Controller;
class Vip extends Base
{
    public function index()
    {
    	$this->check_login();
        $list=db('user',[],false)->where(['is_del'=>0])->order('id desc')->paginate(5);
        $this->assign(['list'=>$list]);
        return $this->fetch('Vip/index');
    }
    //物理删除
    public function delete(){
    	if (request()->isGet()) {
    		$id=input('id');
            $user=db('user')->where('id',$id)->find();
    		$res=db('user')->delete($id);
    		$this->msg($res,'index');
    	}
    }
    //逻辑删除
    public function luo_del(){
        if (request()->isGet()) {
            $id=input('id');
            $user=db('user')->where('id',$id)->find();
            
            $res=db('user')->where('id',$id)->setField('is_del','1');
            $this->msg($res,'index');
        }
    }
   
    //修改
    public function update()
    {
        $id=input('id');
        $find=db('user',[],false)->where(['is_del'=>0,'id'=>$id])->find();
        if (request()->isPost()) {
            $post=input();
            if ($post['pwd']!='') {
                $post['pwd']=md5($post['pwd']);
            }
            unset($post['pwd']);
            $res=db('user',[],false)->update($post);
            $this->msg($res,'index');
        }
        $this->assign(['find'=>$find]);
        return $this->fetch('Vip/update');
    }
 
}
