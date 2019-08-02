<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"E:\webserver\PHPTutorial\WWW\tp5\public/../app/wp\view\asort\index.html";i:1562497680;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>分类</title>
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
<body style="background-color: #fff;">
	<header class="page-header fixed-header">
		<input type="search"  /> 
		<span>
			<img src="images/serach.png"/>
		</span>
	</header>
	
	<div class="contaniner fixed-cont">
		<aside class="assort">
			<ul>
				<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<li  class="active">
					<img src="images/classify01.png"/>
					<span><?php echo $vo['name']; ?></span>
				</li>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</aside>
		
		<section class="assort-cont">
			<figure>
				<a href="#">
					<img src="images/classify-ph01.png"/>
				</a>
			</figure>
			<dl>
				<dt>手机专区</dt>
				<?php if(is_array($sj_list) || $sj_list instanceof \think\Collection || $sj_list instanceof \think\Paginator): $i = 0; $__LIST__ = $sj_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<dd>
					<a href="<?php echo url('Cate/index',['id'=>$vo['id']]); ?>">
						<img src="images/classify-ph02.png"/>
						<p><?php echo $vo['name']; ?></p>
					</a>
				</dd>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</dl>
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
			<li class="active">
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
			<li>
				<a href="<?php echo url('Vip/index'); ?>">
					<img src="images/footer004.png"/>
					<p>个人中心</p>
				</a>
			</li>
		</ul>
	</footer>
	
	
</body>
</html>