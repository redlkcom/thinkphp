<?php
namespace app\xcx\controller;
use think\Controller;
class Order extends Base{
    public function add(){
        if (request()->isGet()) {
            $post=input();
            $post['order_num']='xcx_'.mt_rand(1111,9999).time();
            $post['time']=time();
            $gg=html_entity_decode($post['goods_info']);
            $post['goods_info']=$gg;
            $res=db('xcxorder')->insert($post);
            $this->return_json($res);
        }
    }

    public function index(){
        $openid=input('openid');
        $res=db('xcxorder')->where(['openid'=>$openid,'is_del'=>0])->select();
        foreach ($res as $key => $value) {
            $res['key']['goods_info']=json_decode($value['goods_info'],true);
        }

        print_r($res);die;
        $this->return_json($res);
    }

}