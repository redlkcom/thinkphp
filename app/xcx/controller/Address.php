<?php
namespace app\xcx\controller;
use think\Controller;
class Address extends Base{
    public function index(){
        $openid=input('openid');
        $res=db('xcxaddress',[],false)->alias('a')->field('a.*,b.province p_name,c.city c_name,d.area d_name')->join('province b','a.province=b.provinceid')->join('cities c','a.city=c.cityid')->join('area d','a.area=d.areaid')->where(['is_del'=>0,'openid'=>$openid])->select();
        // $find=db('xcxaddress',[],false)->where(['is_del'=>0,'openid'=>session('user.id'),'curruct'=>1])->find();
        // session('address',$find['id']);
        //$province=db('province',[],false)->select();
        foreach ($res as $key => $value) {
            $res[$key]['address']=$value['p_name'].$value['c_name'].$value['d_name'].$value['road'];
        }
        
        $this->return_json($res);
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