<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
    <html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>zswin SNS-BLOG后台管理</title>
        <meta name="description" content="zswin社交类博客">
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


    <form action="<?php echo U('build',array('navTabId'=>'Addons'));?>" id="j_custom_form" url="<?php echo U('index');?>" class="form-validate  col-md-12" method="post" callback="TabAjaxDone" noEnter>
      
     
        <div class="form-row">
	 <div class="form-label col-md-2 text-right">
                    <label>标识名:</label>
                    </div>
	 <div class="form-input col-md-5">
				<input type="text" name="info[name]" value="Example">
	<div class="font-yellow mrg10T">请输入插件标识</div>
	</div>
	</div>
		 <div class="form-row">
	 <div class="form-label col-md-2 text-right"><label>插件名:</label></div>
	<div class="form-input col-md-5">
				<input type="text" name="info[title]" value="示列">
			<div class="font-yellow mrg10T">请输入插件名</div>
	</div>
	</div>
		 <div class="form-row">
	 <div class="form-label col-md-2 text-right"><label>版本:</label></div>
	<div class="form-input col-md-5">
				<input type="text" name="info[version]" value="0.1">
			<div class="font-yellow mrg10T">请输入插件版本</div>
	</div>
	</div>
		 <div class="form-row">
	 <div class="form-label col-md-2 text-right"><label>作者:</label></div>
	<div class="form-input col-md-5">
				<input type="text" name="info[author]" value="无名">
			<div class="font-yellow mrg10T">请输入插件作者</div>
	</div>
	</div>
		 <div class="form-row">
	 <div class="form-label col-md-2 text-right"><label>描述:</label></div>
	<div class="form-input col-md-5">
				
					<textarea name="info[description]" rows="4" cols="40">这是一个临时描述</textarea>
				
			<div class="font-yellow mrg10T">请输入描述</div>
	</div>
	</div>
		 <div class="form-row">
	 <div class="form-label col-md-2 text-right"><label>安装后是否启用:</label></div>
		<div class="form-input col-md-5">
				<label class="ilabel">
					<input type="checkbox"  class="j-icheck" name="info[status]" value="1" checked />
				</label>
			
		</div>
		</div>
		 <div class="form-row">
	 <div class="form-label col-md-2 text-right"><label>是否需要配置:</label></div>
			<div class="form-input col-md-5">
				<label class="ilabel"><input type="checkbox"  class="j-icheck" id="has_config" name="has_config" value="1" /></label>
				<label class="textarea has_config hidden">
					<textarea name="config" class="autosize" rows="4" cols="50">
          &lt;?php
        return array(
	    'random'=>array(//配置在表单中的键名 ,这个会是config[random]
		'title'=>'是否开启随机:',//表单的文字
		'type'=>'radio',		 //表单的类型：text、textarea、checkbox、radio、select等
		'options'=>array(		 //select 和radion、checkbox的子选项
			'1'=>'开启',		 //值=>文字
			'0'=>'关闭',
		),
		'value'=>'1',			 //表单的默认值
	),
);
					</textarea>
				</label>
				
				<input type="text" class="has_config hidden" name="custom_config">
				<div class="font-yellow mrg10T has_config hidden">自定义模板,注意：自定义模板里的表单name必须为config[name]这种，获取保存后配置的值用$data.config.name</div>
			</div>
		</div>
		 <div class="form-row">
	 <div class="form-label col-md-2 text-right"><label>是否需要外部访问:</label></div>
			<div class="form-input col-md-5">
				<input type="checkbox" class="j-icheck" name="has_outurl" value="1" />
			
		</div>
		</div>
		 <div class="form-row">
	 <div class="form-label col-md-2 text-right"><label>实现的钩子方法:</label></div>
			<div class="form-input col-md-5">
			 <div class="tags-control tagsinput " data-url="<?php echo U('gethooks');?>" data-parametername="hook[]" data-clearnotfound="true">
               <input type="text" class="tag-input autosize" value="" />
             </div>
			
			
		</div>
		</div>
		 <div class="form-row">
	 <div class="form-label col-md-2 text-right"><label>是否需要后台列表:</label></div>
			<div class="form-input col-md-5">
				<label class="ilabel">
					<input type="checkbox" class="j-icheck" id="has_adminlist" name="has_adminlist" value="1" />勾选，扩展里已装插件后台列表会出现插件名的列表菜单，如系统的附件
				</label>
				<label class="textarea has_adminlist hidden">
					<textarea name="admin_list" class="autosize" cols="50" rows="4">
            'model'=>'Example',		//要查的表
			'fields'=>'*',			//要查的字段
			'map'=>'',				//查询条件, 如果需要可以再插件类的构造方法里动态重置这个属性
			'order'=>'id desc',		//排序,
			'listKey'=>array( 		//这里定义的是除了id序号外的表格里字段显示的表头名
			'字段名'=>'表头显示名'
			),
					</textarea>
				</label>
				<input type="text" class="has_adminlist hidden" name="custom_adminlist">
				<div class="font-yellow mrg10T has_adminlist hidden">自定义模板,注意：自定义模板里的列表变量为$_list这种,遍历后可以用listkey可以控制表头显示,也可以完全手写，分页变量用$_page</div>
			
			</div>
		</div>
              
 
	 <div class="actionBar">
		<div class="form-input mrg20B text-right">
           <button type="submit" class="btn medium bg-blue">保存</button>
           <button type="button" url="<?php echo U('index');?>" class="btn-close btn medium bg-red mrg15L">取消</button>
       </div>    
		</div>
    </form>


	<script type="text/javascript">
		function bindShow(radio_bind, selectors){
			$(radio_bind).on('ifChanged',function(){
				
				$(selectors).toggleClass('hidden');
			})
		}

		//配置的动态
		bindShow('#has_config','.has_config');
		bindShow('#has_adminlist','.has_adminlist');


		
	</script>
	
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

</script>
<script>

	
	setactive("<?php echo ($breadcrumb['id']); ?>");



</script>






</body>
</html>