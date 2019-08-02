<?php
namespace app\xcx\controller;
use think\Controller;
class Cart extends Base{
    public function add()    {
    
    	$data['gid']=input('gid');
        $data['openid']=input('openid');
        $res=db('xcxcart')->insert($data);
        
        $this->return_json($res);
    
 }
    public function index(){
        $data['openid']=input('openid');
        $res=db('xcxcart',[],false)->where($data)->select();
        foreach ($res as $key => $value) {
            $pro_one=db('good',[],false)->field('id,name,pic,price')->where(['id'=>$value['gid']])->find();
            $pro_one['num']=$value['num'];
            $pro_list[]=$pro_one;
        }
        $this->return_json($pro_list);
    }
    //购物车数量
    public function edit(){
        $data['gid']=input('gid');
        $data['openid']=input('openid');
         $up_date['num']=input('num');
         $res=db('xcxcart')->where($data)->update($up_date);
         $this->return_json($res);
    }
}