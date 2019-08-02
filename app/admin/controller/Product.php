<?php
namespace app\admin\controller;
use think\Controller;
class Product extends Base
{
    public function index()
    {
    	$list=db('product',[],false)->alias('a')->field('a.id,a.name,thumb,time,price,count,b.name cate_name')->join('pro_category b','a.category=b.id')->where(['a.is_del'=>0,'b.is_del'=>0])->order('time desc')->paginate(5);
        $list_copy=$list->toArray();
        foreach ($list_copy['data'] as $key=>$value) {
            $list_copy['data'][$key]['thumb']=explode("|",$value['thumb']);
        }
    	$this->assign('list',$list);
        $this->assign('list_copy',$list_copy['data']);
        return $this->fetch('Product/index');
    }
    //物理删除
    public function delete(){
    	if (request()->isGet()) {
    		$id=input('id');
    		$res=db('product')->delete($id);
    		$this->msg($res,'Product/index');
    	}
    }
    //逻辑删除
    public function luo_del(){
        if (request()->isGet()) {
            $id=input('id');
            $res=db('product')->where('id',$id)->setField('is_del','1');
            $this->msg($res,'Product/index');
        }
    }
    //添加产品
    public function add()
    {
        if (request()->isPost()) {
            $post=input();
            // $thumb=$this->thumb_img($post['img']);
            // $water=$this->water_img($post['img']);
            // $post['thumb']=$thumb;
            // $post['water']=$water;
            $post['time']=date('Y-m-d H:i:s');
            $res=db('product')->insert($post);
            $this->msg($res,'Product/index');
        }else{
            $cate=db('pro_category',[],false)->where(['is_del'=>0])->order('id desc')->select();
            $this->assign('cate',$cate);
        }
        return $this->fetch('Product/add');
    }
    //修改产品
    public function update()
    {
        if (request()->isPost()) {
            $post=input();
            if ($post['img']=='') {
            // $thumb=$this->thumb_img($post['img']);
            // $water=$this->water_img($post['img']);
            // $post['thumb']=$thumb;
            // $post['water']=$water;
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
        return $this->fetch('Product/update');
    }
    //图片上传
    public function ajax(){
        if (request()->isPost()) {
            $upload=$this->upload();
            $thumb=$this->thumb_img($upload);
            $water=$this->water_img($upload);
            return ['info'=>[$upload,$thumb,$water]];
        }
    }
}
