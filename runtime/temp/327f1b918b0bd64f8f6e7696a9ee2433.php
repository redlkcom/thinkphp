<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"E:\webserver\PHPTutorial\WWW\tp5\public/../app/wp\view\vip\datum.html";i:1562574748;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>个人资料</title>
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
			<a class="icona" href="javascript:history.go(-1)">
					<img src="images/left.png"/>
				</a>
			<h3>我的资料</h3>
			<a class="iconb" href="shopcar.html">
			</a>
	</header>
	
	<div class="contaniner">
		<ul class="self-data">
			<li>
				<a href="javascript:void(0)">
					<p>头像</p>
					<span><img src="images/right.png"/></span>					
					<figure><img src="images/detail-tou.png"/></figure>
				</a>
			</li>
			<li>
				<a href="javascript:void(0)">
					<p>昵称</p>
					<span><img src="images/right.png"/></span>
					<small><?php echo \think\Session::get('user.username'); ?></small>
					
				</a>
			</li>
			<li>
				<a href="javascript:void(0)">
					<p>性别</p>
					<span><img src="images/right.png"/></span>
					<select>
						<option>男</option>
						<option>女</option>
					</select>
					
				</a>
			</li>
		</ul>
	</div>
	
	
	
	

</body>
</html>