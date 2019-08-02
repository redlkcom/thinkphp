<?php
namespace app\xcx\controller;
use think\Controller;
class Product extends Base{
    public function index()    {
    	$list =db('good')->field('g.id,g.name,g.price,g.pic,c.name as cname')->alias('g')->Join('gid c','c.id = g.cid')->where(['c.id'=>2])->limit(10)->select();
        $best =db('good')->field('g.id,g.name,g.price,g.pic,c.name as cname')->alias('g')->Join('gid c','c.id = g.cid')->where(['c.id'=>11])->paginate(20);
        $banner =db('good')->field('g.id,g.name,g.price,g.pic,c.name as cname')->alias('g')->Join('gid c','c.id = g.cid')->where(['c.id'=>3])->paginate(4);
        
 
        $this->return_json(['list'=>$list,'best'=>$best,'banner'=>$banner]);
    }
    public function show(){
        $id=input('id');
        $info=db('good',[],false)->where(['id'=>$id])->find();
        
        $this->return_json($info);
    }
    
}
