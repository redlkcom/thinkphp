<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"E:\webserver\PHPTutorial\WWW\tp5\public/../app/admin\view\Menu\index.html";i:1560579103;s:66:"E:\webserver\PHPTutorial\WWW\tp5\app\admin\view\Public\header.html";i:1560420240;s:66:"E:\webserver\PHPTutorial\WWW\tp5\app\admin\view\Public\footer.html";i:1560075502;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>后台管理</title>
  <base href="/public/static/admin/lay/">
  <link rel="stylesheet" href="css/layui.css">
  <link rel="stylesheet" href="/public/static/admin/boot/css/bootstrap.css">
  <script src="layui.js"></script>
  <script src="jquery-1.11.2.min.js"></script>
 <!--  <script src="layui.all.js"></script> -->
 <style type="text/css">
    a {text-decoration: none;}
</style>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo">管理中心</div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <ul class="layui-nav layui-layout-left">
      <li class="layui-nav-item"><a href="<?php echo url('Index/'); ?>">控制台</a></li>
      <li class="layui-nav-item"><a href="">商品管理</a></li>
      <li class="layui-nav-item"><a href="">用户</a></li>
      <li class="layui-nav-item">
        <a href="javascript:;">其它系统</a>
        <dl class="layui-nav-child">
          <dd><a href="">邮件管理</a></dd>
          <dd><a href="">消息管理</a></dd>
          <dd><a href="">授权管理</a></dd>
        </dl>
      </li>
    </ul>
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="javascript:;">
          <img src="a.jpg" class="layui-nav-img">
          <?php echo \think\Session::get('user.username'); ?>
        </a>
        <dl class="layui-nav-child">
          <dd><a href="">基本资料</a></dd>
          <dd><a href="">安全设置</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item"><a href="<?php echo url('User/logout'); ?>">退出</a></li>
    </ul>
  </div>
  
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <ul class="layui-nav layui-nav-tree"  lay-filter="test">
        <li class="layui-nav-item"><a href="<?php echo url('Index/index'); ?>">首页</a></li>
        <?php if(is_array($nav_list) || $nav_list instanceof \think\Collection || $nav_list instanceof \think\Paginator): $i = 0; $__LIST__ = $nav_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(in_array(($vo['id']), is_array(\think\Session::get('level'))?\think\Session::get('level'):explode(',',\think\Session::get('level')))): ?>
        <li class="layui-nav-item layui-nav-itemed">
          <a class="" href="javascript:;"><?php echo $vo['menu_name']; ?></a>
          <dl class="layui-nav-child">
            <?php if(is_array($vo['child']) || $vo['child'] instanceof \think\Collection || $vo['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;if(in_array(($sub['id']), is_array(\think\Session::get('level'))?\think\Session::get('level'):explode(',',\think\Session::get('level')))): ?>
            <dd><a href="<?php echo url($sub['class_name']); ?>"><?php echo $sub['menu_name']; ?></a></dd>
            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
          </dl>
        </li>
        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div>
  </div>
  <div class="layui-body">
  <div style="padding: 15px;">
<a href="<?php echo url('add'); ?>" class="layui-btn">
  <i class="layui-icon">&#xe608;</i> 添加
</a>
<table class="layui-table">
  <colgroup>
    <col width="150">
    <col width="200">
    <col>
  </colgroup>
  <thead>
    <tr>
      <th>id</th>
      <th>模块名</th>
      <th>控制器</th>
      <th>类型</th>
      <th>分组</th>
      
      <th>操作</th>
    </tr> 
  </thead>
  <tbody>
    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <tr>
      <td><?php echo $vo['id']; ?></td>
      <td><?php echo $vo['menu_name']; ?></td>
      <td><?php echo $vo['class_name']; ?></td>
      <td>
        <?php if(($vo['type'] == 0)): ?>后台
          <?php else: ?>前台
        <?php endif; ?>
        </td>
      <td><?php echo $vo['pid']; ?></td>
      <td><a href="javascript:void(0)" class="layui-btn layui-btn-danger del" url="<?php echo url('luo_del',['id'=>$vo['id']]); ?>">删除</a>
        </td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
  </tbody>
</table>
<?php echo $list->render(); ?>
</div>
</div>
 <!-- <div class="layui-footer">
    <!-- 底部固定区域 -->
    
  </div> -->
</div>

<script>
//JavaScript代码区域
layui.use('element', function(){
  var element = layui.element;
});

layui.use('layer',function(){
  	$('.del').click(function(){
  		var url=$(this).attr('url');
  		layer.confirm('确定删除？',{icon:3,title:'提示'},function(index){
  			$(location).attr('href',url);
  			layer.close(index);
  		});
  	})
  });
</script>
</body>
</html>