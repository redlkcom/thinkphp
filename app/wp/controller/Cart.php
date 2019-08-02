<?php
namespace app\wp\controller;
use think\Controller;
use pay\wx\Pay;
class Cart extends Base
{
    public function add(){
      //session('user',null);die;
        if (request()->isPost()) {
           $id=input('id');
           $now=input('nowbuy');
           if (!session('?user')&&!isset($now)) {
              $_SESSION['order'][$id]['id']=$id;
              $_SESSION['order'][$id]['name']=input('name');
              $_SESSION['order'][$id]['price']=input('price');
              $_SESSION['order'][$id]['num']=input('num');
              $_SESSION['order'][$id]['img']=input('img');
              $_SESSION['order'][$id]['count']=input('count');
              $_SESSION['order'][$id]['total']=$_SESSION['order'][$id]['price']*$_SESSION['order'][$id]['num'];
              $this->redirect('index');
            }else if(isset($now)){
              $_SESSION['order_buy'][0]['id']=$id;
              $_SESSION['order_buy'][0]['name']=input('name');
              $_SESSION['order_buy'][0]['price']=input('price');
              $_SESSION['order_buy'][0]['num']=input('num');
              $_SESSION['order_buy'][0]['img']=input('img');
              $_SESSION['order_buy'][0]['count']=input('count');
              $_SESSION['order_buy'][0]['total']=$_SESSION['order_buy'][0]['price']*$_SESSION['order_buy'][0]['num'];
              $this->redirect('Cart/confirm',['id'=>$id]);
            }else{
              $post['pro_id']=$id;
              $post['num']=input('num');
              $post['img']=input('img');
              $post['uid']=session('user.id');
              $res=db('cart',[],false)->insert($post);
              if ($res) {
                $this->redirect('index');
              }
            }
        
        }
        
        
      }
      //购物车列表
      public function index(){
        if (!session('?user')&&isset($_SESSION['order'])) {
           $cart=$_SESSION['order'];
           session('count',count($_SESSION['order']));

        }else if(session('?user')){
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
        }else{
          $cart=[];
        }
        $this->assign('cart_list',$cart);
        return $this->fetch('Cart/index');
      }
      //删除购物车产品
      public function delete(){
        $id=input('id');
        unset($_SESSION['order'][$id]);
        $this->redirect('index');
      }
      //批量删除购物车产品
      public function ajax(){
        $id=input('id');
        unset($_SESSION['order'][$id]);
      }
      //修改购物车数据
      public function edit(){
        $id=input('id');
        $_SESSION['order'][$id]['num']=input('num');
        $_SESSION['order'][$id]['total']=$_SESSION['order'][$id]['price']*$_SESSION['order'][$id]['num'];
      }
       //商品收藏
      public function collection(){
        $msg=null;
        if (!session('?user')) {
          $msg=0;
        }else{
          $id=input('id');
          $uid=session('user.id');
          $res=db('collection',[],false)->where(['is_del'=>0,'uid'=>$uid,'gid'=>$id])->find();
          if ($res) {
            $msg=1;
          }else{
            $data['uid']=session('user.id');
            $data['gid']=$id;
            $result=db('collection',[],false)->insert($data);
            if ($result) {
              $msg=2;
            }
          }
        }
        echo $msg;
      }
      public function confirm(){
        $this->check_login();
        $id=input('id');
        if (request()->isPost()) {
          $total=substr(input('sumtotal'),3);
          $num=input('num');
          
          if(session('?user')){
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
          $this->assign(['cart_list'=>$cart]);
        }else if (!session('?user')&&isset($_SESSION['order'])) {
          $this->assign(['cart_list'=>$_SESSION['order']]); 
        }
        }else{
          $total=$_SESSION['order_buy'][0]['total'];
          $num=$_SESSION['order_buy'][0]['num'];
          $arr[]=$_SESSION['order_buy'][0];
          $this->assign(['cart_list'=>$arr]);
        }
        session('sumtotal',$total);
        session('num',$num);

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




      $this->assign(['order'=>$order,'prov'=>$prov,'city'=>$city,'res'=>'','area'=>$area]);
        return $this->fetch('Cart/confirm');
      }

      public function aa(){
        $pay = new Pay();
        $res = $pay->getRes();
        return $res;
      }
}
