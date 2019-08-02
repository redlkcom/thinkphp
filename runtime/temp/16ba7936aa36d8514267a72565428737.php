<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"E:\webserver\PHPTutorial\WWW\tp5\public/../app/wp\view\Address\index.html";i:1562572723;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
         <meta name="format-detection" content="telephone=no" />
    <title>地址管理</title>
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
	<header class="top-header fixed-header">
		<a class="icona" href="javascript:history.go(-1)">
				<img src="images/left.png"/>
			</a>
		<h3>地址管理</h3>
			
			<a class="text-top" href="<?php echo url('Address/add'); ?>">
				添加
			</a>
	</header>
	
	<div class="contaniner fixed-conta">
		<?php if(is_array($res) || $res instanceof \think\Collection || $res instanceof \think\Paginator): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		<dl class="address">
			
				<dt>
					<p><?php echo $vo['a_name']; ?></p>
					<span><?php echo $vo['tel']; ?></span>
					<small><?php if(($vo['curruct']==1)): ?>默认<?php endif; ?></small>
				</dt>
				<dd><?php echo $vo['p_name']; ?><?php echo $vo['c_name']; ?><?php echo $vo['d_name']; ?><?php echo $vo['road']; ?></dd>
			
		</dl>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	
	
	
	

</body>
</html>