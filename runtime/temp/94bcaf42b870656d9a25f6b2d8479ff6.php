<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:71:"E:\webserver\PHPTutorial\WWW\tp5\public/../app/admin\view\Menu\add.html";i:1560822296;s:66:"E:\webserver\PHPTutorial\WWW\tp5\app\admin\view\Public\header.html";i:1560420240;s:66:"E:\webserver\PHPTutorial\WWW\tp5\app\admin\view\Public\footer.html";i:1560075502;}*/ ?>
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
<form class="layui-form" action="" method="post" enctype="multipart/form-data">
  <div class="layui-form-item">
    <label class="layui-form-label">类别</label>
    <div class="layui-input-inline">
      <select name="type" id="type">
        <option  value="0">后台</option>        
        <option value="1" >前台</option>        
      </select>
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">级别</label>
    <div class="layui-input-inline">
      <select name="pid">
        <option  value="0">一级分类</option>    
        <?php if(is_array($nav_list) || $nav_list instanceof \think\Collection || $nav_list instanceof \think\Paginator): $i = 0; $__LIST__ = $nav_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <option value="<?php echo $vo['id']; ?>" ><?php echo $vo['menu_name']; ?></option>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </select>
    </div>
  </div>
  <div class="layui-form-item">
      <label class="layui-form-label">模块名称</label>
      <div class="layui-input-inline">
        <input name="menu_name" id="menu_name" class="layui-input" type="text" required="required">
      </div>
  </div>

  <div class="layui-form-item">
      <label class="layui-form-label">控制器</label>
      <div class="layui-input-inline">
        <input name="class_name" id="class_name" class="layui-input" type="text" required="required">
      </div>
  </div>

  <div class="layui-form-item">
      <label class="layui-form-label">排序</label>
      <div class="layui-input-inline">
        <input name="sort" id="sort" class="layui-input" type="number" required="required">
      </div>
  </div>

  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-filter="demo1" disabled  lay-submit="" id="btn">立即提交</button>
      <button class="layui-btn layui-btn-primary" type="reset">重置</button>
    </div>
  </div>
</form>
 

<script>
//Demo
layui.use('form', function(){
   var form = layui.form;
  // //监听提交
  // form.on('submit(formDemo)', function(data){
  //   layer.msg(JSON.stringify(data.field));
  //   return false;
  // });
});
var m=0,c=0,s=0;
    $(function () {
      //
      $('#menu_name').blur(function(){
          check_name();
          check_form();
      })
      //
      $('#class_name').blur(function(){
          check_con();
          check_form();
      })
      
      //
      $('#sort').blur(function(){
          check_sort();
          check_form();
      })

  })
    //
    function check_name(){
        var name=$('#menu_name').val();
        var type=$('#type').val();
        var reg=/^[^x00-xff]{2,8}$/;
        if(!reg.test(name)){
          m=0;
          layer.msg('请输入2-8位中文！');
        }else{
            $.ajax({
                type:"POST",
                url :"<?php echo url('ajax'); ?>",
                data:{"menu_name":name,"type":type},
                success:function(msg){
                    if(msg==1){
                        m=0;
                       layer.msg('模块名已存在，请重新输入！');
                    }else{
                        m=1;
                    }
                }
            });
        }
    }
    //
    function check_con(){
        var menu_con=$('#class_name').val();
        var type=$('#type').val();
        var reg=/^[a-z]{2,15}$/i;//加i不区分大小写
        if(!reg.test(menu_con)){
          c=0;
          layer.msg('请输入2-30位小写字母！');
        }else{
            $.ajax({
                type:"POST",
                url :"<?php echo url('ajax'); ?>",
                data:{"class_name":menu_con,"type":type},
                success:function(msg){
                    if(msg==1){
                        c=0;
                        layer.msg('应用名已存在，请重新输入！');
                    }else{
                        c=1;
                    }
                }
            });
        }
    }
    
      function check_sort(){
          var sort=$('#sort').val();
        var reg=/^[0-9]{1,3}$/;
        if(!reg.test(sort)){
            s=0;
            layer.msg('请输入1-3位数字');
        }else {
            s=1;
        }

      }
    function check_form(){
      console.log(m,c,s);
        if(m==1&&c==1&&s==1){
           $('#btn').attr('disabled',false);
        }else {
            $('#btn').attr('disabled',true);
        }
    }
  </script>
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