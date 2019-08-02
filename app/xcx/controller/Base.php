<?php
namespace app\xcx\controller;
use think\Controller;
class Base extends controller{
public function return_json($data){
    if ($data) {
        $msg['code']=200;
        $msg['list']=$data;
        $msg['msg']='请求成功';
        $msg['wxapp']='1';
    }else{
        $msg['code']=500;
        $msg['list']='';
        $msg['msg']='请求失败';
        $msg['wxapp']='0';
    }
    echo json_encode($msg);
   }
}
