<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:71:"E:\webserver\PHPTutorial\WWW\tp5\public/../app/home\view\vip\index.html";i:1561773998;s:65:"E:\webserver\PHPTutorial\WWW\tp5\app\home\view\Public\header.html";i:1562287717;s:65:"E:\webserver\PHPTutorial\WWW\tp5\app\home\view\Public\footer.html";i:1560819925;}*/ ?>
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
    <link rel="stylesheet" type="text/css" href="css/member_home.css">
  
 
    <script src="js/guess.js"></script>
   
</head>


    <div class="middle">
        <div class="container clear">
            <div class="sub-nav fl">
                <h1>我的商城</h1>
                <dl>
                    <dt>订单中心</dt>
                    <dd><a href="<?php echo url('Vip/order'); ?>">我的订单</a></dd>
                    <dd><a href="shipping_address.html">收货地址</a></dd>
                    <dd><a href="#">缺货登记</a></dd>
                </dl>
                <dl>
                    <dt>会员中心</dt>
                    <dd><a href="system_message.html">用户信息</a></dd>
                    <dd><a href="#">我的收藏</a></dd>
                    <dd><a href="#">我的标签</a></dd>
                    <dd><a href="#">我的留言</a></dd>
                    <dd><a href="#">我的推荐</a></dd>
                    <dd><a href="#">我的评论</a></dd>
                </dl>
                <dl>
                    <dt>账户中心</dt>
                    <dd><a href="#">我的红包</a></dd>
                    <dd><a href="#">跟踪包裹</a></dd>
                    <dd><a href="message_detssail.html">资金管理</a></dd>
                </dl>
            </div>
            <div class="content fl">
                <div class="member-msg">
                    <img src="images/member_home/photo.png" alt="">
                    <h2><?php echo \think\Session::get('user.username'); ?>，欢迎你！</h2>
                    <span class="experience">9999/10000</span>
                    <p>你还没有通过邮件验证点击<a href="#">发送认证邮件</a></p>
                    <a href="<?php echo url('Vip/password'); ?>">修改密码</a>
                    <div class="info">
                        <p>余额：<b>￥1314</b></p>
                        <p>红包：<b>共0个，价值￥0</b></p>
                        <p>积分：5201314分</p>
                        <p>你最近共提交了18个订单</p>
                    </div>
                </div>
                <div class="announcement">
                    <h2>用户中心公告</h2>
                </div>
                <div class="history">
                    <h2>浏览历史</h2>
                    <div class="division"></div>
                    <ul class="clear">
                        <li class="clear">
                            <div class="pic">
                                <a href="pro_details.html"><img src="images/member_home/pro.jpg" alt=""></a>
                            </div>
                            <p><a href="pro_details.html">蓝水晶时尚最新品手镯 翡翠绿穿戴舒服手镯</a></p>
                            <span><b>￥</b>666</span>
                            <a href="javascript:void(0)">加入购物车</a>
                        </li>
                        <li class="clear">
                            <div class="pic">
                                <a href="pro_details.html"><img src="images/member_home/pro.jpg" alt=""></a>
                            </div>
                            <p><a href="pro_details.html">蓝水晶时尚最新品手镯 翡翠绿穿戴舒服手镯</a></p>
                            <span><b>￥</b>666</span>
                            <a href="javascript:void(0)">加入购物车</a>
                        </li>
                        <li class="clear">
                            <div class="pic">
                                <a href="pro_details.html"><img src="images/member_home/pro.jpg" alt=""></a>
                            </div>
                            <p><a href="pro_details.html">蓝水晶时尚最新品手镯 翡翠绿穿戴舒服手镯</a></p>
                            <span><b>￥</b>666</span>
                            <a href="javascript:void(0)">加入购物车</a>
                        </li>
                        <li class="clear">
                            <div class="pic">
                                <a href="pro_details.html"><img src="images/member_home/pro.jpg" alt=""></a>
                            </div>
                            <p><a href="pro_details.html">蓝水晶时尚最新品手镯 翡翠绿穿戴舒服手镯</a></p>
                            <span><b>￥</b>666</span>
                            <a href="javascript:void(0)">加入购物车</a>
                        </li>
                    </ul>
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