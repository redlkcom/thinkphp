<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"E:\webserver\PHPTutorial\WWW\tp5\public/../app/wp\view\address\add.html";i:1562571702;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>地址添加</title>
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
<input type="hidden" id="url" value="<?php echo url('ajax'); ?>">
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
		<h3>男装专区</h3>
			
			<a class="text-top" >
			</a>
	</header>
	
	<div class="contaniner fixed-conta">
		<form action="<?php echo url('address/add'); ?>" method="post" class="change-address" id="address_add">
			<ul>
				<li>
					<label class="addd">收货人：</label>
					<input id="name" name="a_name" type="text" placeholder="姓名" required/>
				</li>
				<li>
					<label class="addd">手机号：</label>
					<input id="phone" type="tel" name="tel" placeholder="电话" required/>
				</li>
				<li>
					<label class="addd">所在地区：</label>
					<select name="province" id="province">
                    <option>所在省</option>
                    <?php if(is_array($province) || $province instanceof \think\Collection || $province instanceof \think\Paginator): $i = 0; $__LIST__ = $province;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $vo['provinceid']; ?>" ><?php echo $vo['province']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
	                </select>

					<select name="city" id="city">
	                    <option>所在市</option>
	                </select>

	                <select name="area" id="area">
	                    <option value="">所在区</option>
	                </select>
				</li>
				<li>
					<label class="addd">详细地址：</label>
					<textarea id="detailAddress" type="text" placeholder="详细地址" name="road" required></textarea>
				</li>
			</ul>
			
			<ul>
				<li class="checkboxa">
					<input id="defaultAddress" type="checkbox" id="check"/>
					<label class="check" for="check" onselectstart="return false"  >设置为默认地址</label>
				</li>
			</ul>
			<ul>
				<li>
					<h3>删除此地址</h3>
				</li>
			</ul><input type="submit" class="btn" id="saveAddress" value="保存收货地址">
			<input type="submit" class="btn" id="saveAddress" value="保存" />
		</form>
	</div>
	
	<script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		$(".checkboxa label").on('touchstart',function(){
			if($(this).hasClass('checkd')){
				$(".checkboxa label").removeClass("checkd");
			}else{
				$(".checkboxa label").addClass("checkd");
			}
		})
	</script>
	<script type="text/javascript">
    $(function(){
        $('#province').change(function(){
            $('#city').empty();
            var pro_val=$('#province').val();
            $.ajax({
            type:"POST",
            url:"<?php echo url('pro_ajax'); ?>",
            data:"pro_code="+pro_val,
            dataType:'json',
            success:function(msg){
                var l='<option value="">所在市</option>';
                for (var i=0;i<msg.length;i++) {
                    l+='<option value="'+msg[i].cityid+'">'+msg[i].city+'</option>';
                }
                $('#city').append(l);
            }
           });
        })
        $('#city').change(function(){
            $('#area').empty();
            var city_val=$('#city').val();
            $.ajax({
            type:"POST",
            url:"<?php echo url('city_ajax'); ?>",
            data:"city_code="+city_val,
            dataType:'json',
            success:function(msg){
                var l='<option value="">所在区</option>';
                for (var i=0;i<msg.length;i++) {
                    l+='<option value="'+msg[i].areaid+'">'+msg[i].area+'</option>';
                }
                $('#area').append(l);
            }
           });
        })

    })
    </script>

</body>
</html>