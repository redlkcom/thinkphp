<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"E:\webserver\PHPTutorial\WWW\tp5\public/../app/wp\view\balance\index.html";i:1562574295;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>消费记录</title>
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
		<div class="warp clearfloat">
			<header class="top-header">
					<a class="icona" href="javascript:history.go(-1)">
							<img src="images/left.png"/>
						</a>
					<h3>消费记录</h3>
					<a class="iconb" href="shopcar.html">
					</a>
			</header>
			<div class="main clearfloat" id="main">
				<div class="balance clearfloat">
					<div class="top clearfloat box-s">
						<p class="dqian">当前余额</p>
						<p class="price">0.00<span>元</span></p>
						<a href="#" class="ba-btn fl">
							充值
						</a>
					</div>
					<div class="bottom clearfloat mt10 box-s">
						<p class="tit box-s">
							最近30天收支明细
						</p>
						<div class="list fl box-s clearfloat">
							<ul>
								<li class="fl">
									<span class="dsan fl">第三方支付消费</span>
									<span class="time fr">2016-1-02</span>
								</li>
								<li class="fl mt5">
									<span class="yue fl">余额：0.00</span>
									<span class="jiage fr">-26.30</span>
								</li>
							</ul>
						</div>
						<div class="list fl box-s clearfloat">
							<ul>
								<li class="fl">
									<span class="dsan fl">优智源账户充值</span>
									<span class="time fr">2016-1-02</span>
								</li>
								<li class="fl mt5">
									<span class="yue fl">余额：0.00</span>
									<span class="jiage jiage1 fr">+26.30</span>
								</li>
							</ul>
						</div>
						<div class="list fl box-s clearfloat">
							<ul>
								<li class="fl">
									<span class="dsan fl">第三方支付消费</span>
									<span class="time fr">2016-1-02</span>
								</li>
								<li class="fl mt5">
									<span class="yue fl">余额：0.00</span>
									<span class="jiage fr">-26.30</span>
								</li>
							</ul>
						</div>
						<div class="list fl box-s clearfloat">
							<ul>
								<li class="fl">
									<span class="dsan fl">优智源账户充值</span>
									<span class="time fr">2016-1-02</span>
								</li>
								<li class="fl mt5">
									<span class="yue fl">余额：0.00</span>
									<span class="jiage jiage1 fr">+26.30</span>
								</li>
							</ul>
						</div>
						<div class="list fl box-s clearfloat">
							<ul>
								<li class="fl">
									<span class="dsan fl">第三方支付消费</span>
									<span class="time fr">2016-1-02</span>
								</li>
								<li class="fl mt5">
									<span class="yue fl">余额：0.00</span>
									<span class="jiage fr">-26.30</span>
								</li>
							</ul>
						</div>
						<div class="list fl box-s clearfloat">
							<ul>
								<li class="fl">
									<span class="dsan fl">优智源账户充值</span>
									<span class="time fr">2016-1-02</span>
								</li>
								<li class="fl mt5">
									<span class="yue fl">余额：0.00</span>
									<span class="jiage jiage1 fr">+26.30</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
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
