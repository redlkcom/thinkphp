<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"E:\webserver\PHPTutorial\WWW\tp5\public/../app/home\view\User\login.html";i:1564362953;}*/ ?>
<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <base href="/public/static/home/">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/base.css">
    <link rel="stylesheet" type="text/css" href="css/regAndLogin.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="js/localStorage.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/login.js"></script>
</head>

<body>
    <div class="header">
        <div class="top_nav">
            <div class="container">
                <div class="left">
                    <div class="pic">
                        <img src="images/common/header_icon.jpg" alt="">
                    </div>
                    <div>你好，欢迎来到京东！</div>
                    <div class="login"><a href="<?php echo url('User/login'); ?>">登录</a></div>
                    <div class="register"><a href="<?php echo url('User/reg'); ?>">注册</a></div>
                </div>
                <div class="right">
                    <ul>
                        <li><a href="<?php echo url('Vip/index'); ?>">会员中心</a></li>
                        <li>
                            <a href="<?php echo url('Order/index'); ?>">我的订单<img src="images/common/down_icon.png" alt=""></a>
                            <!-- <dl>
                                <dd><a href="order.html">我的订单</a></dd>
                                <dd><a href="order.html">我的订单</a></dd>
                                <dd><a href="order.html">我的订单</a></dd>
                                <dd><a href="order.html">我的订单</a></dd>
                            </dl> -->
                        </li>
                        <li>
                            <a href="#">网站导航<img src="images/common/down_icon.png" alt=""></a>
                            <!-- <dl>
                                <dd><a href="#">网站导航</a></dd>
                                <dd><a href="#">网站导航</a></dd>
                                <dd><a href="#">网站导航</a></dd>
                                <dd><a href="#">网站导航</a></dd>
                            </dl> -->
                        </li>
                        <li><a href="#">手机商城</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="top_content">
            <div class="container">
                <div class="left">
                    <div class="logo">
                        <a href="<?php echo url('Index/index'); ?>"><img src="images/common/logo.jpg" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="line"></div>
        </div>
    </div>
    <div class="middle">
        <div class="container">
            <div class="box clear">
                <div class="left fl">
                    <a href="<?php echo url('Index/index'); ?>"><img src="images/login/pro.jpg" alt=""></a>
                </div>
                <div class="right fl">
                    <div class="title clear">
                        <span>登陆京东</span><span>还没账号？<a href="<?php echo url('User/reg'); ?>">免费注册</a></span>
                    </div>
                    <form action="" method="post" >
                    <div class="input">
                        <label for="">账号：</label><input type="text" id="username" name="username" value="<?php echo \think\Cookie::get('username'); ?>" placeholder="用户名/手机号/邮箱" required>
                    </div>
                    <div class="input">
                        <label for="">密码：</label><input type="password" id="pwd"  name="pwd" value="<?php echo \think\Cookie::get('pwd'); ?>" required placeholder="请输入密码">
                    </div>
                    <div class="input">
                        <label for="">验证码</label><input type="text" name="code" value="" required placeholder="验证码" style="width: 153px;"><img src="<?php echo captcha_src(); ?>"  width="90"  height="34" title="点击换一个" style="vertical-align: middle; margin-top: -4px;" onclick="javascript:this.src=this.src+'?time='+Math.random()"  />
                    </div>
                    <div class="remember">
                        <input type="checkbox" id="rem" name="rem" value="1" <?php if((\think\Cookie::get('username')!='')): ?>checked<?php endif; ?>/><label for="remember">记住密码</label><a href="">忘记密码？</a>
                    </div>
                    <div class="btn">
                        <button id="btn" >立即登录</button>
                    </div>
                    <dl class="clear">
                        <dt>第三方账号登陆：</dt>
                        <dd>
                            <a href="#"><img src="images/login/icon1.jpg" alt=""></a>
                        </dd>
                        <dd>
                            <a href="#"><img src="images/login/icon2.jpg" alt=""></a>
                        </dd>
                        <dd>
                            <a href="#"><img src="images/login/icon3.jpg" alt=""></a>
                        </dd>
                    </dl>
                </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="bottom">
            <div class="container">
                <ul>
                    <li>沪ICP备13044278号</li>
                    <li>合字B1.B2-20130004</li>
                    <li>营业执照</li>
                    <li>互联网药品信息服务资格证</li>
                    <li>互联网药品交易服务资格证</li>
                </ul>
                <div class="copyright">
                    <span>Copyright©  京东饰品商城 2007-2016，All Rights Reserved</span>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- <script src="layui.js"></script>
<script type="text/javascript">
    layui.use('form', function(){
    var form = layui.form;
});
var u=0,p=0;
    $(function () {
    
      //账户验证
      $('#user').blur(function(){
          check_user();
          check_form();
      })
      //密码验证
      $('#pwd').blur(function(){
          check_pwd();
          check_form();
      })
      

  })
    //账户验证
    function check_user(){
        var user=$('#user').val();
        var reg=/^\w{5,12}$/;
        if(!reg.test(user)){
          u=0;
          layer.tips('请输入5-12位字母数字下划线的账户名！','#user',{tips:[3,'#3595cc'],anim:4});
          return false;
        }else{
            u=1;
        }
    }
    //密码验证
    function check_pwd(){
        var pwd=$('#pwd').val();
        var reg=/^\w{5,12}$/;
        if(!reg.test(pwd)){
            p=0;
            layer.tips('请输入5-12位英文字母或数字下划线的密码','#pwd',{tips:[3,'#3595cc'],anim:4});
            return false;
        }else {
            p=1;
        }
    }
    
    function check_form(){
      console.log(u,p,c,e);
        if(u==1&&p==1){
           $('#btn').attr('disabled',false);
        }else {
            $('#btn').attr('disabled',true);
        }
    }
</script> -->
</html>