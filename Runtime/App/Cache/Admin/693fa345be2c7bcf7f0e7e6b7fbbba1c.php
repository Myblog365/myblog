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

    <form action="/thinkblog/index.php/Admin/Cate/update" id="j_custom_form" url="<?php echo U('Cate/index');?>" callback="TabAjaxDone" class="col-md-12 form-label-right center-margin form-validate" method="post" noEnter>
        <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>" />
       <div class="pageContainer">
            <div class="form-row">
                <div class="form-label col-md-2"><label>分类名：</label>
                </div>
                <div class="form-input col-md-7">
                <input type="text" size="30" class="validate[required,minSize[3]] required"  name="name" id="j_name" value="<?php echo ($info["name"]); ?>"  >
               </div>
            </div>
            <div class="form-row">
                <div class="form-label col-md-2"><label>上级分类：</label>
                 </div>
                <div class="col-md-7">
                 <select name="pid"  data-container="body"  id="j_pid" class="selectpicker show-tick" data-style="btn medium bg-green" data-width="auto">
                                   <option value="0">无</option>
                      <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><option value="<?php echo ($list["id"]); ?>" <?php if($info['pid'] == $list['id']): ?>selected<?php endif; ?>><?php echo ($list["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                 </select>
                 </div>
            </div>
           <div class="form-row">
                <div class="form-label col-md-2"><label>状态：</label>
              </div>
                <div class="col-md-7">
               <select name="status"  data-container="body"  id="j_status" class="selectpicker show-tick validate[required]" data-style="btn medium bg-green" data-width="auto">
                               
                                <option <?php if(($info["status"]) == "1"): ?>selected<?php endif; ?> value="1">启用</option>
                                <option <?php if(($info["status"]) == "0"): ?>selected<?php endif; ?> value="0">禁用</option>
                 </select>
                
            </div></div>
                 <div class="form-row">
                <div class="form-label col-md-2"><label>会员权限：</label>
                </div>
                <div class="col-md-7">
               <select name="enable"  data-container="body"  id="j_enable" class="selectpicker show-tick" data-style="btn medium bg-green" data-width="auto">
                               
                                 <option <?php if(($info["enable"]) == "1"): ?>selected<?php endif; ?> value="1">会员可发布</option>
                                <option <?php if(($info["enable"]) == "0"): ?>selected<?php endif; ?> value="0">会员禁止发布</option>
                 </select>
            </div></div>
           <div class="form-row">
                <div class="form-label col-md-2"><label>类型：</label>
                </div>
                <div class="col-md-7">
               <select name="type"  data-container="body"  id="j_type" class="selectpicker show-tick" data-style="btn medium bg-green" data-width="auto">
                              
						 <option value="<?php echo S('catetype');?>"><?php echo get_cate_type(S('catetype'));?></option>
					
                 </select>
                 
            </div>
            
		</div>
				 <div class="form-row">
                <div class="form-label col-md-2"><label>分类描述：</label>
                </div>
                <div class="col-md-7">
              <textarea class="autosize" rows="4" cols="30" name="des"><?php echo ($info["des"]); ?></textarea>
                 
            </div>
            
		</div>
		 <div class="form-row">
		<div class="form-label col-md-2">
<label>分类图片：</label></div>
<div class="col-md-7">
					<input type="file" id="upload_picture_advspic">
					<input type="hidden" name="img" id="cover_id_advspic" value="<?php echo ($info["img"]); ?>"/>
					<div class="upload-img-box">
						<?php if(!empty($info['img'])): ?><div class="upload-pre-item">
						<img src="/thinkblog<?php echo ($info["path"]); ?>" width="100" height="100"/></div><?php endif; ?>
					</div>
				
		
					</div>
			</div>
			
<script type="text/javascript">
$(function(){
	setTimeout(function(){
	$("#upload_picture_advspic").uploadify({
        "height"          : 30,
        "swf"             : "/thinkblog/Public/static/uploadify/uploadify.swf",
        "fileObjName"     : "Picture",
        "buttonText"      : "<span class='button-content'><i class='glyph-icon icon-picture-o'></i> 上传图片</span>",
        "uploader"        : "<?php echo U('File/uploadPicture',array('session_id'=>session_id()));?>",
        "width"           : 120,
        'removeTimeout'	  : 1,
        'fileTypeExts'	  : '*.jpg; *.png; *.gif;',
        "onUploadSuccess" : uploadPicture<?php echo ($field["name"]); ?>,
        'onFallback' : function() {
            alert('未检测到兼容版本的Flash.');
        }
    });
	},3);


   
});
function uploadPicture<?php echo ($field["name"]); ?>(file,data){
	var data = $.parseJSON(data);
	
	
	var src = '';
    if(data.status){
    	$("#cover_id_advspic").val(data.id);
    	src = data.url || data.path
    	$("#cover_id_advspic").parent().find('.upload-img-box').html(
    		'<div class="upload-pre-item"><img src="' + src + '" width="100" height="100" onclick="imgpop(this)"/></div>'
    	);
    } else {
    	 alertMsg.error(data.info);
    	
    }
}
</script>
		  <div class="actionBar">
               
                <div class="form-input col-md-10 col-md-offset-2">
              <button type="submit" class="btn medium bg-blue">保存</button>
           <button type="button" url="<?php echo U('Cate/index');?>" class="btn-close btn medium bg-red mrg15L">取消</button>
                </div>
            </div>
            </div>
    </form>
    
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