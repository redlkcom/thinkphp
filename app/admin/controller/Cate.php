<?php
namespace app\admin\controller;
use think\Controller;
class Cate extends Base
{
    public function index()
    {
    	$list=db('pro_category',[],false)->where(['is_del'=>0])->order('id desc')->paginate(5);
        
    	$this->assign('list',$list);
        return $this->fetch('Cate/index');
    }
    //物理删除
    public function delete(){
    	if (request()->isGet()) {
    		$id=input('id');
            $cate=db('pro_category',[],false)->where('pid',$id)->find();
            if (!empty($cate)) {
                $this->error('该模块下有子分类，无法删除','Cate/index');
            }
    		$res=db('pro_category')->delete($id);
    		$this->msg($res,'index');
    	}
    }
    //逻辑删除
    public function luo_del(){
        if (request()->isGet()) {
            $id=input('id');
            $cate=db('pro_category',[],false)->where('pid',$id)->find();
            if (!empty($cate)) {
                $this->error('该模块下有子分类，无法删除','Cate/index');
            }
            $res=db('pro_category',[],false)->where('id',$id)->setField('is_del','1');
            $this->msg($res,'index');
        }
    }
    //添加产品
    public function add()
    {
        if (request()->isPost()) {
            $post=input();
            $res=db('pro_category',[],false)->insert($post);
            $this->msg($res,'index');
        }else{
            $cate_list=db('pro_category',[],false)->where(['is_del'=>0,'pid'=>0])->select();
            $this->assign('cate_list',$cate_list);
        }
        return $this->fetch('Cate/add');
    }
    //修改产品
    public function update()
    {
        if (request()->isPost()) {
            $post=input();
            if ($post['img']=='') {
            unset($post['img']);
            unset($post['thumb']);
            unset($post['water']);
        }
            $res=db('product')->update($post);
            $this->msg($res,'Product/index');
        }else{
            $id=input('id');
            $cate=db('pro_category',[],false)->where(['is_del'=>0])->order('id desc')->select();
            $find=db('product',[],false)->where(['is_del'=>0,'id'=>$id])->find();
            $find['img']=explode("|",$find['img']);
            $this->assign(['cate'=>$cate,'find'=>$find]);
        }
        return $this->fetch('Cate/update');
    }
    //
    public function ajax(){
        if (request()->isPost()) {
            $name=input('post.name');
            $res=db('pro_category',[],false)->where(['name'=>$name])->find();
          
           if ($res) {
               return 1;
           }
        }
    }

    public function cateajax(){
        if (request()->isPost()) {
            $id=input('post.id');
            $res=db('pro_category',[],false)->where(['pid'=>$id,'is_del'=>0])->select();
          
           if ($res) {
               echo json_encode($res);
           }
        }
    }
}
