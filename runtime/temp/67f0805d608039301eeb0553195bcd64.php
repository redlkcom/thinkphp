<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"E:\webserver\PHPTutorial\WWW\tp5\public/../app/wp\view\Vip\order.html";i:1562576449;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>我的订单</title>
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
		<h3>全部订单</h3>
			<a class="iconb" href="shopcar.html">
			</a>
	</header>
	
	<div class="contaniner fixed-conta">
		<section class="order">
			<?php if(is_array($order) || $order instanceof \think\Collection || $order instanceof \think\Paginator): $i = 0; $__LIST__ = $order;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<dl>
				<dt>
					<time><?php echo date('Y-m-d H:i:s',$vo['time']); ?></time>
					<span><?php switch($vo['status']): case "1": ?>未支付<?php break; case "2": ?>待发货<?php break; case "3": ?>待收货<?php break; case "4": ?>待评价<?php break; case "5": ?>交易完成<?php break; default: ?>default
                                        <?php endswitch; ?></span>
				</dt>
				<ul>
					<?php if(is_array($vo['goods_info']) || $vo['goods_info'] instanceof \think\Collection || $vo['goods_info'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['goods_info'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?>
					<a href="<?php echo url('Cate/details',['id'=>$vv['id']]); ?>">
						<figure><img src="/public/Uploads/<?php echo $vv['img']; ?>"/></figure>
						<li>
							<p><?php echo $vv['name']; ?></p>
							<small>颜色：经典绮丽款</small>
							<span>尺寸：XL</span>
							<b>￥<?php echo $vv['price']; ?></b>
							<strong>×<?php echo $vv['num']; ?></strong>
						</li>
					</a>
				</ul>
				<dd>
					<h3>商品总额</h3>
					<i>￥<?php echo $vo['sumtotal']; ?></i>
				</dd>
				<?php endforeach; endif; else: echo "" ;endif; ?>
				<dd>
					<input type="button" value="确认收货" class="order-que"/>
					<input type="button" value="查看物流"  />
					<input type="button" value="取消订单" />
				</dd>
			</dl>
			<?php endforeach; endif; else: echo "" ;endif; ?>
			
		</section>
	</div>
	
	
	
	

</body>
</html>