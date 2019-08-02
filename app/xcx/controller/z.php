<?php
//最大值

$num=array(10,20,35,50,45,32,18);
$max=$num[0];
for($i=1;$i<count($num);$i++){
    if($num[$i]>$max){
        $max=$num[$i];
    }
}
echo '数组中最大的数为：'.$max;
?>

cookie和session的区别
	cookie数据存放在客户的浏览器上，session数据放在服务器上
	cookie不是很安全，别人可以分析存放在本地的cookie并进行cookie欺骗，考虑*到安全应当使用session
	session会在一定时间内保存在服务器上，当访问增多，会比较占用你服务器的性能，考虑到减轻服务器性能方面，应当使用cookie
	单个cookie保存的数*据不能超过4K，很多浏览器都限制一个站点最多保存20个cookie
	建议将登录信息等重要信息存放为session，其他信息如果需要保留，可以放在cookie中
	session保存在服务器，客户端不知道其中的信心；cookie保存在客户端，服务器能够知道其中的信息
	session中保存的是对象，cookie中保存的是字符串
	session不能区分路径，同一个用户在访问一个网站期间，所有的session在任何一个地方都可以访问到，而cookie中如果设置了路径参数，那么同一个网站中不同路径下的cookie互相是访问不到的


get和post
	最直接的区别，GET请求的参数是放在URL里的，POST请求参数是放在请求body里的；
	GET请求的URL传参有长度限制，而POST请求没有长度限制；
	GET请求的参数只能是ASCII码，所以中文需要URL编码，而POST请求传参没有这个限制；

include() 函数会生成一个警告（但是脚本会继续执行），而 require() 函数会生成一个致命错误（fatal error）（在错误发生后脚本会停止执行）。

		if (request()->isPost()) {
            $post=input();
            $find=db('user',[],false)->where(['is_del'=>0,'username'=>$post['user'],'pwd'=>md5($post['pwd'])])->find();
            $this->return_json($find);
        }

