<?php
namespace app\home\controller;
use think\Controller;
class Lover extends Base
{
    public function index()
    {
    	
    	$list=db('product',[],false)->alias('a')->field('a.id,a.name,pid,img,count,price,des,content,b.name p_name')->join('pro_category b','a.category=b.id')->where(['a.is_del'=>0,'pid'=>1])->paginate(10);

    	
        $list_copy=$list->toArray();
    	foreach ($list_copy['data'] as $key => $value) {
	        $list_copy['data'][$key]['img']=explode("|",$value['img']);
	      }

        $this->assign(['list_copy'=>$list_copy,'list'=>$list]);
       
        return $this->fetch('Lover/index');
       
    }
}
