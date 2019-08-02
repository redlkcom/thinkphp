<?php
namespace app\admin\controller;
use think\Controller;
class Level extends Base
{
    public function index()
    {
    	$list=db('level',[],false)->where(['is_del'=>0,'name'=>['neq','超级管理员']])->order('id desc')->paginate(5);
        
    	$list_copy=$list->toArray();
        foreach ($list_copy['data'] as $key=>$value) {
            $menu=explode('|',$value['menu']);
            foreach ($menu as $k => $v) {
                $level=db('menu',[],false)->where(['is_del'=>0,'id'=>$v])->find();
                $list_copy['data'][$key]['quanx'][]=$level['menu_name'];
            }
            
        }
        $this->assign('list',$list);
        $this->assign('list_copy',$list_copy['data']);
        return $this->fetch('Level/index');
    }
    //物理删除
    public function delete(){
    	if (request()->isGet()) {
    		$id=input('id');
            $level=db('level')->where('id',$id)->find();
            if ($level['id']=='1') {
                $this->error('非法操作','Level/index');
            }
    		$res=db('level')->delete($id);
    		$this->msg($res,'index');
    	}
    }
    //逻辑删除
    public function luo_del(){
        if (request()->isGet()) {
            $id=input('id');
            $level=db('level')->where('id',$id)->find();
            if ($level['id']=='1') {
                $this->error('非法操作','Level/index');
            }
            $res=db('level')->where('id',$id)->setField('is_del','1');
            $this->msg($res,'index');
        }
    }
    //添加
    public function add()
    {
        if (request()->isPost()) {
            $post=input();
            $post['menu']=implode('|',$post['menu']);
            $res=db('level')->insert($post);
            $this->msg($res,'index');
        }else{
            $level=db('level',[],false)->where(['is_del'=>0,'name'=>['neq','超级管理员']])->order('id desc')->select();
            $this->assign('level',$level);
        }
        return $this->fetch('Level/add');
    }
    //修改
    public function update()
    {
        if (request()->isPost()) {
            $post=input();
            $post['menu']=implode('|',$post['menu']);
            $res=db('level')->update($post);
            $this->msg($res,'index');
        }else{
          $id=input('id'); 
          if ($id=='1') {
                $this->error('非法操作','Level/index');
            } 
          $level=db('level',[],false)->where(['is_del'=>0,'id'=>$id])->find();
          $level['menu']=explode('|',$level['menu']);
            $this->assign('find',$level);
        }
        return $this->fetch('Level/update');
    }
    //
    public function ajax(){
        if (request()->isPost()) {
            $name=input('post.name');
            
            $res=db('level')->where(['name'=>$name])->find();
            if ($res) {
                return 1;
            }
        }
    }
}
