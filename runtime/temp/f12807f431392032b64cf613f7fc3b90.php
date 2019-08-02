<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"E:\webserver\PHPTutorial\WWW\tp5\public/../app/home\view\address\index.html";i:1561539030;s:65:"E:\webserver\PHPTutorial\WWW\tp5\app\home\view\Public\header.html";i:1562287717;s:65:"E:\webserver\PHPTutorial\WWW\tp5\app\home\view\Public\footer.html";i:1560819925;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <base href="/public/static/home/">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/base.css">
     <link rel="stylesheet" href="css/layui.css">
    <script src="js/jquery.js"></script>
    <script src="js/slidebanner.js"></script>
    <script src="js/common.js"></script>
    <script src="js/car.js"></script>
    
</head>

<body>
    <div class="header">
        <div class="top_nav">
            <div class="container">
                <div class="left">
                    <div class="pic">
                        <img src="images/common/header_icon.jpg" alt="">
                    </div>
                    <?php if(\think\Session::get('user')==""): ?>
                    <div>你好，欢迎来到京东商城！</div>
                    <div class="login"><a href="<?php echo url('User/login'); ?>">登录</a></div>
                    <div class="register"><a href="<?php echo url('User/reg'); ?>">注册</a></div>
                    <?php else: ?>
                    <div>你好<fount style="color: red;"><?php echo \think\Session::get('user.username'); ?></fount>欢迎来到京东商城！</div>
                    <div class="login"><a href="<?php echo url('User/logout'); ?>">注销</a></div>
                    <?php endif; ?>
                </div>
                <div class="right">
                    <ul>
                        <li><a href="<?php echo url('Vip/index'); ?>">会员中心</a></li>
                        <li>
                            <a href="<?php echo url('Vip/order'); ?>">我的订单<img src="images/common/down_icon.png" alt=""></a>
                            <!-- <dl>
                                <dd><a href="order.html">我的订单</a></dd>
                                <dd><a href="order.html">我的订单</a></dd>
                                <dd><a href="order.html">我的订单</a></dd>
                                <dd><a href="order.html">我的订单</a></dd>
                            </dl> -->
                        </li>
                        <li>
                            <a href="#">网站导航<img src="images/common/down_icon.png" alt=""></a>
                            <!-- <dl>
                                <dd><a href="#">网站导航</a></dd>
                                <dd><a href="#">网站导航</a></dd>
                                <dd><a href="#">网站导航</a></dd>
                                <dd><a href="#">网站导航</a></dd>
                            </dl> -->
                        </li>
                        <li><a href="#">手机商城</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="top_content">
            <div class="container">
                <div class="left">
                    <div class="logo">
                        <a href="<?php echo url('Index/index'); ?>"><img src="images/common/logo.jpg" alt=""></a>
                    </div>
                </div>
                <div class="center">
                    <div class="search">
                        <input type="text" name="name" value="" placeholder="请输入关键词：">
                        <input type="button" name="name" value="搜索">
                    </div>
                    <ul class="list">
                        <li><a href="shop_list.html">小米</a></li>
                        <li><a href="shop_list.html">华为</a></li>
                        <li><a href="shop_list.html">联想</a></li>
                        <li><a href="shop_list.html">oppo</a></li>
                        <li><a href="shop_list.html">一加</a></li>
                        <li><a href="shop_list.html">iphone</a></li>
                    </ul>
                </div>
                <div class="right">
                    <div class="cart">
                        <div class="pic">
                            <img src="images/common/car_icon.png" alt="">
                        </div>
                        <div class="text">
                            <a href="<?php echo url('Cart/index'); ?>">购物车</a>
                        </div>
                        <div class="bubble">
                            <span><?php if((\think\Session::get('count')!='')): ?><?php echo \think\Session::get('count'); else: ?>0<?php endif; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="navBar">
            <div class="container">
                <div class="left">
                    <h1>全部商品分类<img src="images/common/nav_icon.png" alt=""></h1>
                    <ul>
                       <?php if(is_array($nav_list) || $nav_list instanceof \think\Collection || $nav_list instanceof \think\Paginator): $i = 0; $__LIST__ = $nav_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <li><a href="<?php echo url('Cate/index',['id'=>$vo['id']]); ?>"><?php echo $vo['name']; ?></a></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
                <div class="right">
                    <div class="nav">
                        <ul>
                            <?php if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): $i = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <li><a href="<?php echo url($vo['class_name']); ?>"><?php echo $vo['menu_name']; ?></a></li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <link rel="stylesheet" type="text/css" href="css/shop_cart.css">
    <link rel="stylesheet" type="text/css" href="css/address.css">

    <script src="js/address.js"></script>
<input type="hidden" id="url" value="<?php echo url('ajax'); ?>">
    <div class="middle">
        <div class="container">
            <div class="head">
                <div class="title fl">
                    地址页
                </div>
                <div class="head-bar fr">
                    <ul>
                        <li class="on first">
                            <div class="box">
                                <div class="bar"></div>
                                <div class="radio"><span>1</span></div>
                            </div>
                            <p>我的购物车</p>
                        </li>
                        <li class="on ">
                            <div class="box">
                                <div class="bar"></div>
                                <div class="radio"><span>2</span></div>
                            </div>
                            <p>确认订单</p>
                        </li>
                        <li class="on active">
                            <div class="box">
                                <div class="bar"></div>
                                <div class="radio"><span>3</span></div>
                            </div>
                            <p>确认地址</p>
                        </li>
                        <li class="last">
                            <div class="box">
                                <div class="bar"></div>
                                <div class="radio"><span>4</span></div>
                            </div>
                            <p>提交订单</p>
                        </li>
                    </ul>
                </div>
            </div>
            <form method="post" action="<?php echo url('address/add'); ?>" id="address_add">
            <div class="content">
                <h1>已有地址</h1>
                <ul class="clear" id="addressList">
                    <?php if(is_array($res) || $res instanceof \think\Collection || $res instanceof \think\Paginator): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li>
                        <p>姓名：<?php echo $vo['a_name']; ?></p>
                        <p>电话：<?php echo $vo['tel']; ?></p>
                        <p>地址：<?php echo $vo['p_name']; ?><?php echo $vo['c_name']; ?><?php echo $vo['d_name']; ?><?php echo $vo['road']; ?></p>
                        <div>
                            <a class="<?php if(($vo['curruct']==1)): ?>choose<?php endif; ?> choseBtn" key=<?php echo $vo['id']; ?>>选择</a><a class="del" key=<?php echo $vo['id']; ?>>删除</a>
                        </div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                
                <h1>新增地址</h1>
                <label for=""><b>*</b>姓名：</label>
                <input id="name" name="a_name" type="text" placeholder="姓名" required><b>姓名不能为空</b><br>
                <label for=""><b>*</b>电话：</label>
                <input id="phone" type="tel" name="tel" placeholder="电话" required><b>电话不能为空</b><br>
                <label for=""><b>*</b>所在地区：</label>
                <select name="province" id="province">
                    <option>请选择所在省</option>
                    <?php if(is_array($province) || $province instanceof \think\Collection || $province instanceof \think\Paginator): $i = 0; $__LIST__ = $province;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $vo['provinceid']; ?>" ><?php echo $vo['province']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select><b>省市不能为空</b>

                <select name="city" id="city">
                    <option>请选择所在市</option>
                </select><b>市不能为空</b>

                <select name="area" id="area">
                    <option value="">请选择所在区</option>
                </select><b>区不能为空</b><br>

                <label for="detailAddress">
                    <b>*</b>详细地址：</label>
                    <input id="detailAddress" type="text" placeholder="详细地址" name="road" required><b>详细地址不能为空</b>
                <div class="defaultAddress">
                    <label >
                        <input id="defaultAddress" type="checkbox" value="">
                        <span>设为默认地址</span>
                    </label>
                </div>
                
                <input type="submit" class="btn" id="saveAddress" value="保存收货地址">
                <div class="submit">
                    <a id="confirmBtn" href="<?php echo url('Order/add'); ?>">确认地址</a>
                </div>
            </div>
            </form>
        </div>
    </div>
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
                var l='<option value="">请选择所在市</option>';
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
                var l='<option value="">请选择所在区</option>';
                for (var i=0;i<msg.length;i++) {
                    l+='<option value="'+msg[i].areaid+'">'+msg[i].area+'</option>';
                }
                $('#area').append(l);
            }
           });
        })

    })
    </script>
 <div class="footer">
        <div class="top">
            <div class="container">
                <ul>
                    <li><img src="images/common/icon1.png" alt=""><span>类型多样，轻松购物</span></li>
                    <li><img src="images/common/icon2.png" alt=""><span>极速物流，快速送达</span></li>
                    <li><img src="images/common/icon3.png" alt=""><span>正品行货，精致服务</span></li>
                    <li><img src="images/common/icon4.png" alt=""><span>天天优惠，购物无忧</span></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <ul>
                    <li>
                        <h3><a href="#">关于我们</a></h3>
                        <dl>
                            <dd><a href="#">品牌介绍</a></dd>
                            <dd><a href="#">市场合作</a></dd>
                            <dd><a href="#">诚聘英才</a></dd>
                            <dd><a href="#">联系我们</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><a href="#">关于我们</a></h3>
                        <dl>
                            <dd><a href="#">品牌介绍</a></dd>
                            <dd><a href="#">市场合作</a></dd>
                            <dd><a href="#">诚聘英才</a></dd>
                            <dd><a href="#">联系我们</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><a href="#">关于我们</a></h3>
                        <dl>
                            <dd><a href="#">品牌介绍</a></dd>
                            <dd><a href="#">市场合作</a></dd>
                            <dd><a href="#">诚聘英才</a></dd>
                            <dd><a href="#">联系我们</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><a href="#">关于我们</a></h3>
                        <dl>
                            <dd><a href="#">品牌介绍</a></dd>
                            <dd><a href="#">市场合作</a></dd>
                            <dd><a href="#">诚聘英才</a></dd>
                            <dd><a href="#">联系我们</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><a href="#">关于我们</a></h3>
                        <dl>
                            <dd><a href="#">品牌介绍</a></dd>
                            <dd><a href="#">市场合作</a></dd>
                            <dd><a href="#">诚聘英才</a></dd>
                            <dd><a href="#">联系我们</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>
        <div class="bottom">
            <div class="container">
                <div class="flag"></div>
                <ul>
                    <li>沪ICP备13044278号</li>
                    <li>合字B1.B2-20130004</li>
                    <li>营业执照</li>
                    <li>互联网药品信息服务资格证</li>
                    <li>互联网药品交易服务资格证</li>
                </ul>
                <div class="copyright">
                    <span>Copyright©  蓝水晶饰品商城 2007-2016，All Rights Reserved</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>