<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"E:\webserver\PHPTutorial\WWW\tp5\public/../app/wp\view\Cate\details.html";i:1562512953;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>京东商城</title>
    <base href="/public/static/wp/">
    <link rel="stylesheet" type="text/css" href="css/loaders.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/loading.css"/>
    <link rel="stylesheet" type="text/css" href="css/base.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="css/swiper.min.css"/>
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
	<header class="detail-header fixed-header">
		<a href="javascript:history.go(-1)"><img src="images/detail-left.png"/></a>
		
		<a href="<?php echo url('Cart/index'); ?>" class="right"><img src="images/shopbar.png"/></a>
	</header>
	
	
	<div class="contaniner fixed-contb">
		<section class="detail">
			<figure class="swiper-container">
				<ul class="swiper-wrapper">
					<?php if(is_array($find['img']) || $find['img'] instanceof \think\Collection || $find['img'] instanceof \think\Paginator): $i = 0; $__LIST__ = $find['img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<li class="swiper-slide">
						<a href="#">
							<img src="/public/Uploads/<?php echo $vo; ?>"/>
						</a>
					</li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
				<div class="swiper-pagination">
				</div>
			</figure>
			<dl class="jiage">
				<dt>
					<h3><?php echo $find['des']; ?></h3>
					<div class="collect">
						<a class="collection" key="<?php echo $find['id']; ?>">
						<img src="images/detail-heart-hei.png"/>
						<p>收藏</p></a>
					</div>
				</dt>
				<dd>
					<b>￥<?php echo $find['price']; ?></b>
					<del>￥<?php echo $find['price']+200; ?></del>
					<input type="button" value="￥10.00" readonly />
					<small>+<?php echo $find['price']*0.6; ?>积分</small>
				</dd>
			</dl>
			
			<div class="chose">
				<ul>
					<h3>颜色</h3>
					<li>
						黑色
					</li>
					<li>
						粉色
					</li>
					<li>
						灰色
					</li>
					<li>
						红色
					</li>
				</ul>
				<ul>
					<h3>尺寸</h3>
					<li>
						L
					</li>
					<li>
						XL
					</li>
					<li>
						XXL
					</li>
				</ul>
			</div>
			
			<a href="#" class="seven">
				<b>7</b>天无理由退换货
				<span id="sss"></span>
			</a>
			
			<ul class="same">
				
					<span>
						同类推荐
					</span>
					<?php if(is_array($list_copy['data']) || $list_copy['data'] instanceof \think\Collection || $list_copy['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $list_copy['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>"><li class="one">
						<img src="/public/Uploads/<?php echo $vo['img']['0']; ?>"/>
						<p>￥<?php echo $vo['price']; ?></p>
					</li></a>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				
			</ul>
			
			<article class="detail-article">
				<nav>
					<ul class="article">
						<li id="talkbox1" class="article-active">商品详情</li>
						<li id="talkbox2">评价</li>
					</ul>
				</nav>

				<section class="talkbox1">
					<font style="color:red;"><?php echo $find['content']; ?></font>
					<?php if(is_array($find['img']) || $find['img'] instanceof \think\Collection || $find['img'] instanceof \think\Paginator): $i = 0; $__LIST__ = $find['img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<img src="/public/Uploads/<?php echo $vo; ?>"/>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</section>

				<section class="talkbox2" style="display: none;">
					<ul class="talk">
						<li>
							<figure><img src="images/detail-tou.png"/></figure>
							<dl>
								<dt>
									<p>瑾晨</p>
									<time>2015.11.17</time>
									<div class="star">
										<span><img src="images/detail-iocn01.png"/></span>
										<span><img src="images/detail-iocn01.png"/></span>
										<span><img src="images/detail-iocn01.png"/></span>
										<span><img src="images/detail-iocn001.png"/></span>
										<span><img src="images/detail-iocn001.png"/></span>
									</div>
								</dt>
								<dd>哎哟不错哦，很性感哦！</dd>
								<small>颜色：豹纹凯特</small>
							</dl>
						</li>
						<li>
							<figure><img src="images/detail-tou.png"/></figure>
							<dl>
								<dt>
									<p>瑾晨</p>
									<time>2015.11.17</time>
									<div class="star">
										<span><img src="images/detail-iocn01.png"/></span>
										<span><img src="images/detail-iocn01.png"/></span>
										<span><img src="images/detail-iocn01.png"/></span>
										<span><img src="images/detail-iocn001.png"/></span>
										<span><img src="images/detail-iocn001.png"/></span>
									</div>
								</dt>
								<dd>哎哟不错哦，很性感哦！</dd>
								<small>颜色：豹纹凯特</small>
								<div class="picbox">
									<?php if(is_array($find['img']) || $find['img'] instanceof \think\Collection || $find['img'] instanceof \think\Paginator): $i = 0; $__LIST__ = $find['img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
											<span><img src="/public/Uploads/<?php echo $vo; ?>"/></span>
										<?php endforeach; endif; else: echo "" ;endif; ?>
								</div>
							</dl>
						</li>
						<li>
							<figure><img src="images/detail-tou.png"/></figure>
							<dl>
								<dt>
									<p>瑾晨</p>
									<time>2015.11.17</time>
									<div class="star">
										<span><img src="images/detail-iocn01.png"/></span>
										<span><img src="images/detail-iocn01.png"/></span>
										<span><img src="images/detail-iocn01.png"/></span>
										<span><img src="images/detail-iocn001.png"/></span>
										<span><img src="images/detail-iocn001.png"/></span>
									</div>
								</dt>
								<dd>哎哟不错哦，很性感哦！</dd>
								<small>颜色：豹纹凯特</small>
							</dl>
						</li>
						<li>
							<figure><img src="images/detail-tou.png"/></figure>
							<dl>
								<dt>
									<p>瑾晨</p>
									<time>2015.11.17</time>
									<div class="star">
										<span><img src="images/detail-iocn01.png"/></span>
										<span><img src="images/detail-iocn01.png"/></span>
										<span><img src="images/detail-iocn01.png"/></span>
										<span><img src="images/detail-iocn001.png"/></span>
										<span><img src="images/detail-iocn001.png"/></span>
									</div>
								</dt>
								<dd>哎哟不错哦，很性感哦！</dd>
								<small>颜色：豹纹凯特</small>
								<div class="picbox">
									<?php if(is_array($find['img']) || $find['img'] instanceof \think\Collection || $find['img'] instanceof \think\Paginator): $i = 0; $__LIST__ = $find['img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
											<span><img src="/public/Uploads/<?php echo $vo; ?>"/></span>
										<?php endforeach; endif; else: echo "" ;endif; ?>
								</div>
							</dl>
						</li>
					</ul>
				</section>
				
			</article>
		</section>
	</div>
	<form id="mycart" action="<?php echo url('Cart/add'); ?>" method="post">
      <input type="hidden" name="id" value="<?php echo $find['id']; ?>">  
      <input type="hidden" name="name" value="<?php echo $find['name']; ?>"> 
      <input type="hidden" name="price" value="<?php echo $find['price']; ?>"> 
      <input type="hidden" name="num" value="1"> 
      <input type="hidden" name="img" value="<?php echo $find['img']['0']; ?>"> 
      <input type="hidden" name="count" value="<?php echo $find['count']; ?>"> 
    </form>
	
		<footer class="detail-footer fixed-footer">
			<button type="button"  class="car">
				加入购物车
			</button>
			<button type="button" class="buy">立即购买</button>
		</footer>
	
<script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	$(window).scroll(function() {
	    if ($(".detail-header").offset().top > 50) {
        $(".detail-header").addClass("change");
    } else {
        $(".detail-header").removeClass("change");
    }
	});
</script>
<script src="js/swiper.min.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
			var mySwiper = new Swiper('.swiper-container',{
				    loop: true,
				    speed:1000,
					autoplay: 2000,
					pagination: '.swiper-pagination',
				  });
		})
	</script>
<script type="text/javascript">
	$(function(){
		$('.chose li').click(function(){
				
			$(this).addClass('chose-active').siblings().removeClass('chose-active');

			var tags=document.getElementsByClassName('chose-active');//获取标签

			var tagArr = "";
	        for(var i=0;i < tags.length; i++)
	        {
	            tagArr += tags[i].innerHTML;//保存满足条件的元素

	        }
	       
	        $('#sss').html(tagArr);

		});

		$('.article li').click(function(){

			$(this).addClass('article-active').siblings().removeClass('article-active');
			if($(this).attr("id")=="talkbox1"){
				$('.talkbox1').show();
				$('.talkbox2').hide();
			}else{
				$('.talkbox2').show();
				$('.talkbox1').hide();
			}

		});	
	});

	//购物车按钮

    $( ".car" ).click( function () {
        // 获取商品库存
        var count_num=parseInt($('#count').attr('count'));
        if (count_num==0) {
            alert('库存不足');
            return false;
        }
        // 获取商品数量

        var count = parseInt( $( ".numValue" ).val() );

        // 按钮效果

        var span = $( "<span> +" + count + "</span>" );

        span.css( { "position": "absolute", "left": "50%", "margin-left": "-11.5px" } );

        $(this).append( span );

        span.animate( 

            { 

                "margin-top": "-100px", "opacity": 0 }, 

                "slow", 

                function () {

                span.remove();

            } );

        $("#mycart").submit();

        // 数据存储

        // saveShopData();

        // setBubbleNum();

    } );





    // 立即购买按钮

     $( ".buy" ).click( function () { 

         // saveShopData();

         // window.location.pathname = "/shop_cart.html";
        var count_num=parseInt($('#count').attr('count'));
        if (count_num==0) {
            alert('库存不足');
            return false;
        }
        $("#mycart").append('<input type="hidden" name="nowbuy" value="1">');
        $("#mycart").submit();
     } );

     function setBubbleNum() {

        var shopCar = $( '.header .bubble' );

        shopCar.text( window.shopCar.getNum() );

     }
</script>
<script type="text/javascript">
    $(function(){
        $('.collection').click(function(){
            var id=$(this).attr('key');
            $.ajax({
            type:"POST",
            url:"<?php echo url('Cart/collection'); ?>",
            data:"id="+id,
            success:function(msg){
                switch(Number(msg)){
                    case 0:
                    alert('您还未登录');
                    break;
                    case 1:
                    alert('您已收藏改商品');
                    break;
                    case 2:
                    alert('收藏成功');
                    break;
                }
            }
           });
        })
        
    })
    </script>
</body>
</html>