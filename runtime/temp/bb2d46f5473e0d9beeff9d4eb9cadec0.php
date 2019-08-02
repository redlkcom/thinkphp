<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"E:\webserver\PHPTutorial\WWW\tp5\public/../app/home\view\Cate\details.html";i:1564363859;s:65:"E:\webserver\PHPTutorial\WWW\tp5\app\home\view\Public\header.html";i:1562287717;}*/ ?>
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
    <link rel="stylesheet" type="text/css" href="css/pro_details.css">

    <script src="js/num.js"></script>
    <script src="js/pro_details.js"></script>

    <div class="middle">
        <div class="container">
            <div class="sub-nav">
                <dl>
                    <dt><a href="<?php echo url('Index/index'); ?>">首页</a></dt>
                    <dd><a href="<?php echo url('Index/index'); ?>">手链</a></dd>
                    <dd><a href="<?php echo url('Index/index'); ?>"><?php echo $find['name']; ?></a></dd>
                </dl>
            </div>
            <div class="shop-detail clear">
                <div class="left fl">
                    <div class="left fl ">
                        <div class="pic">
                            <img src="/public/Uploads/<?php echo $find['img']['0']; ?>" style="width: 418;height: 418;" alt="">
                        </div>
                        <div class="sm-pic">
                           <ul class="clear">
                                <?php if(is_array($find['img']) || $find['img'] instanceof \think\Collection || $find['img'] instanceof \think\Paginator): $i = 0; $__LIST__ = $find['img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <li class="on"><img src="/public/Uploads/<?php echo $vo; ?>" alt=""></li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                        <div class="txt">
                            <span class="share">分享</span>
                            <span class="collect">收藏宝贝（520人气）</span>
                        </div>
                    </div>
                    <div class="right fl">
                        <form id="mycart" action="<?php echo url('Cart/add'); ?>" method="post">
                          <input type="hidden" name="id" value="<?php echo $find['id']; ?>">  
                          <input type="hidden" name="name" value="<?php echo $find['name']; ?>"> 
                          <input type="hidden" name="price" value="<?php echo $find['price']; ?>"> 
                          <input type="hidden" name="num" value="1"> 
                          <input type="hidden" name="img" value="<?php echo $find['img']['0']; ?>"> 
                          <input type="hidden" name="count" value="<?php echo $find['count']; ?>"> 
                        </form>
                        <form >
                            <h2 id="proName"><?php echo $find['name']; ?></h2>
                            <h3 id="proText"></h3>
                            
                            <div class="price">
                                <div class="up clear">
                                    <span class="fl">原价：<b>￥<?php echo $find['price']+100; ?></b></span><span class="fr">累计论：<b>520</b></span>
                                </div>
                                <div class="down clear">
                                    <span class="fl">促销价：<b id="price">￥<?php echo $find['price']; ?></b></span><span class="fr">交易成功：<b>1314</b></span>
                                </div>
                            </div>
                            <!-- <div class="delivery clear">
                                <span>配送：</span>
                                <span>广东深圳</span>
                                <span>&nbsp;至</span>
                                <a id="destination">
                                    广东广州
                                    <i></i>
                                </a>
                                <span>快递</span>
                                <a id="carriage">
                                    免运费
                                    <i></i>
                                </a>
                                <div id="destinationSelect"></div>
                                <div id="carriageSelect"></div>
                            </div> -->
                            <div class="check clear">
                                <span>颜色：</span>
                                <label>
                                    <input type="radio" name="color" value="白色" checked>
                                    <span>白色</span>
                                </label>
                                <label>
                                    <input type="radio" name="color" value="粉色">
                                    <span>粉色</span>
                                </label>
                                <label>
                                    <input type="radio" name="color" value="绿色">
                                    <span>绿色</span>
                                </label>
                                <label>
                                    <input type="radio" name="color" value="黄色">
                                    <span>黄色</span>
                                </label>
                            </div>
                            <!-- <div class="check clear">
                                <span>尺寸：</span>
                                <label>
                                    <input type="radio" name="size" value="40cm" checked>
                                    <span>40cm</span>
                                </label>
                                <label>
                                    <input type="radio" name="size" value="42cm">
                                    <span>42cm</span>
                                </label>
                                <label>
                                    <input type="radio" name="size" value="45cm">
                                    <span>45cm</span>
                                </label>
                                <label>
                                    <input type="radio" name="size" value="40cm">
                                    <span>50cm</span>
                                </label>
                            </div> -->
                            <div class="num-box" id="num" >
                                <span>数量：</span>
                                <span class="num clear">
                                    <span class="numSub">-</span>
                                    <input type="text" name="" class="numValue" value="1">
                                    <span class="numAdd">+</span>
                                </span>
                                <span id="count" count="<?php echo $find['count']; ?>">库存：<?php echo $find['count']; ?>件</span>
                            </div>
                            <div>
                                <button type="button" class="buy">立即购买</button>
                                <button type="button"  class="car"><img src="images/pro_details/car.jpg" alt=""><span>加入购物车</span></button>
                            </div>
                            <div class="promise">
                                <span>官方承诺：</span><span><img src="images/pro_details/icon4.png" alt=""><span>正品保证</span></span><span><img src="images/pro_details/icon4.jpg" alt="">七天无理由退换货</span>
                            </div>
                        </form>
                    </div>
                </div> 
                <div class="right fl">
                    <dl>
                        <dt>看了又看</dt>
                        <?php if(is_array($list_copy_look['data']) || $list_copy_look['data'] instanceof \think\Collection || $list_copy_look['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $list_copy_look['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <dd>
                            <a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>">
                                <img src="/public/Uploads/<?php echo $vo['img']['0']; ?>" alt="">
                            </a>
                            <p><a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>">￥<?php echo $vo['price']; ?></a></p>
                        </dd>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </dl>
                </div>
            </div>
            <div class="shop-content clear">
                <div class="left fl">
                    <dl>
                        <dt>销量排行榜</dt>
                        <?php if(is_array($list_copy_hot['data']) || $list_copy_hot['data'] instanceof \think\Collection || $list_copy_hot['data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $list_copy_hot['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <dd class="clear">
                            <div class="clear">
                                <div class="pic fl">
                                    <a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>"><img src="/public/Uploads/<?php echo $vo['img']['0']; ?>" style="width:69px;height: 113px;" alt=""></a>
                                </div>
                                <div class="text">
                                    <h2><a href="<?php echo url('Cate/details',['id'=>$vo['id']]); ?>"><?php echo $vo['name']; ?></a></h2>
                                    <h3>￥<?php echo $vo['price']; ?></h3>
                                    <p>已售出:<b>1314</b>件</p>
                                </div>
                            </div>
                            <div class="down"></div>
                        </dd>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </dl>
                </div>
                <div class="right fl">
                    <div class="top-nav tabs-nav">
                        <ul class="clear">
                            <li class="on">商品详情</li>
                            <li>累计评论（<b>520</b>）</li>
                            <li>售后服务</li>
                            <li>规则与声明</li>
                        </ul>
                    </div>
                    <div class="tabs-data on">
                        <div class="shop-parameter">
                            <dl>
                                <dt>规格参数</dt>
                                <p><?php echo $find['des']; ?></p>
                            </dl>
                        </div>
                        <div class="shop-show">
                            <?php if(is_array($find['img']) || $find['img'] instanceof \think\Collection || $find['img'] instanceof \think\Paginator): $i = 0; $__LIST__ = $find['img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <img src="/public/Uploads/<?php echo $vo; ?>" alt=""><br>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                        <div class="favorable-rate clear">
                            <div class="left fl">
                                <div class="table">
                                    <h2>99.0%</h2>
                                    <p>好评率</p>
                                </div>
                            </div>
                            <div class="right fl">
                                <div class="table">
                                    <p>评价中评以上即可返现，欢迎大家来<a href="#">评价</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="comment">
                            <div class="title">
                                <ul class="clear">
                                    <li class="on">全部评论（100</li>
                                    <li>好评（99</li>
                                    <li>中评（1）</li>
                                    <li>差评（0）</li>
                                    <li>追评（0）</li>
                                </ul>
                            </div>
                            <div class="content sub-tabs">
                                <div class="sub-tab">
                                    <ul>
                                        <li class="comment-item">
                                            <div class="person-info">
                                                <img src="images/pro_details/photo.jpg" alt="">
                                                <h3>136*****99</h3>
                                            </div>
                                            <ul class="addition">
                                                <li>颜色：白色</li>
                                                <li>尺寸：40cm</li>
                                            </ul>
                                            <div class="star">       
                                                <div class="star_5">
                                                </div>
                                            </div>
                                            <p class="comment-text">正品好货，质量很好，不错啊</p>
                                            <span class="date">2016-4-3 15:20:19</span>
                                            <div class="comment-btn on-reply">
                                                <button type="button" class="on">回复<i>1</i></button>
                                                <button type="button">点赞<i>0</i></button>
                                            </div>
                                            <div class="comment-content">
                                                <h4>136*****33回复136*****99：</h4>
                                                <p>你确定？？？？？</p>
                                                <span>2016-4-3 15:20:19</span>
                                            </div>
                                            <form action="">
                                                <textarea rows="4" cols="" placeholder="回复：136*****99"></textarea>
                                                <input type="button" name="" value="提交">
                                                <span class="fr">您还可以输入400字</span>
                                            </form>
                                        </li>
                                        <li class="comment-item">
                                            <div class="person-info">
                                                <img src="images/pro_details/photo.jpg" alt="">
                                                <h3>136*****99</h3>
                                            </div>
                                            <ul class="addition">
                                                <li>颜色：白色</li>
                                                <li>尺寸：40cm</li>
                                            </ul>
                                            <div class="star">       
                                                <div class="star_5">
                                                </div>
                                            </div>
                                            <p class="comment-text">正品好货，质量很好，不错啊</p>
                                            <span class="date">2016-4-3 15:20:19</span>
                                            <div class="comment-btn">
                                                <button type="button">回复<i>0</i></button>
                                                <button type="button">点赞<i>0</i></button>
                                            </div>
                                            <div class="comment-content">
                                            </div>
                                            <form action="">
                                                <textarea rows="4" cols="" placeholder="回复：136*****99"></textarea>
                                                <input type="button" name="" value="提交">
                                                <span class="fr">您还可以输入400字</span>
                                            </form>
                                        </li>
                                        <li class="comment-item">
                                            <div class="person-info">
                                                <img src="images/pro_details/photo.jpg" alt="">
                                                <h3>136*****99</h3>
                                            </div>
                                            <ul class="addition">
                                                <li>颜色：白色</li>
                                                <li>尺寸：40cm</li>
                                            </ul>
                                            <div class="star">       
                                                <div class="star_2">
                                                </div>
                                            </div>
                                            <p class="comment-text">质量不好，太坑了。。。。。。。。。。。。。</p>
                                            <span class="date">2016-4-3 15:20:19</span>
                                            <div class="comment-btn">
                                                <button type="button">回复<i>0</i></button>
                                                <button type="button">点赞<i>0</i></button>
                                            </div>
                                            <div class="comment-content">
                                            </div>
                                            <form action="">
                                                <textarea rows="4" cols="" placeholder="回复：136*****99"></textarea>
                                                <input type="button" name="" value="提交">
                                                <span class="fr">您还可以输入400字</span>
                                            </form>
                                        </li>
                                        <li class="comment-item">
                                            <div class="person-info">
                                                <img src="images/pro_details/photo.jpg" alt="">
                                                <h3>136*****99</h3>
                                            </div>
                                            <ul class="addition">
                                                <li>颜色：白色</li>
                                                <li>尺寸：40cm</li>
                                            </ul>
                                            <div class="star">       
                                                <div class="star_5">
                                                </div>
                                            </div>
                                            <p class="comment-text">正品好货，质量很好，不错啊</p>
                                            <span class="date">2016-4-3 15:20:19</span>
                                            <div class="comment-btn">
                                                <button type="button">回复<i>0</i></button>
                                                <button type="button">点赞<i>0</i></button>
                                            </div>
                                            <div class="comment-content">
                                            </div>
                                            <form action="">
                                                <textarea rows="4" cols="" placeholder="回复：136*****99"></textarea>
                                                <input type="button" name="" value="提交">
                                                <span class="fr">您还可以输入400字</span>
                                            </form>
                                        </li>
                                    </ul>
                                    <div class="paging">
                                        <span><a href="#">上一页</a><a href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a class="on" href="#">5</a>...<a href="#">10</a><a href="#">下一页</a><span>共<b>10</b>页，到第</span><input type="text"><span>页</span><a class="button" href="#">确定</a></span>
                                    </div>
                                </div>
                                <div class="sub-tab">
                                    <ul>
                                        <li class="comment-item">
                                            <div class="person-info">
                                                <img src="images/pro_details/photo.jpg" alt="">
                                                <h3>136*****99</h3>
                                            </div>
                                            <ul class="addition">
                                                <li>颜色：白色</li>
                                                <li>尺寸：40cm</li>
                                            </ul>
                                            <div class="star">       
                                                <div class="star_5">
                                                </div>
                                            </div>
                                            <p class="comment-text">正品好货，质量很好，不错啊</p>
                                            <span class="date">2016-4-3 15:20:19</span>
                                            <div class="comment-btn">
                                                <button type="button">回复<i>0</i></button>
                                                <button type="button">点赞<i>0</i></button>
                                            </div>
                                            <div class="comment-content">
                                            </div>
                                            <form action="">
                                                <textarea rows="4" cols="" placeholder="回复：136*****99"></textarea>
                                                <input type="button" name="" value="提交">
                                                <span class="fr">您还可以输入400字</span>
                                            </form>
                                        </li>
                                    </ul>
                                    <div class="paging">
                                        <span><a href="#">上一页</a><a href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a class="on" href="#">5</a>...<a href="#">10</a><a href="#">下一页</a><span>共<b>10</b>页，到第</span><input type="text"><span>页</span><a class="button" href="#">确定</a></span>
                                    </div>
                                </div>
                                <div class="sub-tab">
                                    <ul>
                                        <li class="comment-item">
                                            <div class="person-info">
                                                <img src="images/pro_details/photo.jpg" alt="">
                                                <h3>136*****99</h3>
                                            </div>
                                            <ul class="addition">
                                                <li>颜色：白色</li>
                                                <li>尺寸：40cm</li>
                                            </ul>
                                            <div class="star">       
                                                <div class="star_5">
                                                </div>
                                            </div>
                                            <p class="comment-text">正品好货，质量很好，不错啊</p>
                                            <span class="date">2016-4-3 15:20:19</span>
                                            <div class="comment-btn">
                                                <button type="button">回复<i>0</i></button>
                                                <button type="button">点赞<i>0</i></button>
                                            </div>
                                            <div class="comment-content">
                                            </div>
                                            <form action="">
                                                <textarea rows="4" cols="" placeholder="回复：136*****99"></textarea>
                                                <input type="button" name="" value="提交">
                                                <span class="fr">您还可以输入400字</span>
                                            </form>
                                        </li>
                                    </ul>
                                    <div class="paging">
                                        <span><a href="#">上一页</a><a href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a class="on" href="#">5</a>...<a href="#">10</a><a href="#">下一页</a><span>共<b>10</b>页，到第</span><input type="text"><span>页</span><a class="button" href="#">确定</a></span>
                                    </div>
                                </div>
                                <div class="sub-tab">
                                    <ul>
                                        <li class="comment-item">
                                            <div class="person-info">
                                                <img src="images/pro_details/photo.jpg" alt="">
                                                <h3>136*****99</h3>
                                            </div>
                                            <ul class="addition">
                                                <li>颜色：白色</li>
                                                <li>尺寸：40cm</li>
                                            </ul>
                                            <div class="star">       
                                                <div class="star_2">
                                                </div>
                                            </div>
                                            <p class="comment-text">质量不好，太坑了。。。。。。。。。。。。。</p>
                                            <span class="date">2016-4-3 15:20:19</span>
                                            <div class="comment-btn">
                                                <button type="button">回复<i>0</i></button>
                                                <button type="button">点赞<i>0</i></button>
                                            </div>
                                            <div class="comment-content">
                                            </div>
                                            <form action="">
                                                <textarea rows="4" cols="" placeholder="回复：136*****99"></textarea>
                                                <input type="button" name="" value="提交">
                                                <span class="fr">您还可以输入400字</span>
                                            </form>
                                        </li>
                                    </ul>
                                    <div class="paging">
                                        <span><a href="#">上一页</a><a href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a class="on" href="#">5</a>...<a href="#">10</a><a href="#">下一页</a><span>共<b>10</b>页，到第</span><input type="text"><span>页</span><a class="button" href="#">确定</a></span>
                                    </div>
                                </div>
                                <div class="sub-tab">
                                    <ul>
                                    </ul>
                                    <div class="paging">
                                        <span><a href="#">上一页</a><a href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a class="on" href="#">5</a>...<a href="#">10</a><a href="#">下一页</a><span>共<b>10</b>页，到第</span><input type="text"><span>页</span><a class="button" href="#">确定</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="tabs-data">
                        
                    </div>
                    <div class="tabs-data">
                        
                    </div>
                    <div class="tabs-data">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    