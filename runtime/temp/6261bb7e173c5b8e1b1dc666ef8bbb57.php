<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"E:\webserver\PHPTutorial\WWW\tp5\public/../app/home\view\order\index.html";i:1561622898;s:65:"E:\webserver\PHPTutorial\WWW\tp5\app\home\view\Public\header.html";i:1562287717;s:65:"E:\webserver\PHPTutorial\WWW\tp5\app\home\view\Public\footer.html";i:1560819925;}*/ ?>
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
    <link rel="stylesheet" type="text/css" href="css/guessYouLike.css">
    <link rel="stylesheet" type="text/css" href="css/shop_cart.css">
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <link rel="stylesheet" type="text/css" href="css/confirm_order.css">
    <link rel="stylesheet" type="text/css" href="css/submit_order.css">
 
    <script src="js/loadShopData.js"></script>
    <script src="js/submit_order.js"></script>
    <script src="js/guess.js"></script>

    <div class="middle">
        <div class="container">
            <div class="head">
                <div class="title fl">
                    提交订单<a href="<?php echo url('Cart/index'); ?>">返回购物车修改</a>
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
                        <li class="on">
                            <div class="box">
                                <div class="bar"></div>
                                <div class="radio"><span>3</span></div>
                            </div>
                            <p>确认地址</p>
                        </li>
                        <li class="last on active">
                            <div class="box">
                                <div class="bar"></div>
                                <div class="radio"><span>4</span></div>
                            </div>
                            <p>提交订单</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="content">
                <div class="box">
                    <table>
                        <thead>
                            <tr>
                                <th>商品</th>
                                <th>价格（元）</th>
                                <th>数量</th>
                                <th>小计（元）</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($order['goods_info']) || $order['goods_info'] instanceof \think\Collection || $order['goods_info'] instanceof \think\Paginator): $i = 0; $__LIST__ = $order['goods_info'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td class="goods">
                               
                                <a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>" class="fl">
                                    <img src="/public/Uploads/<?php echo $vo['img']; ?>" width="120" height="100">
                                </a>
                                    <h3>
                                        <a class="proName" href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>"><?php echo $vo['name']; ?></a>
                                    </h3>
                                        <dl>
                                            <dd>40cm</dd>
                                            <dd>白色</dd>
                                        </dl>
                                    </td>
                                    <td class="price">￥<?php echo $vo['price']; ?></td>
                                    <td>
                                        <div class="num">
                                            
                                            <input class="numValue" type="text" name="" value="<?php echo $vo['num']; ?>" readonly="readonly">
                                            
                                        </div>
                                    </td>
                                    <td class="subtotal">￥<?php echo $vo['total']; ?></td>
                                    
                                </tr>
                       <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="distribution">
                    <h1>配送信息<a href="<?php echo url('Address/index'); ?>">修改</a></h1>
                    <div>
                        <span class="name"><?php echo $order['a_name']; ?></span><span class="phone"><?php echo $order['tel']; ?></span><span class="address"><?php echo $prov['province']; ?><?php echo $city['city']; ?><?php echo $area['area']; ?><?php echo $order['road']; ?></span>
                    </div>
                </div>
                <div class="foot">
                    <div class="fl">
                        <a href="<?php echo url('Index/index'); ?>">返回继续购物</a>
                    </div>
                    <div class="fr">
                        <span>共计 <em class="totalCount"><?php echo $order['num']; ?></em> 件商品</span>
                        <span>总价：<em class="totalPrice">￥<?php echo $order['sumtotal']; ?></em></span>
                        <form method="post" action="<?php echo url('Pay/alipay'); ?>">
                        <input type="hidden" name="WIDout_trade_no" value="<?php echo $order['order_num']; ?>">
                        
                        <button class="btn" id="submitOrder" >提交订单</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="guessYouLike">
                <h3>猜你喜欢</h3>
                <div class="division"></div>
                <ul class="clear">
                    <li>
                        <a href="pro_details.html"><img src="images/shop_list/product2.jpg" alt=""></a>
                        <p><a href="pro_details.html">蓝水晶时尚最新品手镯 翡翠绿穿戴舒服手镯</a></p>
                        <span><i>￥</i>666</span>
                        <button type="button">加入购物车</button>
                    </li>
                    <li>
                        <a href="pro_details.html"><img src="images/shop_list/product2.jpg" alt=""></a>
                        <p><a href="pro_details.html">蓝水晶时尚最新品手镯 翡翠绿穿戴舒服手镯</a></p>
                        <span><i>￥</i>666</span>
                        <button type="button">加入购物车</button>
                    </li>
                    <li>
                        <a href="pro_details.html"><img src="images/shop_list/product2.jpg" alt=""></a>
                        <p><a href="pro_details.html">蓝水晶时尚最新品手镯 翡翠绿穿戴舒服手镯</a></p>
                        <span><i>￥</i>666</span>
                        <button type="button">加入购物车</button>
                    </li>
                    <li>
                        <a href="pro_details.html"><img src="images/shop_list/product2.jpg" alt=""></a>
                        <p><a href="pro_details.html">蓝水晶时尚最新品手镯 翡翠绿穿戴舒服手镯</a></p>
                        <span><i>￥</i>666</span>
                        <button type="button">加入购物车</button>
                    </li>
                    <li>
                        <a href="pro_details.html"><img src="images/shop_list/product2.jpg" alt=""></a>
                        <p><a href="pro_details.html">蓝水晶时尚最新品手镯 翡翠绿穿戴舒服手镯</a></p>
                        <span><i>￥</i>666</span>
                        <button type="button">加入购物车</button>
                    </li>
                </ul>
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