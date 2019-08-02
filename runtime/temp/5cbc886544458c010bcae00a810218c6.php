<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"E:\webserver\PHPTutorial\WWW\tp5\public/../app/wp\view\Vip\mycollect.html";i:1562513997;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>我的收藏</title>
    <base href="/public/static/wp/">
    <link rel="stylesheet" type="text/css" href="css/loaders.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/loading.css"/>
    <link rel="stylesheet" type="text/css" href="css/base.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
      <script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
      <script type="text/javascript" src="js/jaliswall.js"></script>
    <script type="text/javascript">
    	$(window).load(function(){
    		$(".loading").addClass("loader-chanage")
    		$(".loading").fadeOut(300);
    		$('.wall').jaliswall({ item: '.pic' });
    		
    		$(".text-top").on("touchstart",function(){
    			$(".collectbar").fadeToggle(500);
    		});
    		
    	})
    	
    	
    	function mycheck(val)
		{
			if($("#collect"+val).is(':checked'))
			{
				$(".label"+val).addClass("collectd");
				$(".collectbox").fadeIn(300)
				$(".kong").fadeIn()
			}
			else
			{
				$(".label"+val).removeClass("collectd");
				$(".collectbox").fadeOut(300)
				$(".kong").fadeOut()
			}
		}
    	
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
		<h3>我的收藏</h3>
			
			<a class="text-top">
				编辑
			</a>
	</header>
	
	<div class="contaniner fixed-conta">
		<div style="margin-top: 3%;"></div>
		<section class="list">
			<ul class="wall">
				<?php if(is_array($list_copy['data']) || $list_copy['data'] instanceof \think\Collection || $list_copy['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $list_copy['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<li class="pic">
					<a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>">
						<img src="/public/Uploads/<?php echo $vo['img']['0']; ?>"/>
						<p><?php echo $vo['name']; ?></p>
						<b>￥<?php echo $vo['price']; ?></b><del>￥<?php echo $vo['price']+200; ?></del>
						<div class="collectbar">
							<label for="collect1"  onselectstart="return false" class="label1"></label>
							<input type="checkbox" onclick="mycheck(1)" id="collect1"/>
						</div>
					</a>
				</li>
				<?php endforeach; endif; else: echo "" ;endif; ?>
				
			</ul>
		</section>
		<div class="kong" style="margin-bottom: 16%;"></div>
	</div>
	
<footer class="collectbox fixed-footer">
	
	<input type="button" value="确认删除" />
</footer>

	
	

</body>
</html>