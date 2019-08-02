<?php
namespace app\admin\controller;
use think\Controller;
class Menu extends Base
{
    public function index()
    {
    	$list=db('menu',[],false)->where(['is_del'=>0])->order('id desc')->paginate(5);
       
        $this->assign('list',$list);
        return $this->fetch();
    }
    //物理删除
    public function delete(){
    	if (request()->isGet()) {
    		$id=input('id');
            $menu=db('menu',[],false)->where('pid',$id)->find();
            if (!empty($menu)) {
                $this->error('该模块下有子分类，无法删除','Menu/index');
            }
    		$res=db('menu',[],false)->delete($id);
    		$this->msg($res,'index');
    	}
    }
    //逻辑删除
    public function luo_del(){
        if (request()->isGet()) {
            $id=input('id');
            $menu=db('menu',[],false)->where('pid',$id)->find();
            if (!empty($menu)) {
                $this->error('该模块下有子分类，无法删除','Menu/index');
            }
            $res=db('menu',[],false)->where('id',$id)->setField('is_del','1');
            $this->msg($res,'index');
        }
    }
    //添加
    public function add()
    {
        if (request()->isPost()) {
            $post=input();
            $post['class_name']=$post['pid']==0?'javascript':$post['class_name'].'/index';
            $where['sort']=['EGT',$post['sort']];
            $sort=db('menu',[],false)->where($where)->setInc('sort');
            $res=db('menu',[],false)->insert($post);
            $level=db('level',[],false)->where('id','1')->find();
            $ins_id=db('menu',[],false)->getLastInsID();
            $menu_str=$level['menu'].'|'.$ins_id;
            $update=db('level',[],false)->where('id','1')->setField('menu',$menu_str);
            $this->msg($sort&&$res&&$update,'index');
        }
        return $this->fetch();
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
        return $this->fetch();
    }
    //
    public function ajax(){
        if (request()->isPost()) {
            $menu_name=input('post.menu_name');
            $class_name=input('post.class_name');
            $type=input('post.type');
            if (!empty($menu_name)) {
               $where['menu_name']=$menu_name;
            }else if (!empty($class_name)) {
                $where['class_name']=$class_name.'/index';
            }
            $where['type']=$type;
            
            $res=db('menu',[],false)->where($where)->find();
            if ($res) {
                return 1;
            }
        }
    }
}
