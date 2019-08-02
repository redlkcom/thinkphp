<?php
namespace app\wp\controller;
use think\Controller;
class Balance extends Base
{
    public function index()
    {
    	$list=db('pro_category',[],false)->where(['is_del'=>0,'pid'=>0])->select();
    	$sj_list=db('pro_category',[],false)->where(['is_del'=>0,'pid'=>1])->select();

    	$this->assign(['list'=>$list,'sj_list'=>$sj_list]);
        return $this->fetch('Balance/index');
       
    }
}
