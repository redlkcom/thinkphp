<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"E:\webserver\PHPTutorial\WWW\tp5\public/../app/home\view\Index\index.html";i:1564364678;s:65:"E:\webserver\PHPTutorial\WWW\tp5\app\home\view\Public\header.html";i:1562287717;s:65:"E:\webserver\PHPTutorial\WWW\tp5\app\home\view\Public\footer.html";i:1564362751;}*/ ?>
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
<link rel="stylesheet" type="text/css" href="css/index.css">
<script src="js/index.js"></script>
        <div class="banner">
            <div class="carousel">
                <ul>
                    <?php if(is_array($ban_list) || $ban_list instanceof \think\Collection || $ban_list instanceof \think\Paginator): $i = 0; $__LIST__ = $ban_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li>
                        <a href="<?php echo url('Index/index'); ?>"><img style="width: 1920px;height: 550px;" src="/public/Uploads/<?php echo $vo['img']; ?>" alt=""></a>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="middle">
        <div class="container">
            <div class="breadCrumb">
                <div class="title">
                    <ul class="clear">
                        <li><span>新品推荐</span></li>
                        <li class="on"><span>热卖爆款</span></li>
                        <li><span>限时抢购</span></li>
                    </ul>
                </div>
                <div class="content">
                    <div>
                        <ul class="clear">
                            <?php if(is_array($list_copy_r['data']) || $list_copy_r['data'] instanceof \think\Collection || $list_copy_r['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $list_copy_r['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <li>
                                <div class="pic">
                                    <a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>"><img src="/public/Uploads/<?php echo $vo['img']['0']; ?>" style="width:238px;height: 175px;" alt=""></a>
                                </div>
                                <h2><a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>"><?php echo $vo['name']; ?></a></h2>
                                <div class="price"><span><b>￥</b><?php echo $vo['price']; ?></span><span><b>￥</b><?php echo $vo['price']+100; ?></span></div>
                                <div class="btn"><a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>">查看详情 》</a></div>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                    <div class="on">
                        <ul class="clear">
                            <?php if(is_array($list_copy_x['data']) || $list_copy_x['data'] instanceof \think\Collection || $list_copy_x['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $list_copy_x['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <li>
                                <div class="pic">
                                    <a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>"><img src="/public/Uploads/<?php echo $vo['img']['0']; ?>" style="width:238px;height: 175px;" alt=""></a>
                                </div>
                                <h2><a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>"><?php echo $vo['name']; ?></a></h2>
                                <div class="price"><span><b>￥</b><?php echo $vo['price']; ?></span><span><b>￥</b><?php echo $vo['price']+100; ?></span></div>
                                <div class="btn"><a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>">查看详情 》</a></div>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                    <div class="">
                        <ul class="clear">
                            <?php if(is_array($list_copy_q['data']) || $list_copy_q['data'] instanceof \think\Collection || $list_copy_q['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $list_copy_q['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <li>
                                <div class="pic">
                                    <a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>"><img src="/public/Uploads/<?php echo $vo['img']['0']; ?>" style="width:238px;height: 175px;" alt=""></a>
                                </div>
                                <h2><a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>"><?php echo $vo['name']; ?></a></h2>
                                <div class="price"><span><b>￥</b><?php echo $vo['price']; ?></span><span><b>￥</b><?php echo $vo['price']+100; ?></span></div>
                                <div class="btn"><a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>">查看详情 》</a></div>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="show">
                <div>
                    <div class="title">
                        <h2>家电<img src="images/index/ring.jpg" alt=""></h2>
                        <div></div>
                    </div>
                    <div class="content">
                        <div class="left">
                            <div class="big-info">
                                <h1><a href="<?php echo url('Cate/details',['id'=>$jiadian['0']['id']]); ?>"><?php echo $jiadian['0']['cate_name']; ?></a></h1>
                                <p><?php echo $jiadian['0']['name']; ?>￥<?php echo $jiadian['0']['price']; ?></p>
                            </div>
                           <!--  <ul class="big-list">
                                <li>铂金戒指</li>
                                <li>情侣对戒</li>
                                <li>个人定制</li>
                                <li>特大钻戒</li>
                                <li>个人定制</li>
                                <li>特大钻戒</li>
                            </ul> -->
                            <a href="<?php echo url('Cate/details',['id'=>$jiadian['0']['id']]); ?>"><img src="/public/Uploads/<?php echo $jiadian['0']['img']['0']; ?>" width="300" height="511" alt=""></a>
                        </div>
                        <div class="right">
                            <ol class="shop-list">
                                <li>
                                    <a href="<?php echo url('Cate/details',['id'=>$jiadian['1']['id']]); ?>"><img src="/public/Uploads/<?php echo $jiadian['1']['img']['0']; ?>" width="148" height="108" alt=""></a>
                                    <h2><a href="<?php echo url('Cate/details',['id'=>$jiadian['1']['id']]); ?>"><?php echo $jiadian['1']['name']; ?></a></h2>
                                    <p>￥<?php echo $jiadian['1']['price']; ?> <del>￥<?php echo $jiadian['1']['price']+100; ?></del></p>
                                </li>
                                <li>
                                    <div class="icon"><img src="images/index/icon1.png" alt=""></div>
                                    <div class="carousel">
                                        <ul>
                                            <?php if(is_array($jiadian) || $jiadian instanceof \think\Collection || $jiadian instanceof \think\Paginator): $i = 0; $__LIST__ = $jiadian;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;$_RANGE_VAR_=explode(',',"3,4");if($i>= $_RANGE_VAR_[0] && $i<= $_RANGE_VAR_[1]):?>
                                            <li>
                                                <a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>"><img src="/public/Uploads/<?php echo $vo['img']['0']; ?>" width="448" height="256" alt=""></a>
                                            </li>
                                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                        </ul>
                                    </div>
                                    <div class="carousel-icon">
                                        <ul>
                                            <li class="on"></li>
                                            <li></li>
                                        </ul>
                                    </div>
                                </li>
                                <?php if(is_array($jiadian) || $jiadian instanceof \think\Collection || $jiadian instanceof \think\Paginator): $i = 0; $__LIST__ = $jiadian;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;$_RANGE_VAR_=explode(',',"5,19");if($i>= $_RANGE_VAR_[0] && $i<= $_RANGE_VAR_[1]):?>
                                <li>
                                    <a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>"><img src="/public/Uploads/<?php echo $vo['img']['0']; ?>" width="126" height="123" alt=""></a>
                                    <h2><a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>"><?php echo $vo['name']; ?></a></h2>
                                    <p>￥<?php echo $vo['price']; ?><del>￥<?php echo $vo['price']+100; ?></del></p>
                                </li>
                                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </ol>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="title">
                        <h2>手机<img src="images/index/ring.jpg" alt=""></h2>
                        <div></div>
                    </div>
                    <div class="content">
                        <div class="left">
                            <div class="big-info">
                                <h1><a href="<?php echo url('Cate/details',['id'=>$shouji['0']['id']]); ?>"><?php echo $shouji['0']['cate_name']; ?></a></h1>
                                <p><?php echo $shouji['0']['name']; ?>￥<?php echo $shouji['0']['price']; ?></p>
                            </div>
                            <!-- <ul class="big-list">
                                <li>铂金戒指</li>
                                <li>情侣对戒</li>
                                <li>个人定制</li>
                                <li>特大钻戒</li>
                                <li>个人定制</li>
                                <li>特大钻戒</li>
                            </ul> -->
                            <a href="<?php echo url('Cate/details',['id'=>$shouji['0']['id']]); ?>"><img src="/public/Uploads/<?php echo $shouji['0']['img']['0']; ?>" width="300" height="511" alt=""></a>
                        </div>
                        <div class="right">
                            <ol class="shop-list">
                                <li>
                                    <a href="<?php echo url('Cate/details',['id'=>$shouji['1']['id']]); ?>"><img src="/public/Uploads/<?php echo $shouji['1']['img']['0']; ?>" width="148" height="108" alt=""></a>
                                    <h2><a href="<?php echo url('Cate/details',['id'=>$shouji['1']['id']]); ?>"><?php echo $shouji['1']['name']; ?></a></h2>
                                    <p>￥<?php echo $shouji['1']['price']; ?> <del>￥<?php echo $shouji['1']['price']+100; ?></del></p>
                                </li>
                                <li>
                                    <div class="icon"><img src="images/index/icon1.png" alt=""></div>
                                    <div class="carousel">
                                        <ul>
                                            <?php if(is_array($shouji) || $shouji instanceof \think\Collection || $shouji instanceof \think\Paginator): $i = 0; $__LIST__ = $shouji;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;$_RANGE_VAR_=explode(',',"3,4");if($i>= $_RANGE_VAR_[0] && $i<= $_RANGE_VAR_[1]):?>
                                            <li>
                                                <a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>"><img src="/public/Uploads/<?php echo $vo['img']['0']; ?>" width="448" height="256" alt=""></a>
                                            </li>
                                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                        </ul>
                                    </div>
                                    <div class="carousel-icon">
                                        <ul>
                                            <li class="on"></li>
                                            <li></li>
                                        </ul>
                                    </div>
                                </li>
                                <?php if(is_array($shouji) || $shouji instanceof \think\Collection || $shouji instanceof \think\Paginator): $i = 0; $__LIST__ = $shouji;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;$_RANGE_VAR_=explode(',',"5,9");if($i>= $_RANGE_VAR_[0] && $i<= $_RANGE_VAR_[1]):?>
                                <li>
                                    <a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>"><img src="/public/Uploads/<?php echo $vo['img']['0']; ?>" width="126" height="123" alt=""></a>
                                    <h2><a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>"><?php echo $vo['name']; ?></a></h2>
                                    <p>￥<?php echo $vo['price']; ?><del>￥<?php echo $vo['price']+100; ?></del></p>
                                </li>
                                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </ol>
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                    <div class="title">
                        <h2>家电<img src="images/index/ring.jpg" alt=""></h2>
                        <div></div>
                    </div>
                    <div class="content">
                        <div class="left">
                            <div class="big-info">
                                <h1><a href="<?php echo url('Cate/details',['id'=>$jiadian['0']['id']]); ?>"><?php echo $jiadian['0']['cate_name']; ?></a></h1>
                                <p><?php echo $jiadian['0']['name']; ?>￥<?php echo $jiadian['0']['price']; ?></p>
                            </div>
                           <!--  <ul class="big-list">
                                <li>铂金戒指</li>
                                <li>情侣对戒</li>
                                <li>个人定制</li>
                                <li>特大钻戒</li>
                                <li>个人定制</li>
                                <li>特大钻戒</li>
                            </ul> -->
                            <a href="<?php echo url('Cate/details',['id'=>$jiadian['0']['id']]); ?>"><img src="/public/Uploads/<?php echo $jiadian['0']['img']['0']; ?>" width="300" height="511" alt=""></a>
                        </div>
                        <div class="right">
                            <ol class="shop-list">
                                <li>
                                    <a href="<?php echo url('Cate/details',['id'=>$jiadian['1']['id']]); ?>"><img src="/public/Uploads/<?php echo $jiadian['1']['img']['0']; ?>" width="148" height="108" alt=""></a>
                                    <h2><a href="<?php echo url('Cate/details',['id'=>$jiadian['1']['id']]); ?>"><?php echo $jiadian['1']['name']; ?></a></h2>
                                    <p>￥<?php echo $jiadian['1']['price']; ?> <del>￥<?php echo $jiadian['1']['price']+100; ?></del></p>
                                </li>
                                <li>
                                    <div class="icon"><img src="images/index/icon1.png" alt=""></div>
                                    <div class="carousel">
                                        <ul>
                                            <?php if(is_array($jiadian) || $jiadian instanceof \think\Collection || $jiadian instanceof \think\Paginator): $i = 0; $__LIST__ = $jiadian;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;$_RANGE_VAR_=explode(',',"3,4");if($i>= $_RANGE_VAR_[0] && $i<= $_RANGE_VAR_[1]):?>
                                            <li>
                                                <a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>"><img src="/public/Uploads/<?php echo $vo['img']['0']; ?>" width="448" height="256" alt=""></a>
                                            </li>
                                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                        </ul>
                                    </div>
                                    <div class="carousel-icon">
                                        <ul>
                                            <li class="on"></li>
                                            <li></li>
                                        </ul>
                                    </div>
                                </li>
                                <?php if(is_array($jiadian) || $jiadian instanceof \think\Collection || $jiadian instanceof \think\Paginator): $i = 0; $__LIST__ = $jiadian;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;$_RANGE_VAR_=explode(',',"5,19");if($i>= $_RANGE_VAR_[0] && $i<= $_RANGE_VAR_[1]):?>
                                <li>
                                    <a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>"><img src="/public/Uploads/<?php echo $vo['img']['0']; ?>" width="126" height="123" alt=""></a>
                                    <h2><a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>"><?php echo $vo['name']; ?></a></h2>
                                    <p>￥<?php echo $vo['price']; ?><del>￥<?php echo $vo['price']+100; ?></del></p>
                                </li>
                                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </ol>
                        </div>
                    </div>
                </div>
                </div>
                <div>
                    <div class="title">
                        <h2>手机<img src="images/index/ring.jpg" alt=""></h2>
                        <div></div>
                    </div>
                    <div class="content">
                        <div class="left">
                            <div class="big-info">
                                <h1><a href="<?php echo url('Cate/details',['id'=>$shouji['0']['id']]); ?>"><?php echo $shouji['0']['cate_name']; ?></a></h1>
                                <p><?php echo $shouji['0']['name']; ?>￥<?php echo $shouji['0']['price']; ?></p>
                            </div>
                            <!-- <ul class="big-list">
                                <li>铂金戒指</li>
                                <li>情侣对戒</li>
                                <li>个人定制</li>
                                <li>特大钻戒</li>
                                <li>个人定制</li>
                                <li>特大钻戒</li>
                            </ul> -->
                            <a href="<?php echo url('Cate/details',['id'=>$shouji['0']['id']]); ?>"><img src="/public/Uploads/<?php echo $shouji['0']['img']['0']; ?>" width="300" height="511" alt=""></a>
                        </div>
                        <div class="right">
                            <ol class="shop-list">
                                <li>
                                    <a href="<?php echo url('Cate/details',['id'=>$shouji['1']['id']]); ?>"><img src="/public/Uploads/<?php echo $shouji['1']['img']['0']; ?>" width="148" height="108" alt=""></a>
                                    <h2><a href="<?php echo url('Cate/details',['id'=>$shouji['1']['id']]); ?>"><?php echo $shouji['1']['name']; ?></a></h2>
                                    <p>￥<?php echo $shouji['1']['price']; ?> <del>￥<?php echo $shouji['1']['price']+100; ?></del></p>
                                </li>
                                <li>
                                    <div class="icon"><img src="images/index/icon1.png" alt=""></div>
                                    <div class="carousel">
                                        <ul>
                                            <?php if(is_array($shouji) || $shouji instanceof \think\Collection || $shouji instanceof \think\Paginator): $i = 0; $__LIST__ = $shouji;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;$_RANGE_VAR_=explode(',',"3,4");if($i>= $_RANGE_VAR_[0] && $i<= $_RANGE_VAR_[1]):?>
                                            <li>
                                                <a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>"><img src="/public/Uploads/<?php echo $vo['img']['0']; ?>" width="448" height="256" alt=""></a>
                                            </li>
                                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                        </ul>
                                    </div>
                                    <div class="carousel-icon">
                                        <ul>
                                            <li class="on"></li>
                                            <li></li>
                                        </ul>
                                    </div>
                                </li>
                                <?php if(is_array($shouji) || $shouji instanceof \think\Collection || $shouji instanceof \think\Paginator): $i = 0; $__LIST__ = $shouji;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;$_RANGE_VAR_=explode(',',"5,9");if($i>= $_RANGE_VAR_[0] && $i<= $_RANGE_VAR_[1]):?>
                                <li>
                                    <a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>"><img src="/public/Uploads/<?php echo $vo['img']['0']; ?>" width="126" height="123" alt=""></a>
                                    <h2><a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>"><?php echo $vo['name']; ?></a></h2>
                                    <p>￥<?php echo $vo['price']; ?><del>￥<?php echo $vo['price']+100; ?></del></p>
                                </li>
                                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </ol>
                        </div>
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
                    <span>Copyright©  京东饰品商城 2007-2016，All Rights Reserved</span>
                </div>
            </div>
        </div>
    </div>
</body>

</html>