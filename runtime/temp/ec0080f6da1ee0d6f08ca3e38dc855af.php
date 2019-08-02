<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:71:"E:\webserver\PHPTutorial\WWW\tp5\public/../app/home\view\vip\order.html";i:1561972678;s:65:"E:\webserver\PHPTutorial\WWW\tp5\app\home\view\Public\header.html";i:1562287717;s:65:"E:\webserver\PHPTutorial\WWW\tp5\app\home\view\Public\footer.html";i:1560819925;}*/ ?>
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
    <link rel="stylesheet" type="text/css" href="css/member.css">
    <link rel="stylesheet" type="text/css" href="css/sub_nav.css">
    <link rel="stylesheet" type="text/css" href="css/order.css">

    <script src="js/order.js"></script>
 
    <div class="middle">
        <div class="container clear">
            <div class="sub-nav fl">
                <dl>
                    <dt><a >订单中心</a></dt>
                    <dd class="on"><a href="order.html">我的订单</a></dd>
                    <dd><a href="#">团购订单</a></dd>
                    <dd><a href="#">我的预售</a></dd>
                    <dd><a href="#">评价晒单</a></dd>
                    <dd><a href="#">取消订单记录</a></dd>
                </dl>
            </div>
            <div class="content fl">
                <h1>我的订单</h1>
                <div class="box">
                    <div class="search">
                        <input type="text" name="" value="" placeholder="请输入商品名称丶订单号"><button type="">搜索</button>
                    </div>
                    <div class="top-nav">
                        <span class="on" >全部订单</span>
                        <span >待付款</span>
                        <span >待收货</span>
                        <span >待评价<i>1</i></span>
                        <span >订单回收站</span>
                    </div>
                    <div class="tab">
                        <div class="thead">
                            <h2 class="fl">今年订单<img src="images/common/down_icon.png" alt=""></h2>
                            <span>订单详情</span>
                            <span>收货人</span>
                            <span>总计</span>
                            <span>全部状态<img src="images/common/down_icon.png" alt=""></span>
                            <span>操作</span>
                        </div>
                        <div class="tbody">
                            <?php if(is_array($order) || $order instanceof \think\Collection || $order instanceof \think\Paginator): $i = 0; $__LIST__ = $order;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <div class="item clear">
                                <p><?php echo date('Y-m-d H:i:s',$vo['time']); ?><span></span>订单号：<?php echo $vo['order_num']; ?></p>
                                <div class="clear fl">
                                    <?php if(is_array($vo['goods_info']) || $vo['goods_info'] instanceof \think\Collection || $vo['goods_info'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['goods_info'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?>
                                     <div class="info fl">
                                        <a href="<?php echo url('home/Cate/details',['id'=>$vv['id']]); ?>"><img class="fl" src="/public/Uploads/<?php echo $vv['img']; ?>" alt=""></a>
                                        <p class="fl"><a href="<?php echo url('home/Cate/details',['id'=>$vv['id']]); ?>"><?php echo $vv['name']; ?></a></p>
                                        <span class="num fl">x<?php echo $vv['num']; ?></span>
                                        <p><?php switch($vo['status']): case "1": ?>未支付<?php break; case "2": ?>待发货<?php break; case "3": ?>待收货<?php break; case "4": ?>待评价<?php break; case "5": ?>交易完成<?php break; default: ?>default
                                        <?php endswitch; ?></p>
                                    </div>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                                <div>
                                    <div class="table">
                                        <?php echo $find['a_name']; ?>
                                    </div>
                                </div>
                                <div>
                                    <div class="table">
                                        ￥<?php echo $vo['sumtotal']; ?><br>
                                        <?php echo $vo['num']; ?>
                                    </div>
                                </div>
                                <div class="sm-font">
                                    <div class="table">
                                        <p class="state">
                                        <?php switch($vo['status']): case "1": ?>未支付<?php break; case "2": ?>待发货<?php break; case "3": ?>待收货<?php break; case "4": ?>待评价<?php break; case "5": ?>交易完成<?php break; default: ?>default
                                        <?php endswitch; ?>
                                        </p>
                                        <a href="#">订单详情</a>
                                    </div>
                                </div>
                                <div class="sm-font">
                                    <div class="table">
                                        <p><?php switch($vo['status']): case "1": ?><font style="color: #ffb800"><a href="<?php echo url('home/Cate/details',['id'=>$vv['id']]); ?>">立即购买</a></font><?php break; case "2": ?><font style="color: #ff5722">待发货</font><?php break; case "3": ?>代收货<?php break; case "4": ?><a href="#">评价晒单</a><?php break; case "5": ?>交易完成<?php break; endswitch; ?></p>
                                        
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        <div class="bottom-nav">
                            <a href="#">上一页</a>
                            <span><b>1</b>/10</span>
                            <a href="#" class="on">下一页</a>
                        </div>
                    </div>
                    <div class="tab">

                    </div>
                    <div class="tab">
                        
                    </div>
                    <div class="tab">
                        
                    </div>
                    <div class="tab">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
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