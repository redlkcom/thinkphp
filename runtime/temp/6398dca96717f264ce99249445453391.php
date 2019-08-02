<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"E:\webserver\PHPTutorial\WWW\tp5\public/../app/wp\view\vip\index.html";i:1562576659;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>个人中心</title>
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
	<!--<header class="self-header">
		<figure><img src="images/self-tou.png"/></figure>
		<dl>
			<dt>瑾晨</dt>
			<dd>
				<img src="images/self-header.png"/>
				<span>5684</span>
				<span>炒饭大湿</span>
			</dd>
		</dl>
		<button>签到</button>
	</header>-->

	<div class="p-top  clearfloat">
		<a href="<?php echo url('Vip/datum'); ?>">
			<div class="tu">
				<img src="img/touxiang.png"/>
			</div>
			<p class="name"><?php echo \think\Session::get('user.username'); ?></p>
		</a>
		<div class="p-bottom p-bottom1 clearfloat">
			<ul class="clearfloat">
				<a href="javascript:void(0)">
					<li class="box-s">
						<span class="opa6"></span>
						<p class="bt">我的佣金</p>
						<p class="price">0.00</p>
					</li>
				</a>
				<a href="javascript:void(0)">
					<li class="box-s">
						<span class="opa6"></span>
						<p class="bt">我的积分</p>
						<p class="price">0</p>
					</li>
				</a>
				<a href="javascript:void(0)">
					<li class="box-s">
						<span class="opa6"></span>
						<p class="bt">我的足迹</p>
						<p class="price">0</p>
					</li>
				</a>
			</ul>
		</div>
	</div>
	
	<div class="contaniner fixed-contb">
		<section class="self">
			<dl>
				<dt>
					<a href="<?php echo url('Vip/order'); ?>">
						<img src="images/self-icon.png"/>
						<b>全部订单</b>
						<span><img src="images/right.png"/></span>
					</a>
				</dt>
				<dd>
						<ul>
							<li>
								<a href="<?php echo url('Vip/order'); ?>">
									<img src="images/order-icon01.png"/>
									<p>待发货</p>
								</a>
							</li>
							<li>
								<a href="<?php echo url('Vip/order'); ?>">
									<img src="images/order-icon03.png"/>
									<p>待付款</p>
								</a>
							</li>
							<li>
								<a href="<?php echo url('Vip/order'); ?>">
									<img src="images/order-icon02.png"/>
									<p>待收货</p>
								</a>
							</li>
							<li>
								<a href="<?php echo url('Vip/order'); ?>">
									<img src="images/order-icon04.png"/>
									<p>待评价</p>
								</a>
							</li>
						</ul>
				</dd>
			</dl>
			
			<ul class="self-icon">
				<li>
					<a href="<?php echo url('Vip/datum'); ?>">
						<img src="images/self-icon01.png"/>
						<p>个人信息</p>
						<span><img src="images/right.png"/></span>
					</a>
				</li>
				<li>
					<a href="<?php echo url('Vip/mycollect'); ?>">
						<img src="images/self-icon02.png"/>
						<p>我的收藏</p>
						<span><img src="images/right.png"/></span>
					</a>
				</li>
				<li>
					<a href="<?php echo url('Balance/index'); ?>">
						<img src="images/self-icon012.png"/>
						<p>消费记录</p>
						<span><img src="images/right.png"/></span>
					</a>
				</li>
				<li>
					<a href="<?php echo url('Address/index'); ?>">
						<img src="images/self-icon04.png"/>
						<p>地址管理</p>
						<span><img src="images/right.png"/></span>
					</a>
				</li>
			</ul>
			<ul class="self-icon">
				<li>
					<a href="javascript:void(0)">
						<img src="images/self-icon05.png"/>
						<p>我的分销</p>
						<span><img src="images/right.png"/></span>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<img src="images/self-icon011.png"/>
						<p>修改密码</p>
						<span><img src="images/right.png"/></span>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<img src="images/self-icon013.png"/>
						<p>账号绑定</p>
						<span><img src="images/right.png"/></span>
					</a>
				</li>
			</ul>
			<a href="<?php echo url('User/logout'); ?>"><input type="button" value="退出" /></a>
			
		</section>
		
		
	</div>
	
	<footer class="page-footer fixed-footer">
		<ul>
			<li>
				<a href="<?php echo url('Index/index'); ?>">
					<img src="images/footer01.png"/>
					<p>首页</p>
				</a>
			</li>
			<li>
				<a href="<?php echo url('Asort/index'); ?>">
					<img src="images/footer002.png"/>
					<p>分类</p>
				</a>
			</li>
			<li>
				<a href="<?php echo url('Cart/index'); ?>">
					<img src="images/footer003.png"/>
					<p>购物车</p>
				</a>
			</li>
			<li  class="active">
				<a href="<?php echo url('Vip/index'); ?>">
					<img src="images/footer004.png"/>
					<p>个人中心</p>
				</a>
			</li>
		</ul>
	</footer>
	
	
</body>
</html>