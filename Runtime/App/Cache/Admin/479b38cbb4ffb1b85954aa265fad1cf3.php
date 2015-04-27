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
                            <a href="<?php echo U('Addons/index');?>" id="parentname" title="插件管理">
                                <i class="glyph-icon icon-dashboard"></i>
                                插件管理
                            </a>
                           
                            <span class="current" id="activeaname">
                               插件配置 [ <?php echo ($data["title"]); ?> ]
                            </span>
                        </div>
                        
                        
                    



    </div><!-- #page-breadcrumb-wrapper -->

<div id="page-content">

    <form action="<?php echo U('saveConfig');?>" id="j_custom_form" url="<?php echo U('index');?>" class="col-md-12 form-validate" method="post" callback="TabAjaxDone" noEnter>
      <input type="hidden" name="id" value="<?php echo I('id');?>" readonly>

       
        
              <?php if(empty($custom_config)): if(is_array($data['config'])): foreach($data['config'] as $o_key=>$form): ?><div class="form-row">
				<div class="form-label col-md-2 text-right"><label><?php echo ((isset($form["title"]) && ($form["title"] !== ""))?($form["title"]):''); ?></label>	</div>
					 <div class="form-input col-md-7">
						<?php switch($form["type"]): case "text": ?><input type="text" name="config[<?php echo ($o_key); ?>]" class="form-control" value="<?php echo ($form["value"]); ?>"><?php break;?>
							<?php case "password": ?><input type="password" name="config[<?php echo ($o_key); ?>]" class="form-control" value="<?php echo ($form["value"]); ?>"><?php break;?>
							<?php case "hidden": ?><input type="hidden" name="config[<?php echo ($o_key); ?>]" value="<?php echo ($form["value"]); ?>"><?php break;?>
							<?php case "radio": if(is_array($form["options"])): foreach($form["options"] as $opt_k=>$opt): ?><label class="ilabel">
										<input type="radio" class="j-icheck" name="config[<?php echo ($o_key); ?>]" value="<?php echo ($opt_k); ?>" <?php if(($form["value"]) == $opt_k): ?>checked<?php endif; ?>><?php echo ($opt); ?>
									</label><?php endforeach; endif; break;?>
							<?php case "checkbox": if(is_array($form["options"])): foreach($form["options"] as $opt_k=>$opt): ?><label class="ilabel">
										<?php is_null($form["value"]) && $form["value"] = array(); ?>
										<input type="checkbox" class="j-icheck" name="config[<?php echo ($o_key); ?>][]" value="<?php echo ($opt_k); ?>" <?php if(in_array(($opt_k), is_array($form["value"])?$form["value"]:explode(',',$form["value"]))): ?>checked<?php endif; ?>><?php echo ($opt); ?>
									</label><?php endforeach; endif; break;?>
							<?php case "select": ?><select name="config[<?php echo ($o_key); ?>]"  class="selectpicker show-tick"  data-style="btn medium bg-green" data-width="auto" data-container="body">
									<?php if(is_array($form["options"])): foreach($form["options"] as $opt_k=>$opt): ?><option value="<?php echo ($opt_k); ?>" <?php if(($form["value"]) == $opt_k): ?>selected<?php endif; ?>><?php echo ($opt); ?></option><?php endforeach; endif; ?>
								</select><?php break;?>
							<?php case "textarea": ?><textarea class="autosize" rows="4" cols="30" name="config[<?php echo ($o_key); ?>]"><?php echo ($form["value"]); ?></textarea><?php break;?>
							<?php case "picture_union": ?><input type="file" id="upload_picture_<?php echo ($o_key); ?>">
								<input type="hidden" name="config[<?php echo ($o_key); ?>]" id="cover_id_<?php echo ($o_key); ?>" value="<?php echo ($form["value"]); ?>"/>
								<div class="upload-img-box">
									<?php if(!empty($form['value'])): $mulimages = explode(",", $form["value"]); ?>
									<?php if(is_array($mulimages)): foreach($mulimages as $key=>$one): ?><div class="upload-pre-item" val="<?php echo ($one); ?>">
											<img width="100" height="70" src="<?php echo (get_cover($one,'path')); ?>"  ondblclick="removePicture<?php echo ($o_key); ?>(this)"/>
										</div><?php endforeach; endif; endif; ?>
								</div>
								
								<script type="text/javascript">
									//上传图片
									/* 初始化上传插件 */
									setTimeout(function(){	
									$("#upload_picture_<?php echo ($o_key); ?>").uploadify({
										"height"          : 30,
										"swf"             : "/thinkblog/Public/static/uploadify/uploadify.swf",
										"fileObjName"     : "Picture",
										"buttonText"      : "<span class='button-content'><i class='glyph-icon icon-picture-o'></i> 上传图片</span>",
										"uploader"        : "<?php echo U('File/uploadPicture',array('session_id'=>session_id()));?>",
										"width"           : 120,
										'removeTimeout'   : 1,
										'fileTypeExts'    : '*.jpg; *.png; *.gif;',
										"onUploadSuccess" : uploadPicture<?php echo ($o_key); ?>,
										'onFallback' : function() {
								            alert('未检测到兼容版本的Flash.');
								        }
									});
									},3);
									function uploadPicture<?php echo ($o_key); ?>(file, data){
										var data = $.parseJSON(data);
										var src = '';
										if(data.status){
											src = data.url || data.path
											$("#cover_id_<?php echo ($o_key); ?>").parent().find('.upload-img-box').append(
												'<div class="upload-pre-item" val="' + data.id + '"><img src="' + src + '" width="120" height="120" OnClick="imgpop(this)" ondblclick="removePicture<?php echo ($o_key); ?>(this)"/></div>'
											);
											setPictureIds<?php echo ($o_key); ?>();
										} else {
											alertMsg.error(data.info);
											
											setTimeout(function(){
												$('#top-alert').find('button').click();
												$(that).removeClass('disabled').prop('disabled',false);
											},1500);
										}
									}
									function removePicture<?php echo ($o_key); ?>(o){
										var p = $(o).parent().parent();
										$(o).parent().remove();
										setPictureIds<?php echo ($o_key); ?>();
									}
									function setPictureIds<?php echo ($o_key); ?>(){
										var ids = [];
										$("#cover_id_<?php echo ($o_key); ?>").parent().find('.upload-img-box').find('.upload-pre-item').each(function(){
											ids.push($(this).attr('val'));
										});
										if(ids.length > 0)
											$("#cover_id_<?php echo ($o_key); ?>").val(ids.join(','));
										else
											$("#cover_id_<?php echo ($o_key); ?>").val('');
									}
								</script><?php break;?>
							<?php case "group": ?><div class="tab-Header">
								<ul class="nav  nav-tabs" style="margin-bottom:10px;">
									<?php if(is_array($form["options"])): $i = 0; $__LIST__ = $form["options"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$li): $mod = ($i % 2 );++$i;?><li <?php if(($i) == "1"): ?>class="active"<?php endif; ?>><a data-toggle="tab" href="#tabmini<?php echo ($i); ?>" ><?php echo ($li["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
								</ul>
								</div>
								<div class="tab-content">
								<?php if(is_array($form["options"])): $i = 0; $__LIST__ = $form["options"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tab): $mod = ($i % 2 );++$i;?><div id="tabmini<?php echo ($i); ?>" class="tab-pane fade <?php if(($i) == "1"): ?>in active<?php endif; ?>">
									
										<?php if(is_array($tab['options'])): foreach($tab['options'] as $o_tab_key=>$tab_form): ?><div class="form-row">
	 <div class="form-label col-md-3 text-right">
											<?php echo ((isset($tab_form["title"]) && ($tab_form["title"] !== ""))?($tab_form["title"]):''); ?>
										</label>
										</div>
										 <div class="form-input col-md-9">
											<?php switch($tab_form["type"]): case "text": ?><input type="text" name="config[<?php echo ($o_tab_key); ?>]" value="<?php echo ($tab_form["value"]); ?>"><?php break;?>
												<?php case "password": ?><input type="password" name="config[<?php echo ($o_tab_key); ?>]" value="<?php echo ($tab_form["value"]); ?>"><?php break;?>
												<?php case "hidden": ?><input type="hidden" name="config[<?php echo ($o_tab_key); ?>]" value="<?php echo ($tab_form["value"]); ?>"><?php break;?>
												<?php case "radio": if(is_array($tab_form["options"])): foreach($tab_form["options"] as $opt_k=>$opt): ?><label class="ilabel">
															<input type="radio"  class="j-icheck" name="config[<?php echo ($o_tab_key); ?>]" value="<?php echo ($opt_k); ?>" <?php if(($tab_form["value"]) == $opt_k): ?>checked<?php endif; ?>><?php echo ($opt); ?>
														</label><?php endforeach; endif; break;?>
												<?php case "checkbox": if(is_array($tab_form["options"])): foreach($tab_form["options"] as $opt_k=>$opt): ?><label class="ilabel">
															<?php is_null($tab_form["value"]) && $tab_form["value"] = array(); ?>
															<input type="checkbox" class="j-icheck" name="config[<?php echo ($o_tab_key); ?>][]" value="<?php echo ($opt_k); ?>" <?php if(in_array(($opt_k), is_array($tab_form["value"])?$tab_form["value"]:explode(',',$tab_form["value"]))): ?>checked<?php endif; ?>><?php echo ($opt); ?>
														</label><?php endforeach; endif; break;?>
												<?php case "select": ?><select name="config[<?php echo ($o_tab_key); ?>]" class="selectpicker show-tick"  data-style="btn medium bg-green" data-width="auto" data-container="body">
														<?php if(is_array($tab_form["options"])): foreach($tab_form["options"] as $opt_k=>$opt): ?><option value="<?php echo ($opt_k); ?>" <?php if(($tab_form["value"]) == $opt_k): ?>selected<?php endif; ?>><?php echo ($opt); ?></option><?php endforeach; endif; ?>
													</select><?php break;?>
												<?php case "textarea": ?><textarea class="autosize" rows="4" cols="30" name="config[<?php echo ($o_tab_key); ?>]"><?php echo ($tab_form["value"]); ?></textarea><?php break;?>
												<?php case "picture_union": ?><div class="controls">
													<input type="file" id="upload_picture_<?php echo ($o_tab_key); ?>">
													<input type="hidden" name="config[<?php echo ($o_tab_key); ?>]" id="cover_id_<?php echo ($o_tab_key); ?>" value="<?php echo ($tab_form["value"]); ?>"/>
													<div class="upload-img-box">
														<?php if(!empty($tab_form['value'])): $mulimages = explode(",", $tab_form["value"]); ?>
														<?php if(is_array($mulimages)): foreach($mulimages as $key=>$one): ?><div class="upload-pre-item" val="<?php echo ($one); ?>">
																<img width="100" height="70"  src="<?php echo (get_cover($one,'path')); ?>"  ondblclick="removePicture<?php echo ($o_tab_key); ?>(this)"/>
															</div><?php endforeach; endif; endif; ?>
													</div>
													</div>
													<script type="text/javascript">
														//上传图片
														/* 初始化上传插件 */
														setTimeout(function(){
														$("#upload_picture_<?php echo ($o_tab_key); ?>").uploadify({
															"height"          : 30,
															"swf"             : "/thinkblog/Public/static/uploadify/uploadify.swf",
															"fileObjName"     : "Picture",
															"buttonText"      : "<span class='button-content'><i class='glyph-icon icon-picture-o'></i> 上传图片</span>",
															"uploader"        : "<?php echo U('File/uploadPicture',array('session_id'=>session_id()));?>",
															"width"           : 120,
															'removeTimeout'   : 1,
															'fileTypeExts'    : '*.jpg; *.png; *.gif;',
															"onUploadSuccess" : uploadPicture<?php echo ($o_tab_key); ?>,
															'onFallback' : function() {
													            alert('未检测到兼容版本的Flash.');
													        }
														});
													},3);
														function uploadPicture<?php echo ($o_tab_key); ?>(file, data){
															var data = $.parseJSON(data);
															var src = '';
															if(data.status){
																src = data.url || data.path
																$("#cover_id_<?php echo ($o_tab_key); ?>").parent().find('.upload-img-box').append(
																	'<div class="upload-pre-item" val="' + data.id + '"><img src="' + src + '" width="120" height="120" OnClick="imgpop(this)" ondblclick="removePicture<?php echo ($o_tab_key); ?>(this)"/></div>'
																);
																setPictureIds<?php echo ($o_tab_key); ?>();
															} else {
																alertMsg.error(data.info);
																setTimeout(function(){
																	$('#top-alert').find('button').click();
																	$(that).removeClass('disabled').prop('disabled',false);
																},1500);
															}
														}
														function removePicture<?php echo ($o_tab_key); ?>(o){
															var p = $(o).parent().parent();
															$(o).parent().remove();
															setPictureIds<?php echo ($o_tab_key); ?>();
														}
														function setPictureIds<?php echo ($o_tab_key); ?>(){
															var ids = [];
															$("#cover_id_<?php echo ($o_tab_key); ?>").parent().find('.upload-img-box').find('.upload-pre-item').each(function(){
																ids.push($(this).attr('val'));
															});
															if(ids.length > 0)
																$("#cover_id_<?php echo ($o_tab_key); ?>").val(ids.join(','));
															else
																$("#cover_id_<?php echo ($o_tab_key); ?>").val('');
														}
													</script><?php break; endswitch;?>
											
											<div class="font-yellow mrg10T">
											<?php if(isset($tab_form["tip"])): echo ($tab_form["tip"]); endif; ?>
											</div>
						                    </div>
						                    </div><?php endforeach; endif; ?>
										
									</div><?php endforeach; endif; else: echo "" ;endif; ?>
								</div><?php break; endswitch;?>
						<div class="font-yellow mrg10T">
						<?php if(isset($form["tip"])): echo ($form["tip"]); endif; ?>
						</div>
						</div>
						</div><?php endforeach; endif; ?>
		<?php else: ?>
			<?php if(isset($custom_config)): echo ($custom_config); endif; endif; ?>

 
  <div class="actionBar">
		<div class="form-input mrg20B text-right">
           <button type="submit" class="btn medium bg-blue">保存</button>
           <button type="button" url="<?php echo U('index');?>" class="btn-close btn medium bg-red mrg15L">取消</button>
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