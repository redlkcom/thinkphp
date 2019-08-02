<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"E:\webserver\PHPTutorial\WWW\tp5\public/../app/home\view\Lover\index.html";i:1564362752;s:65:"E:\webserver\PHPTutorial\WWW\tp5\app\home\view\Public\header.html";i:1562287717;s:65:"E:\webserver\PHPTutorial\WWW\tp5\app\home\view\Public\footer.html";i:1564362751;}*/ ?>
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
    <link rel="stylesheet" type="text/css" href="css/shop_list.css">

    <script src="js/shop_list.js"></script>
    <script src="js/guess.js"></script>

    <div class="middle">
        <div class="container">
            <div class="sub-nav">
                <dl>
                    <dt><a href="<?php echo url('Index/index'); ?>">首页</a></dt>
                    <dd><a href="<?php echo url('Lover/index'); ?>">手机</a></dd>
                </dl>
            </div>
            <div class="commodity">
                <div class="clear brand">
                    <div class="left">
                        <div>品牌</div>
                    </div>
                    <div class="center ">
                        <ul>
                            <li class="on">热门</li>
                            <li>iPhone</li>
                            <li>华为荣耀</li>
                            <li>小米</li>
                            <li>红米</li>
                            <li>一加</li>
                            <li>oppo</li>
                            <li>vivo</li>
                            <li>努比亚</li>
                            <li>诺基亚</li>
                            <li>联想</li>
                            
                        </ul>
                    </div>
                    <div class="right">
                        <a href="javascript:void(0)">多选</a>
                    </div>
                </div>
                <div class="clear ">
                    <div class="left">
                        <div>大家都在选</div>
                    </div>
                    <div class="center">
                        <ul>
                            <li>游戏手机</li>
                            <li class="on">曲面屏</li>
                            <li>全面屏</li>
                            <li>拍照手机</li>
                            <li>女性手机</li>
                            <li>无线充电</li>
                            <li>大容量电池</li>
                            <li>快充</li>
                            <li>老年机</li>
                            
                        </ul>
                    </div>
                    <div class="right">
                        <a href="javascript:void(0)">多选</a>
                    </div>
                </div>
                <div class="clear priceRange">
                    <div class="left">
                        <div>价格范围（￥）</div>
                    </div>
                    <div class="center">
                        <ul>
                            <li class="on">0-599</li>
                            <li>600-999</li>
                            <li>1000-2999</li>
                            <li>3000-5999</li>
                            <li>6000-9999</li>
                            <li>10000以上</li>
                        </ul>
                    </div>
                    <div class="right">
                        <a href="javascript:void(0)">多选</a>
                    </div>
                </div>
                <div class="clear targetUser">
                    <div class="left">
                        <div>适用人群</div>
                    </div>
                    <div class="center">
                        <ul>
                            <li><label><input name="" type="checkbox" checked>情侣</label></li>
                            <li><label><input name="" type="checkbox">父母</label></li>
                            <li><label><input name="" type="checkbox">男士</label></li>
                            <li><label><input name="" type="checkbox">女士</label></li>
                            <li><label><input name="" type="checkbox">小孩</label></li>
                        </ul>
                        <div class="buttonBar">
                            <a class="sure" href="#">确定</a><a class="cancel" href="#">取消</a>
                        </div>
                    </div>
                    <div class="right">
                        <a href="javascript:void(0)">多选</a>
                    </div>
                </div>
                <div class="clear ">
                    <div class="left">
                        <div>用途</div>
                    </div>
                    <div class="center ">
                        <ul>
                            <li class="on">拍照</li>
                            <li>游戏</li>
                            <li>音乐</li>
                            <li>视频</li>
                            <li>其他</li>
                        </ul>
                    </div>
                    <div class="right">
                        <a href="javascript:void(0)">多选</a>
                    </div>
                </div>
            </div>
            <div class="shop-list">
                <div class="top-nav">
                    <div class="left fl">
                        <dl class="fl">
                            <dt>排列方式：</dt>
                            <dd class="on">默认<i></i></dd>
                            <dd>最热销<i></i></dd>
                            <dd>销量<i></i></dd>
                            <dd class="on">价格<i></i></dd>
                        </dl>
                        <div class="price fl">
                            <span class="text">
                                价格￥
                            </span>
                            <span class="price-input">
                                <input type="text" name="" value="">
                                <span></span>
                            <input type="text" name="" value="">
                            </span>
                            <a href="#">确定</a>
                        </div>
                    </div>
                    <div class="right fr">
                        <a href="#" class="prev">&lt;&nbsp;上一页</a>
                        <span class="index"><b>1</b>/10</span>
                        <a href="#" class="next">下一页&nbsp;&gt;</a>
                    </div>
                </div>
                <div class="list">
                    <ul class="clear">
                        <?php if(is_array($list_copy['data']) || $list_copy['data'] instanceof \think\Collection || $list_copy['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $list_copy['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <li class="clear">
                            <a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>"><img style="width:215px;height: 221px" src="/public/Uploads/<?php echo $vo['img']['0']; ?>" alt=""></a>
                            <span class="price"><i>￥</i><?php echo $vo['price']; ?></span><span class="freePostage">包邮</span>
                            <span class="stock">库存：<?php echo $vo['count']; ?>件</span>
                            <p><a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>"><?php echo $vo['name']; ?></a></p>
                            <button type="button" class="shopCar">加入购物车</button>
                            <div class="evaluate fr">
                                <i></i><span>520</span><i></i><span>98%</span>
                            </div>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        
                    </ul>
                </div>
                <div class="footer-nav">
                    <?php echo $list->render(); ?>
                </div>
                <div class="division">

                </div>
            </div>
            <div class="guessYouLike">
                <h3>猜你喜欢</h3>
                <ul class="clear">
                    <li>
                        <a href="pro_details.html"><img src="images/shop_list/product2.jpg" alt=""></a>
                        <p><a href="pro_details.html">京东时尚最新品手镯 翡翠绿穿戴舒服手镯</a></p>
                        <span><i>￥</i>666</span>
                        <button type="button">加入购物车</button>
                    </li>
                    <li>
                        <a href="pro_details.html"><img src="images/shop_list/product2.jpg" alt=""></a>
                        <p><a href="pro_details.html">京东时尚最新品手镯 翡翠绿穿戴舒服手镯</a></p>
                        <span><i>￥</i>666</span>
                        <button type="button">加入购物车</button>
                    </li>
                    <li>
                        <a href="pro_details.html"><img src="images/shop_list/product2.jpg" alt=""></a>
                        <p><a href="pro_details.html">京东时尚最新品手镯 翡翠绿穿戴舒服手镯</a></p>
                        <span><i>￥</i>666</span>
                        <button type="button">加入购物车</button>
                    </li>
                    <li>
                        <a href="pro_details.html"><img src="images/shop_list/product2.jpg" alt=""></a>
                        <p><a href="pro_details.html">京东时尚最新品手镯 翡翠绿穿戴舒服手镯</a></p>
                        <span><i>￥</i>666</span>
                        <button type="button">加入购物车</button>
                    </li>
                    <li>
                        <a href="pro_details.html"><img src="images/shop_list/product2.jpg" alt=""></a>
                        <p><a href="pro_details.html">京东时尚最新品手镯 翡翠绿穿戴舒服手镯</a></p>
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
                    <span>Copyright©  京东饰品商城 2007-2016，All Rights Reserved</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>