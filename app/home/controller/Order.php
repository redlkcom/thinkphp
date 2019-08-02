<?php
namespace app\home\controller;
class Order extends Base
{
    public function index()
    {
    	$this->check_login();
    	$order=db('order',[],false)->alias('a')->field('a.*,a_name,tel,province,city,area,road')->join('address b','a.address_id=b.id')->where(['a.uid'=>session('user.id'),'status'=>1])->order('id DESC')->find();
        if (!isset($_SESSION['order_buy'])) {
            $order['goods_info']=json_decode($order['goods_info'],true);
        }else{
            $arr[]=json_decode($order['goods_info'],true);
            $order['goods_info']=$arr;
        }
    	
    	$prov=db('province',[],false)->where(['provinceid'=>$order['province']])->find();
    	$city=db('cities',[],false)->where(['cityid'=>$order['city']])->find();
    	$area=db('area',[],false)->where(['areaid'=>$order['area']])->find();
    	$this->assign(['order'=>$order,'prov'=>$prov,'city'=>$city,'area'=>$area]);
        return $this->fetch('Order/index');
    }

    public function add()
    {
    	$this->check_login();
    	$order['order_num']=time().mt_rand(111111,999999);
    	$order['sumtotal']=session('sumtotal');
    	$order['num']=session('num');
    	$order['address_id']=session('address');
    	$order['uid']=session('user.id');
    	$order['status']=1;
    	$order['time']=time();
         if (isset($_SESSION['order_buy'])) {
             $order['goods_info']=json_encode($_SESSION['order_buy']);
         }else{
            
                  $cart=db('cart',[],false)->alias('a')->field('a.*,b.name,b.price,b.count')->join('product b','a.pro_id=b.id')->where(['uid'=>session('user.id'),'a.is_del'=>0])->select();
                  if ($cart=='') {
                    $cart=[];
                  }else{
                    foreach ($cart as $key => $value) {
                      $cart[$key]['total']=$value['num']*$value['price'];
                    } 
                }
                if (isset($_SESSION['order'])) {
                $cart=array_merge($cart,$_SESSION['order']);
                }
               
                $order['goods_info']=json_encode($cart);
            if (isset($_SESSIO
                ['order'])) {                
              $order['goods_info']=json_encode($_SESSION['order']);
            }
      }
    	$res=db('order',[],false)->insert($order);
    	if ($res) {
            unset($_SESSION['order']);
                    unset($_SESSION['order_buy']);
                    unset($_SESSION['num']);
                    unset($_SESSION['sumtotal']);
                    unset($_SESSION['address']);
    		$this->success('订单提交成功','index');
    	}else{
    		$this->error('订单提交失败');
    	}
        
    }
  }  
    

