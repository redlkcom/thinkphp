<?php
namespace app\home\controller;
class Api extends Base
{
    public function index()
    {
    	$list=db('product',[],false)->alias('a')->field('a.id,a.name,pid,img,thumb,count,price,des,content,b.name p_name')->join('pro_category b','a.category=b.id')->where(['a.is_del'=>0,'b.is_del'=>0])->paginate(20);

        $list_copy=$list->toArray();
    	foreach ($list_copy['data'] as $key => $value) {
	        $list_copy['data'][$key]['thumb']=explode("|",$value['thumb']);
	      }
	    return json($list_copy);
    }
    public function banner(){
    	$list=db('product',[],false)->alias('a')->field('a.id,a.name,pid,img,count,price,des,content,b.name p_name')->join('pro_category b','a.category=b.id')->where(['a.is_del'=>0,'pid'=>1])->paginate(10);

    	
        $list_copy=$list->toArray();
    	foreach ($list_copy['data'] as $key => $value) {
	        $list_copy['data'][$key]['img']=explode("|",$value['img']);
	      }
	      
	      return json($list_copy);
    }
}
