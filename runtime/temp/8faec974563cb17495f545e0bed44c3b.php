<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"E:\webserver\PHPTutorial\WWW\tp5\public/../app/wp\view\Cart\confirm.html";i:1562584663;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    
        <meta name="format-detection" content="telephone=no" />
    <title>立即购买</title>
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
			<h3>去结算</h3>
			<a class="iconb" href="shopcar.html">
			</a>
	</header>
	
	<div class="contaniner fixed-cont">
		<section class="to-buy">
			<header>
				<div class="now">
					<span><img src="images/map-icon.png"/></span>
						<dl>
							<dt>
								<b>瑾晨</b>
								<strong>13035059860</strong>
							</dt>
							<dd>安徽省合肥市XXXXXXXX</dd>
							<p>其他地址</p>
						</dl>
				</div>
				
				<div class="to-now">
					<div class="tonow">
							<label for="tonow"  onselectstart="return false" ></label>
							<input type="checkbox" id="tonow"/>
					</div>
					<dl>
							<dt>
								<b>瑾晨</b>
								<strong>13035059860</strong>
							</dt>
							<dd>安徽省合肥市XXXXXXXX</dd>
					</dl>
					<h3><a href="go-address.html"><img src="images/write.png"/></a></h3>
				</div>
			</header>
			<div class="buy-list">
                <?php if(is_array($cart_list) || $cart_list instanceof \think\Collection || $cart_list instanceof \think\Paginator): $i = 0; $__LIST__ = $cart_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<ul>
					<a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>">
						<figure>
							<img src="/public/Uploads/<?php echo $vo['img']; ?>"/>
						</figure>
						<li>
							<h3><?php echo $vo['name']; ?></h3>
							<span>
								颜色：经典绮丽款
								<br />
								尺寸：M
							</span>
							<b>￥<?php echo $vo['price']; ?></b>
							<small></small>
						</li>
					</a>
				</ul>
                <?php endforeach; endif; else: echo "" ;endif; ?>
				
				<dl>
					<dd>
						<span>运费</span>
						<small>包邮</small>
					</dd>
					<dd>
						<span>商品总额</span>
						<small>￥<?php echo \think\Session::get('sumtotal'); ?></small>
					</dd>
					<dt>
						<textarea rows="4" placeholder="给卖家留言（50字以内）"></textarea>
					</dt>
				</dl>
			</div>
			
		</section>
		<!--底部不够-->
		<div style="margin-bottom: 9%;"></div>
	</div>
	
	<footer class="buy-footer fixed-footer">
			<p> 
				<small>总金额</small>
				<b>￥<?php echo \think\Session::get('sumtotal'); ?></b>
			</p>
				
				<form method="post" action="<?php echo url('Pay/alipay'); ?>">
                        <input type="hidden" name="WIDout_trade_no" value="<?php echo $order['order_num']; ?>">
                        
                        <button class="btn" id="submitOrder" >支付宝支付</button>
                        </form>
                        <button class="btn" type="button" onclick="aa()" id="submitOrder" style="background-color: green;">微信支付</button>
	</footer>
	
	<script type="text/javascript">
		$(".to-now .tonow label").on('touchstart',function(){
			if($(this).hasClass('ton')){
				$(".to-now .tonow label").removeClass("ton")
			}else{
				$(".to-now .tonow label").addClass("ton")
			}
		})
	</script>
   <script type="text/javascript">
   	  var res = '';
        //调用微信JS api 支付
        function jsApiCall()
        {
            WeixinJSBridge.invoke(
                'getBrandWCPayRequest',
                 res,
                function(res){
                    WeixinJSBridge.log(res.err_msg);
                    alert(res.err_code+res.err_desc+res.err_msg);
                }
            );
        }

        function callpay()
        {
            if (typeof WeixinJSBridge == "undefined"){
                if( document.addEventListener ){
                    document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
                }else if (document.attachEvent){
                    document.attachEvent('WeixinJSBridgeReady', jsApiCall);
                    document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
                }
            }else{
                jsApiCall();
            }
        }
        function aa(){
              
        }
    </script>
</body>
</html>