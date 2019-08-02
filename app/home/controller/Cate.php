<?php
namespace app\home\controller;
use think\Controller;
class Cate extends Base
{
    public function index()
    {
        $cate_id=input('id');
    	$list=db('product',[],false)->where(['is_del'=>0,'category'=>$cate_id])->paginate(5);

        $list_copy=$list->toArray();
        foreach ($list_copy['data'] as $key => $value) {
        	$list_copy['data'][$key]['thumb']=explode("|", $value['thumb']);
        }
        $this->assign('list_copy',$list_copy['data']);
    	$this->assign(['list'=>$list]);
        return $this->fetch('Cate/index');
    }
    
    public function details()
    {
        $id=input('id');

        

    	$find=db('product',[],false)->where(['is_del'=>0,'id'=>$id])->find();
        $find['img']=explode('|',$find['img']);
        
        $look_list=db('product',[],false)->where(['is_del'=>0,'category'=>7])->paginate(3);
        $list_copy_look=$look_list->toArray();
        foreach ($list_copy_look['data'] as $key => $value) {
            $list_copy_look['data'][$key]['img']=explode("|",$value['img']);
          }

        $hot_list=db('product',[],false)->where(['is_del'=>0])->paginate(8);
        $list_copy_hot=$hot_list->toArray();
        foreach ($list_copy_hot['data'] as $key => $value) {
            $list_copy_hot['data'][$key]['img']=explode("|",$value['img']);
          }

        $this->assign(['find'=>$find,'list_copy_look'=>$list_copy_look,'list_copy_hot'=>$list_copy_hot]);
    	
        return $this->fetch('Cate/details');
    }
}
