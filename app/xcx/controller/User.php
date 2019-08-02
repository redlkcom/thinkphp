<?php
namespace app\xcx\controller;
use think\Controller;
class User extends Base{
    public function login()    {
        $code = $_REQUEST['code'];//获取code
        $appid ="wx922f81ee71eb8b78";
        $secret = "f531dc6ac1d626ba4be3d0c82e9dc08e";
        $url = "https://api.weixin.qq.com/sns/jscode2session?appid=$appid&secret=$secret&js_code=$code&grant_type=authorization_code";
        //通过code换取网页授权access_token
        $weixin =  file_get_contents($url);
        $jsondecode = json_decode($weixin); //对JSON格式的字符串进行编码
        $array = get_object_vars($jsondecode);//转换成数组
        $openid = $array['openid'];//输出openid
        return $openid;
    
    }

    public function reg()    {
        if (request()->isPost()) {
            $post=input();
            $find=db('user')->where(['username'=>$post['username']])->find();
            if ($find) {
                $res='';
                
            }else{
                unset($post['cpwd']);
                $res=db('user')->insert($post);
            }
            $this->return_json($res);
        }
    }
    
    public function openid(){
        $code = input("code");//获取code
        $appid ="wx922f81ee71eb8b78";
        $secret = "f531dc6ac1d626ba4be3d0c82e9dc08e";
        $url = "https://api.weixin.qq.com/sns/jscode2session?appid={$appid}&secret={$secret}&js_code={$code}&grant_type=authorization_code";

        $str=httppost($url);
        $this->return_json($str);
        //通过code换取网页授权access_token
        // $weixin =  file_get_contents($url);
        // $jsondecode = json_decode($weixin); //对JSON格式的字符串进行编码
        // $array = get_object_vars($jsondecode);//转换成数组
        // $openid = $array['openid'];//输出openid
        // return $openid;
    }
}
