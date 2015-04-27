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



<form id="formsearch" action="<?php echo U('index');?>" method="post">
                               
<div class="example-code">
  <div class="form-label float-left" >
                <label>选择添加分类类型：</label>
                </div>
               <select name="type" data-container="body"  id="j_type" class="selectpicker show-tick" data-style="btn medium ui-state-default" data-width="auto">
                               <?php if(is_array(C("CATE_TYPE"))): $i = 0; $__LIST__ = C("CATE_TYPE");if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?><option <?php if(S('catetype') == $key): ?>selected<?php endif; ?> value="<?php echo ($key); ?>"><?php echo ($type); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                 </select>

            <script type="text/javascript">


$(function(){
	$('#j_type').change(function(){

		
		$('form#formsearch').submit();
	});
});
</script>
   <a href="<?php echo U('add');?>"  rel="useradd" title="新增分类" class="btn medium bg-green">
                <span class="button-content">
                <i class="glyph-icon icon-plus"></i> 新增
                </span>
                </a> 
                <div class="dropdown float-right mrg15R">
                                <a href="javascript:;" class="btn medium bg-blue" title="Example dropdown" data-toggle="dropdown">
                                    <span class="button-content">
                                        <i class="glyph-icon icon-cog float-left"></i>
                                        
                                        批量操作
                                        
                                        <i class="glyph-icon icon-caret-down float-right"></i>
                                    </span>
                                </a>
                               
                                <ul class="dropdown-menu float-right">
                                    
                                     <li class="hidden">
                                        <a href="/thinkblog/index.php/Admin/Cate/outxls/ids/all" target="dwzExport">
                                            <i class="glyph-icon icon-sign-out font-size-13 mrg5R"></i>
                                            <span class="font-bold">导出全部</span>
                                        </a>
                                    </li>
                                     <li class="hidden">
                                        <a href="/thinkblog/index.php/Admin/Cate/outxls" target="checkedExport" idname="ids">
                                            <i class="glyph-icon icon-sign-out font-size-13 mrg5R"></i>
                                            <span class="font-bold">导出选中</span>
                                        </a>
                                    </li>
                                   
                                   
                                    <li class="divider hidden"></li>
                                    <li>
                                        <a class="font-orange" href="<?php echo U('selectedDelete');?>"  title="确定要删除选中信息吗？" target="checkedAjaxTodo" idname="ids">
                                            <i class="glyph-icon icon-trash-o"></i>
                                            删除选中
                                        </a>
                                    </li>
                                </ul>
                            
                            </div>
                             </div>
                           <div class="divider"></div>      
</form>

    <table class="table text-center">
        <thead>
            <tr>
            
            <th>ID</th>
            
				<th class="text-left" width="400">分类</th>
			    <th>状态</th>
               <th>排序</th>
               <th>会员权限</th>
               <th>类型</th>
                <th  width="30"><input type="checkbox" class="checkboxCtrl j-icheck" group="ids"></th>
                <th width="180">操作</th>
            </tr>
        </thead>
        <tbody>

           <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr> <td><?php echo ($vo['id']); ?></td>
					<td class="text-left"><?php echo ($vo['name']); ?></td>
					
		            <td><?php echo (getStatus($vo['status'])); ?></td>
		             <td><?php echo ($vo['ordid']); ?></td>
		             <td>会员<?php echo (getenablename($vo['enable'],3)); ?>发布文章</td>
		             <td class="text-center"><?php echo (get_cate_type($vo['type'])); ?></td>
                <td class="text-center"><input type="checkbox" name="ids" class="j-icheck" value="<?php echo ($vo['id']); ?>"></td>
                <td>
                <div class="btn-group  btn-group-xs">
                 <a href="<?php echo U('edit',array('id'=>$vo['id']));?>"   class="btn small bg-blue"   ><span class="button-content"><i class="glyph-icon icon-edit"></i> 编辑</span></a>
                    <?php echo (showStatus($vo['status'],$vo['id'],CONTROLLER_NAME)); ?>
                    <a href="<?php echo U('foreverdelete',array('id'=>$vo['id']));?>" class="btn small bg-red" target="ajaxTodo" title="确定要删除该行信息吗？"> <span class="button-content"><i class="glyph-icon icon-trash-o"></i> 删除</span></a>
                    </div>
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

</script>
<script>

	
	setactive("<?php echo ($breadcrumb['id']); ?>");



</script>






</body>
</html>