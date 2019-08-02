<?php
namespace app\wp\controller;
use think\Controller;
class Cate extends Base
{
    public function index()
    {
        $cate_id=input('id');
        $list=db('product',[],false)->where(['is_del'=>0,'category'=>$cate_id])->paginate(5);
    	$find=db('pro_category',[],false)->where(['is_del'=>0,'id'=>$cate_id])->find();

        $list_copy=$list->toArray();
        foreach ($list_copy['data'] as $key => $value) {
            $list_copy['data'][$key]['img']=explode("|",$value['img']);
          }

        $this->assign('list_copy',$list_copy['data']);
    	$this->assign(['list'=>$list,'find'=>$find]);
        return $this->fetch('Cate/index');
    }
    
    public function details()
    {
        $id=input('id');

        

    	$find=db('product',[],false)->where(['is_del'=>0,'id'=>$id])->find();
        $find['img']=explode('|',$find['img']);
    
        $xin=db('product',[],false)->alias('a')->field('a.id,a.name,pid,img,count,price,des,content,b.name p_name')->join('pro_category b','a.category=b.id')->where(['a.is_del'=>0,'pid'=>1])->paginate(4);

      
        $list_copy=$xin->toArray();
          foreach ($list_copy['data'] as $key => $value) {
              $list_copy['data'][$key]['img']=explode("|",$value['img']);
            }

        $this->assign(['find'=>$find,'list_copy'=>$list_copy]);
    	
        return $this->fetch('Cate/details');
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
}
