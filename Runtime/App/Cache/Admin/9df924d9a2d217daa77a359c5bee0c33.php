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

        <div class="row mrg20B">

            <div class="col-lg-3">

                <a href="javascript:;" class="tile-button btn bg-blue-alt" title="">
                    <div class="tile-header">
                        全站浏览量
                    </div>
                    <div class="tile-content-wrapper">
                        <i class="glyph-icon icon-dashboard"></i>
                        <div class="tile-content">
                            <span>L</span>
                            <?php echo ($views); ?>
                        </div>
                        <small>
                            <i class="glyph-icon icon-caret-up"></i>
                            所有文章被浏览量
                        </small>
                    </div>
                   
                </a>

            </div>

            <div class="col-lg-3">

                <a href="javascript:;" class="tile-button btn bg-green" title="">
                    <div class="tile-header">
                        全站文章数
                    </div>
                    <div class="tile-content-wrapper">
                        <i class="glyph-icon icon-bar-chart-o"></i>
                        <div class="tile-content">
                            <span>A</span>
                            <?php echo ($artcount); ?>
                        </div>
                        <small>
                            <i class="glyph-icon icon-caret-up"></i>
                            已发布的文章总数
                        </small>
                    </div>
                  
                </a>

            </div>


            <div class="col-lg-3">

                <a href="javascript:;" class="tile-button btn bg-gray-alt" title="">
                    <div class="tile-header">
                        全站用户
                    </div>
                    <div class="tile-content-wrapper">
                        <i class="glyph-icon icon-users"></i>
                        <div class="tile-content">
                            <span>@</span>
                            <?php echo ($usercount); ?>
                        </div>
                        <small>
                            <i class="glyph-icon icon-caret-up"></i>
                            全站实际用户数
                        </small>
                    </div>
                  
                </a>

            </div>

            <div class="col-lg-3">

                <a href="javascript:;" class="tile-button btn bg-red" title="">
                    <div class="tile-header">
                        当前版本号
                    </div>
                    <div class="tile-content-wrapper">
                        <i class="glyph-icon icon-anchor"></i>
                        <div class="tile-content">
                            <span>V</span>
                            <?php echo C('SYSTEM_UPDATRE_VERSION');?>
                        </div>
                        <small>
                            <i class="glyph-icon icon-caret-up"></i>
                            升级请联系官方
                        </small>
                    </div>
                  
                </a>

            </div>

        </div>


    </div>
<div class="example-code">

        <ul class="notifications-box">
            <li>
                <div class="row">
                    <div class="col-lg-5">
                        <span class="btn bg-red icon-notification glyph-icon icon-asterisk"></span>
                        <span class="notification-text">官网地址：http://myblog365.xyz</span>
                        <div class="notification-time">

                            <span class="glyph-icon icon-time"></span>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <span class="btn bg-red icon-notification glyph-icon icon-asterisk"></span>
                        <span class="notification-text">博客技术支持：791845283</span>
                        <div class="notification-time">

                            <span class="glyph-icon icon-time"></span>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-lg-5">
                        <span class="btn bg-orange icon-notification glyph-icon icon-asterisk"></span>
                        <span class="notification-text">操作系统：<?php echo ($ap); ?></span>
                        <div class="notification-time">

                            <span class="glyph-icon icon-time"></span>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <span class="btn bg-orange icon-notification glyph-icon icon-asterisk"></span>
                        <span class="notification-text">系统版本：<?php echo ($xt); ?></span>
                        <div class="notification-time">

                            <span class="glyph-icon icon-time"></span>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-lg-5">
                        <span class="bg-blue btn icon-notification glyph-icon icon-asterisk"></span>
                        <span class="notification-text">数据库版本：<?php echo ($mysqlVersion); ?></span>
                        <div class="notification-time">

                            <span class="glyph-icon icon-time"></span>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <span class="bg-blue btn icon-notification glyph-icon icon-asterisk"></span>
                        <span class="notification-text">数据库大小：<?php echo ($mysqlSize); ?></span>
                        <div class="notification-time">

                            <span class="glyph-icon icon-time"></span>
                        </div>
                    </div>
                </div>
            </li>
             <li>
                 <div class="row">
                     <div class="col-lg-5">
                        <span class="bg-green btn icon-notification glyph-icon icon-asterisk"></span>
                        <span class="notification-text">服务器：<?php echo ($sw); ?></span>
                        <div class="notification-time">

                            <span class="glyph-icon icon-time"></span>
                        </div>
                     </div>
                     <div class="col-lg-5">
                         <span class="bg-green btn icon-notification glyph-icon icon-asterisk"></span>
                         <span class="notification-text">磁盘大小：<?php echo ($fs); ?></span>
                         <div class="notification-time">

                             <span class="glyph-icon icon-time"></span>
                         </div>
                     </div>
                 </div>
            </li>
            
        </ul>

    </div>


                

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