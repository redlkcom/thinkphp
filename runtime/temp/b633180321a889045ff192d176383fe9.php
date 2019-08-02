<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"E:\webserver\PHPTutorial\WWW\tp5\public/../app/wp\view\Cart\index.html";i:1562500327;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>购物车</title>
    <base href="/public/static/wp/">
    <link rel="stylesheet" type="text/css" href="css/loaders.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/loading.css"/>
    <link rel="stylesheet" type="text/css" href="css/base.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
     <script src="js/cart.js" type="text/javascript" charset="utf-8"></script>
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
<input type="hidden" id="url" value="<?php echo url('Cart/ajax'); ?>">
<input type="hidden" id="edit" value="<?php echo url('Cart/edit'); ?>">
<!--loading页结束-->
<body>
	<header class="page-header">
		<h3>购物车</h3>
	</header>
	
	<div class="contaniner fixed-contb">
		<?php if(is_array($cart_list) || $cart_list instanceof \think\Collection || $cart_list instanceof \think\Paginator): $i = 0; $__LIST__ = $cart_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		<section class="shopcar">
			<div class="shopcar-checkbox">
				<label for="shopcar" onselectstart="return false"></label>
				<input type="checkbox" id="shopcar"/>
			</div>
			<figure><img src="/public/Uploads/<?php echo $vo['img']; ?>"/></figure>
			<dl>
				<dt><?php echo $vo['name']; ?></dt>
				<dd>颜色：经典绮丽款</dd>
				<dd>尺寸：L</dd>
				<div class="num">
					<button class="numSub" type="button" key="<?php echo $vo['id']; ?>">-</button>
                    <input class="numValue" type="text" name="" value="<?php echo $vo['num']; ?>">
                    <button class="numAdd" type="button" key="<?php echo $vo['id']; ?>">+</button>
                    <p>库存<?php echo $vo['count']; ?>件</p>
				</div>
				<h3>￥<?php echo $vo['total']; ?></h3>
				<small><img src="images/shopcar-icon01.png"/></small>
			</dl>
		</section>
		<?php endforeach; endif; else: echo "" ;endif; ?>
		<!--去结算-->
		<div style="margin-bottom: 16%;"></div>
		
	</div>
	<script type="text/javascript">
		$(".shopcar-checkbox label").on('touchstart',function(){
			if($(this).hasClass('shopcar-checkd')){
				$(".shopcar-checkbox label").removeClass("shopcar-checkd")
			}else{
				$(".shopcar-checkbox label").addClass("shopcar-checkd")
			}
		})
	</script>
	<footer class="page-footer fixed-footer">
		<div class="shop-go">
			<b>合计：￥108.90</b>
			<span><a href="buy.html">去结算（2）</a></span>
		</div>
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
			<li class="active">
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
<script type="text/javascript">
// 商品数量更改

function setNumFunc( num, config ) {

    ( function ( num ) {

        var maxNum = config && config.maxNum;

        var minNum = config && config.minNum || 1;

        var callbacks = config && config.callbacks || [];

        

        var numVal = num.find( ".numValue" );

        num.find( ".numSub" ).click( function () {

            if( numVal.val() <= minNum ) {

                return;

            }

            numVal.val( parseInt( numVal.val() ) - 1 );

            whenChange();
             $(':input[name="num"]').val( parseInt( numVal.val() ));
            var ajax_url=$('#edit').val();
            var num=parseInt( numVal.val() );
            var id=$(this).attr('key');
            $.ajax({
            type:"POST",
            url:ajax_url,
            data:{'num':num,'id':id},
            success:function(msg){
                
            }
        });

        } );

        

        num.find( ".numAdd" ).click( function () {

            if( numVal.val() >= maxNum ) {
                alert('库存不足');
                return;

            }

            numVal.val( parseInt( numVal.val() ) + 1 );
            whenChange();
            $(':input[name="num"]').val( parseInt( numVal.val() ));
            var ajax_url=$('#edit').val();
            var num=parseInt( numVal.val() );
            var id=$(this).attr('key');
            $.ajax({
            type:"POST",
            url:ajax_url,
            data:{'num':num,'id':id},
            success:function(msg){
                
            }
        });


        } );



        function whenChange() {

            callbacks.forEach( function ( func ) {

                func.call( num, numVal.val() );

            } );

        }



        ( function () {

            var num = 1;

            numVal.blur( function () {

                num = numVal.val();

            } );

            numVal.change( function () {

                if ( isNaN( numVal.val() ) || numVal.val() < minNum || numVal.val() > maxNum ) {

                    numVal.val(num);

                }

                whenChange();

            } );

        } () );

    } ( num, config ) );

    

}
</script>
</html>