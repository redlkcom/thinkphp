<?php
namespace app\admin\controller;
use think\Controller;
class Order extends Base
{
    public function index()
    {
        $this->check_login();
    	$list=db('order',[],false)->alias('a')->field('a.id,order_num,sumtotal,username,`status`,time')->join('user b','a.uid=b.id')->where(['a.is_del'=>0,'b.is_del'=>0])->order('a.time desc')->paginate(5);
    	$this->assign('list',$list);
        return $this->fetch('Order/index');
    }
    //物理删除
    public function delete(){
    	if (request()->isGet()) {
    		$id=input('id');
    		$res=db('order')->delete($id);
    		$this->msg($res,'index');
    	}
    }
    //逻辑删除
    public function luo_del(){
        if (request()->isGet()) {
            $id=input('id');
            $res=db('order')->where('id',$id)->setField('is_del','1');
            $this->msg($res,'index');
        }
    }
    
    //修改产品
    public function update()
    {
        if (request()->isPost()) {
            $post=input();
            $res=db('admin',[],false)->update($post);
            $this->msg($res,'index');
        }else{
            $id=input('id');
            $find=db('order',[],false)->where(['is_del'=>0,'id'=>$id])->find();
            $find['goods_info']=json_decode($find['goods_info'],true);


            $username=$find['uid'];
            $user=db('user',[],false)->where(['id'=>$username])->find();
            //print_r($find['goods_info']);die;

            $ads=$find['address_id'];
            $address=db('address',[],false)->where(['id'=>$ads])->find();
            $res=db('address',[],false)->alias('a')->field('a.*,b.province p_name,c.city c_name,d.area d_name')->join('province b','a.province=b.provinceid')->join('cities c','a.city=c.cityid')->join('area d','a.area=d.areaid')->where(['a.is_del'=>0,'a.id'=>$ads])->find();

            $this->assign(['find'=>$find,'user'=>$user,'res'=>$res]);

        }
        return $this->fetch('Order/update');
    }
    
}
