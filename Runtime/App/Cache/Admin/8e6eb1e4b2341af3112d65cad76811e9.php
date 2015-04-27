<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
    <html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Myblog365-后台管理</title>
        <meta name="description" content="kevin-Myblog365交流博客">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">


        <!-- CSS Core -->
<link rel="shortcut icon" href="/thinkblog/Public/static/images/favicon.jpg">
        <link rel="stylesheet" type="text/css" href="/thinkblog/Public/admin/css/app.css">
        <link id="layout-theme" rel="stylesheet" type="text/css" href="/thinkblog/Public/admin/css/default.min.css">
        <!-- JS -->
      <script type="text/javascript" src="/thinkblog/Public/static/jquery-1.10.2.min.js"></script>

</head>
<body class="fixed-sidebar fixed-header">



<div id="page-wrapper" class="demo-example">

<div id="page-sidebar">
<div id="header-logo">
                   

                    <a href="javascript:;" class="tooltip-button" data-placement="bottom" title="Close sidebar" id="close-sidebar">
                        <i class="glyph-icon icon-align-justify"></i>
                    </a>
                    <a href="javascript:;" class="tooltip-button hidden" data-placement="bottom" title="Open sidebar" id="rm-close-sidebar">
                        <i class="glyph-icon icon-align-justify"></i>
                    </a>
                    <a href="javascript:;" class="tooltip-button hidden" title="Navigation Menu" id="responsive-open-menu">
                        <i class="glyph-icon icon-align-justify"></i>
                    </a>
</div>

                <div id="sidebar-menu" class="scrollable-content">
                    <ul>
                        <li>
                            <a href="<?php echo U('Admin/Index/index');?>"  title="Dashboard">
                                <i class="glyph-icon icon-dashboard"></i>
                                后台首页
                            </a>
                        </li>
                                 <?php if(is_array($groups)): $i = 0; $__LIST__ = $groups;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="sub-menu">
                      <a href="javascript:;" >
                      <i class="glyph-icon <?php echo ($vo['icon']); ?>"></i>
                          
                          <span> <?php echo ($vo["title"]); ?></span>
                      </a>
                     
                      <ul class="sub">
                       <?php if(is_array($menu[$vo['id']])): $i = 0; $__LIST__ = $menu[$vo['id']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vosub): $mod = ($i % 2 );++$i;?><li>
                          <?php if($vosub['hassub'] == 1): ?><a href="javascript:void(0);"  zs-id="<?php echo ($vosub['id']); ?>" ><i class="glyph-icon <?php echo ($vosub['icon']); ?>"></i><?php echo ($vosub["title"]); ?></a>                        
                          
                           <ul class="sub mrg10A">
                           <?php if(is_array($vosub['sub'])): $i = 0; $__LIST__ = $vosub['sub'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vosubsub): $mod = ($i % 2 );++$i;?><li><a  href="<?php echo ($vosubsub['url']); ?>" rel="<?php echo ($vosubsub['rel']); ?>"  zs-id="<?php echo ($vosubsub['id']); ?>"><i class="glyph-icon icon-chevron-right"></i><?php echo ($vosubsub["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>    
                            </ul>
                          <?php else: ?>
                          <a href="<?php echo ($vosub['url']); ?>" rel="<?php echo ($vosub['rel']); ?>"  zs-id="<?php echo ($vosub['id']); ?>"><i class="glyph-icon  <?php echo ($vosub['icon']); ?>"></i><?php echo ($vosub["title"]); ?></a><?php endif; ?>

                         
                          
                          
                          </li><?php endforeach; endif; else: echo "" ;endif; ?>
                         
                      </ul>
                     
                  </li><?php endforeach; endif; else: echo "" ;endif; ?>
                       
                       
                    </ul>
                    
        
                </div>

            </div><!-- #page-sidebar -->

<div id="page-main">
<div id="page-main-wrapper">

                   <div id="page-header" class="clearfix">
                        <div id="page-header-wrapper" class="clearfix">
                            
                            
                            
                            
                            <div class="top-icon-bar dropdown">
                                <a href="javascript:;" title="" class="user-ico clearfix" data-toggle="dropdown">
                                    <img width="36" src="<?php echo ($userinfo['avatar64']); ?>" alt="<?php echo ($userinfo["nickname"]); ?>">
                                    <span><?php echo ($userinfo["nickname"]); ?></span>
                                    <i class="glyph-icon icon-chevron-down"></i>
                                </a>
                                <ul class="dropdown-menu float-right">
                                    
                                    <li>
                                        <a href="<?php echo U('Public/password');?>"  width="460px" height="280px" target=dialog title="修改密码">
                                            <i class="glyph-icon icon-cog mrg5R"></i>
                                            修改密码
                                        </a>
                                    </li>
                                    <li>
                                        <a class="font-orange" href="<?php echo U('Home/Index/index');?>" title="">
                                            <i class="glyph-icon icon-flag mrg5R"></i>
                                            返回前台
                                        </a>
                                    </li>
                                   
                                    <li class="divider"></li>
                                     <li>
                                        <a href="<?php echo U('Public/logout');?>" target="AjaxTodo" title="你确定要退出后台管理吗？">
                                        
                                            <i class="glyph-icon icon-sign-out font-size-13 mrg5R"></i>
                                            <span class="font-bold">退出</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            <div class="top-icon-bar">
                               <a href="<?php echo U('Public/cleancache');?>" target="AjaxTodo" >
                                   
                                     <i class="glyph-icon icon-wrench"></i>
                                     清理缓存
                                   
                                </a>
                                
                            </div>
                            

                            

                        </div>
                    </div><!-- #page-header -->

<div id="page-breadcrumb-wrapper">


<div id="page-breadcrumb">
                            <a href="<?php echo ($breadcrumb['purl']); ?>" id="parentname" title="<?php echo ($breadcrumb['pname']); ?>">
                                <i class="glyph-icon icon-dashboard"></i>
                                <?php echo ($breadcrumb['pname']); ?>
                            </a>
                           
                            <span class="current" id="activeaname">
                                <?php echo ($breadcrumb['localname']); ?>
                            </span>
                        </div>
                        
                     


    </div><!-- #page-breadcrumb-wrapper -->

<div id="page-content">


<div class="example-code">


  <a href="<?php echo U('create');?>" rel="addoncreate"  title="创建插件"  class="btn medium bg-green">
  <span class="button-content">
                <i class="glyph-icon icon-plus"></i> 快速创建插件
                </span>
                </a></a>
                               
          
                     
    </div>
    <div class="divider"></div>

<table class="table text-left"  id="zstable">
        <thead>
            <tr>
               
                 <th width="100">名称</th>
                <th>标识</th>
                <th width="400">描述</th>
					<th width="50">状态</th>
					<th>作者</th>
					<th class="nosort" width="50">版本</th>
					<th class="nosort text-center" width="200">操作</th>
            </tr>
        </thead>
        <tbody>
           <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
               <td><?php echo ($vo["title"]); ?></td>
					<td><?php echo ($vo["name"]); ?></td>
					<td><?php echo ($vo["description"]); ?></td>
					<td><?php echo ((isset($vo["status_text"]) && ($vo["status_text"] !== ""))?($vo["status_text"]):"未安装"); ?></td>
					<td><a target="_blank" href="<?php echo ((isset($vo["url"]) && ($vo["url"] !== ""))?($vo["url"]):'http://www.zswin.cn'); ?>"><?php echo ($vo["author"]); ?></a></td>
					<td><?php echo ($vo["version"]); ?></td>
					<td>
						<?php if(($vo["uninstall"]) == "0"): if($vo['config'] != 'null'): ?><a  title="<?php echo ($vo["title"]); ?>设置" class="btn small bg-blue" href="<?php echo U('config',array('id'=>$vo['id']));?>">  <span class="button-content"><i class="glyph-icon icon-gear"></i> 设置</span></a><?php endif; ?>
						<?php echo (showStatus($vo['status'],$vo['id'],CONTROLLER_NAME)); ?>
							
							 
								<a class="btn small bg-red" target="ajaxTodo"   href="<?php echo U('uninstall',array('id'=>$vo['id']));?>" <?php if(($vo['has_adminlist']) == "1"): ?>onclick="removenode(this)"<?php endif; ?> zs-name="<?php echo ($vo['name']); ?>"  >  <span class="button-content"><i class="glyph-icon icon-th"></i> 卸载</span></a>
							
						<?php else: ?>
							<a class="btn small bg-green" target="ajaxTodo" <?php if(($vo['has_adminlist']) == "1"): ?>onclick="addnode(this)"<?php endif; ?>  zs-name="<?php echo ($vo['name']); ?>" zs-title="<?php echo ($vo['title']); ?>" zs-url="<?php echo U('Admin/Addons/adminList');?>&name=<?php echo ($vo['name']); ?>"   href="<?php echo U('install',array('addon_name'=>$vo['name']));?>">  <span class="button-content"><i class="glyph-icon icon-wrench"></i> 安装</span></a><?php endif; ?>
					</td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>


	</div><!-- #page-content -->
                


</div><!-- #page-main -->
</div><!-- #page-main-wrapper -->
</div><!-- #page-wrapper -->







  
        <!--[if lt IE 9]>
          <script src="/thinkblog/Public/static/html5.js"></script>
          <script src="/thinkblog/Public/static/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript" src="/thinkblog/Public/static/uploadify/jquery.uploadify.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/thinkblog/Public/static/uploadify/uploadify.css"> 
        <script type="text/javascript" src="/thinkblog/Public/static/layer/layeradmin.js"></script>
         <script type="text/javascript" src="/thinkblog/Public/static/kindeditor/kindeditor-all.js"></script>
         <script type="text/javascript" src="/thinkblog/Public/admin/js/app.js"></script>
         <script type="text/javascript" src="/thinkblog/Public/admin/js/core.js"></script>
    

<script type="text/javascript">

var _STATIC_ = "/thinkblog/Public/static";
var _APP_="/thinkblog/index.php";
var _PUBLIC_="/thinkblog/Public";
$(function(){
	initUI();
});

var editor = KindEditor.create('textarea.editor');

KindEditor.ready(function(K) {

    editor = K.create('textarea[name="description"]');
    K('#image').click(function() {
        editor.loadPlugin('image', function() {
            editor.plugin.imageDialog({
                imageUrl : K('#thumb').val(),
                clickFn : function(url, title, width, height, border, align) {
                    K('#thumb').val(url);
                    editor.hideDialog();
                }
            });
        });
    });
});

</script>
<script>

	
	setactive("<?php echo ($breadcrumb['id']); ?>");



</script>






</body>
</html>