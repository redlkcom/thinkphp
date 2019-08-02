<?php
namespace app\admin\controller;
use think\Controller;
class Banner extends Base
{
    public function index()
    {
    	$list=db('banner',[],false)->where(['is_del'=>0])->paginate(15);
    	$this->assign('list',$list);
        return $this->fetch('Banner/index');
    }
    //物理删除
    public function delete(){
    	if (request()->isGet()) {
    		$id=input('id');
    		$res=db('banner')->delete($id);
    		$this->msg($res,'banner/index');
    	}
    }
    //逻辑删除
    public function luo_del(){
        if (request()->isGet()) {
            $id=input('id');
            $res=db('banner')->where('id',$id)->setField('is_del','1');
            $this->msg($res,'banner/index');
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
            $res=db('banner')->insert($post);
            $this->msg($res,'banner/index');
        }
        return $this->fetch('Banner/add');
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
            $res=db('banner')->update($post);
            $this->msg($res,'banner/index');
        }else{
            $id=input('id');
            $cate=db('pro_category',[],false)->where(['is_del'=>0])->order('id desc')->select();
            $find=db('banner',[],false)->where(['is_del'=>0,'id'=>$id])->find();
            $find['img']=explode("|",$find['img']);
            $this->assign(['cate'=>$cate,'find'=>$find]);
        }
        return $this->fetch('Banner/update');
    }
    //图片上传
    public function ajax(){
        $res=$this->upload();
        if ($res) {
            echo json_encode(['info'=>$res]);
        }
    }
}
