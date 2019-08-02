<?php
namespace app\home\controller;
use think\Controller;
class Beau extends Base
{
    public function index()
    {
    	
       $list=db('product',[],false)->where(['is_del'=>0,'category'=>15])->paginate(5);
       
        $this->assign('list',$list);
        return $this->fetch('Beau/index');
       
    }
}
