<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"E:\webserver\PHPTutorial\WWW\tp5\public/../app/wp\view\User\login.html";i:1562502214;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>登录</title>
    <base href="/public/static/wp/">
    <link rel="stylesheet" type="text/css" href="css/loaders.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/loading.css"/>
    <link rel="stylesheet" type="text/css" href="css/base.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
      <script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
    	$(window).load(function(){
    		$(".loading").addClass("loader-chanage")
    		$(".loading").fadeOut(300)
    	})
    </script>
</head>
<!--loading页开始-->
<div class="loading">
	<div class="loader">
        <div class="loader-inner pacman">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
	</div>
</div>
<!--loading页结束-->
<body>
	<header class="top-header">
		<a class="text texta" href="<?php echo url('Index/index'); ?>">取消</a>
		<h3>登录</h3>
		<a class="text" href="<?php echo url('User/reg'); ?>">注册</a>
	</header>
	
	<div class="login">
		<form action="" method="post" >
			<ul>
				<li>
					<img src="images/login.png"/>
					<label>账号</label>
					<input type="text" id="username" name="username" value="<?php echo \think\Cookie::get('username'); ?>" placeholder="用户名/手机号/邮箱" required/>
				</li>
				<li>
					<img src="images/password.png"/>
					<label>密码</label>
					<input type="password" id="pwd"  name="pwd" value="<?php echo \think\Cookie::get('pwd'); ?>" required placeholder="请输入密码"/>
				</li>
				<li >
					<input type="text" name="code" value="" required placeholder="验证码" style="width: 140px;">
					<img src="<?php echo captcha_src(); ?>"  width="290"  height="34" title="点击换一个" style="margin-left: 100px; width: 110px;" onclick="javascript:this.src=this.src+'?time='+Math.random()"  />
				</li>
			</ul>
			<button class="button" id="btn" >立即登录</button>
		</form>
	</div>

</body>
</html>