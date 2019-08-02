<?php
namespace app\wp\controller;
use think\Controller;
class Vip extends Base{
    public function index(){
    	$this->check_login();
        return $this->fetch();
    }

    public function password(){
    	$this->check_login();
        $username=session('username');
        $find=db('user',[],false)->where(['is_del'=>0,'username'=>$username])->find();
        $this->assign(['find'=>$find]);
        return $this->fetch('Vip/password');
    }
    public function order(){
        $this->check_login();
        $uid=session('user.id');
        $order=db('order',[],false)->alias('a')->field('a.*,a_name,tel,province,city,area,road')->join('address b','a.address_id=b.id')->where(['a.uid'=>session('user.id'),'a.is_del'=>0])->order('id DESC')->select();
        
        foreach ($order as $k => $v) {
               $arr=json_decode($order[$k]['goods_info'],true);
               $order[$k]['goods_info']=$arr;
            }
        $find=db('address',[],false)->where(['is_del'=>0,'id'=>$order[$k]['address_id']])->find();
        //print_r($find);die;
        $this->assign(['order'=>$order,'find'=>$find]);
        return $this->fetch('Vip/order');
    } 
    public function mycollect(){
        $this->check_login();
        $list=db('collection',[],false)->alias('a')->field('id,name,img,count,price,des,content,gid')->join('product b','a.gid=b.id')->where(['a.uid'=>session('user.id'),'a.is_del'=>0])->paginate(100);

        
        $list_copy=$list->toArray();
        foreach ($list_copy['data'] as $key => $value) {
            $list_copy['data'][$key]['img']=explode("|",$value['img']);
          }

        $this->assign(['list_copy'=>$list_copy]);
        return $this->fetch('Vip/mycollect');
    }
    public function datum(){
        $this->check_login();
        
        return $this->fetch('Vip/datum');
    }
   
}
