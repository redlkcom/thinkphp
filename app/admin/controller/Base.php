<?php
namespace app\admin\controller;
use think\Controller;
class Base extends controller
{
    public function _initialize(){
    	//parent::__construct();
    	if (!session('?user')) {
    		$this->redirect('User/login');
    	}else{
            define('CONTROLLER_NAME',strtolower(request()->controller()));
            $con=db('menu',[],false)->where(['is_del'=>0,'class_name'=>CONTROLLER_NAME.'/index'])->find();
            if (!in_array($con['id'],session('level'))&&CONTROLLER_NAME!='index') {
                $this->error('非法操作','User/logout');
            }
            $nav_list=db('menu',[],false)->where(['is_del'=>0,'type'=>0,'pid'=>0])->select();
            foreach ($nav_list as $key => $value) {
                $child_list=db('menu',[],false)->where(['is_del'=>0,'type'=>0,'pid'=>$value['id']])->select();
                $nav_list[$key]['child']=$child_list;
            }
            $menu_list=db('menu',[],false)->where(['is_del'=>0,'type'=>0,'pid'=>['neq',0]])->select();
            $this->assign(['menu_list'=>$menu_list,'nav_list'=>$nav_list]);
        }
    }
    //验证登录
    public function check_login(){
        if (!session('?user')) {
            $this->redirect('User/login');
        }
    }
    //提示信息
    public function msg($res,$url){
    	if ($res) {
    	$this->success('操作成功',$url);
    	}else{
    		$this->error('操作失败');
    	}
    }
    //上传图片
    public function upload($upload='file',$size='2097152',$type='jpg,png,gif,jpeg'){
    	$file=request()->file($upload);
    	if ($file) {
    		$info=$file->validate(['size'=>$size,'ext'=>$type])->move(ROOT_PATH.'public'.DS.'Uploads');
    		if ($info) {
    			
    			return $info->getSaveName();
    		}else{
    			return $file->getError();
    		}
    	}
    }
    //缩略图
    public function thumb_img($post){
    	$dir=$this->create_dir($post);
        $dir[3]->thumb(150,150)->save($dir[0].$dir[1]);
    	return $dir[2].'/'.$dir[4].'/'.$dir[1];
    }
    //图片水印
    public function water_img($post,$alpha=50){
        $dir=$this->create_dir($post,'water');
        
        $dir[3]->water(ROOT_PATH.'public/Uploads/water.png',\think\Image::WATER_CENTER,$alpha)->save($dir[0].$dir[1]);
        return $dir[2].'/'.$dir[4].'/'.$dir[1];
    }
    //创建路径
    public function create_dir($post,$dir='thumb'){
        $start=strrpos($post,'.');
        $houzhui=substr($post, $start);
        $date=substr($post,0,8);   
        $image=\think\Image::open(ROOT_PATH.'public/Uploads/'.$post);
        $path=ROOT_PATH.'public'.DS.'Uploads/'.$date.'/'.$dir.'/';
        $name=$dir.'_'.time().mt_rand(1111,99999).$houzhui;
        if (!file_exists($path)) {
            mkdir($path);
        }
        return [$path,$name,$date,$image,$dir];
    }
}
