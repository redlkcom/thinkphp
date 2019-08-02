<?php
namespace app\home\controller;
use think\Controller;
class Index extends Base
{
    public function index()
    {
    	
       $ban_list=db('banner',[],false)->where(['is_del'=>0])->paginate(5);

       $x_list=db('product',[],false)->where(['is_del'=>0])->order('time asc')->paginate(5);
       $list_copy_x=$x_list->toArray();
        foreach ($list_copy_x['data'] as $key => $value) {
            $list_copy_x['data'][$key]['img']=explode("|",$value['img']);
          }

       $r_list=db('product',[],false)->where(['is_del'=>0,'category'=>13])->paginate(5);
       $list_copy_r=$r_list->toArray();
        foreach ($list_copy_r['data'] as $key => $value) {
            $list_copy_r['data'][$key]['img']=explode("|",$value['img']);
          }

       $q_list=db('product',[],false)->where(['is_del'=>0,'category'=>5])->paginate(5);
       $list_copy_q=$q_list->toArray();
        foreach ($list_copy_q['data'] as $key => $value) {
            $list_copy_q['data'][$key]['img']=explode("|",$value['img']);
          }
       
      $jiadian=$this->get_cate_goods(2);
      $shouji=$this->get_cate_goods(1);

        $this->assign(['ban_list'=>$ban_list,'list_copy_x'=>$list_copy_x,'list_copy_r'=>$list_copy_r,'list_copy_q'=>$list_copy_q,'jiadian'=>$jiadian,'shouji'=>$shouji]);
        return $this->fetch('Index/index');
       
    }
    //按照不同需求进行查询
    public function get_pro_list($order='',$num=5,$category=""){
      $where['is_del']=0;
      if ($category!='') {
        $where['category']=$category;
      }
      $list=db('product',[],false)->where($where)->order($order)->limit($num)->select();
      foreach ($list as $key => $value) {
        $list[$key]['img']=explode("|",$value['img']);
      }
      return $list;
    }
    //获取大分类下子分类所有商品
    public function get_cate_goods($cate_id=1){
      $jia_child_id=$this->getSubIds($cate_id);
      $list=db('product',[],false)->alias('a')->field('a.id,a.name,price,img,b.name cate_name')->join('pro_category b','a.category=b.id')->where(['a.is_del'=>0,'category'=>['in',$jia_child_id]])->select();
      foreach ($list as $key => $value) {
        $list[$key]['img']=explode("|",$value['img']);
      }
      return $list;
    }
    public function get_childs($data,$pid=0,$key='child'){
      $tree=[];
      foreach ($data as $val) {
        if ($val['pid']==$pid) {
          $tree[]=[
              'id'=>$val['id'],
              'name'=>$val['name'],
              'pid'=>$val['pid'],
              $key=>$this->get_childs($data,$val['id'])
          ];
        }
      }
      return $tree;
    }
    //执行函数
    public function getSubIds($id=0){
      $data=db('pro_category',[],false)->where(['is_del'=>0])->select();
      $res=$this->get_all_child($data,$id);
      $res[]=$id;
      return $res;
    }
    //递归函数
    public function get_all_child($array,$id){
      $arr= array();
      foreach ($array as $v) {
        if ($v['pid']==$id) {
          $arr[]=$v['id'];
          $arr=array_merge($arr,$this->get_all_child($array,$v['id']));
        };
      };
      return $arr;
    }
}
