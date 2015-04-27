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

<style>
<!--

.verifyimg{

cursor:pointer;
}


-->



</style>





<input type="hidden" name="isverify" id="isverify" value="<?php echo ($isverify); ?>" />

<div id="login-page" class="mrg25B">

            <div id="page-header" class="clearfix">
                <div id="page-header-wrapper" class="clearfix">
                    <div id="header-logo">
                        <span style="float:right" title="Close sidebar" data-placement="bottom" class="tooltip-button">
                            <i class="glyph-icon icon-align-justify"></i>
                        </span>
                    </div>
                    

                </div>
            </div><!-- #page-header -->

        </div>
<img src="/thinkblog/Public/admin/images/login-bg.png" class="login-img" alt="">
<div class="ui-widget-overlay bg-black opacity-60"></div>
        <div class="pad20A mrg25T">
            <div class="row mrg25T">

                <form action="<?php echo U('Login');?>" id="login_form" class="col-md-4 form-vertical center-margin mrg25T" method="">

                    <div class="ui-dialog modal-dialog mrg25T" id="login-form" style="position: relative !important;">
                        <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
                            <span class="ui-dialog-title">后台登录</span>
                        </div>
                        <div class="pad20A pad0B ui-dialog-content ui-widget-content ">
                           <div class="form-row">
                        <div class="form-label col-md-3">
                            <label for="">
                                用户名:
                            </label>
                        </div>
                        <div class="form-input col-md-9">
                            <div class="input-append-wrapper">
                                <div class="input-append  ui-state-default">
                                   <i class="glyph-icon icon-user"></i>
                                </div>
                                <div class="append-left">
                                    <input placeholder="username" id="j_username" class=" in" type="text" name="username" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-label col-md-3">
                            <label for="">
                                密&nbsp;&nbsp;码:
                            </label>
                        </div>
                        <div class="form-input col-md-9">
                            <div class="input-append-wrapper">
                                <div class="input-append  ui-state-default">
                                   <i class="glyph-icon icon-unlock-alt"></i>
                                </div>
                                <div class="append-left">
                                    <input placeholder="Password" id="j_password" class=" in" type="password" name="password" />
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php if($isverify == 1): ?><div class="form-row">
                        <div class="form-label col-md-3">
                            <label for="">
                                验证码：
                            </label>
                        </div>
                        <div class="form-input col-md-9">
                            <div class="input-append-wrapper">
                                <div class="input-append  ui-state-default">
                                   <i class="glyph-icon icon-picture-o"></i>
                                </div>
                                <div class="append-left">
                                   <input id="j_captcha"  class="col-md-6 in" name="verify" type="text" />
                                   
                                </div>
                            </div>
                        </div>
                    </div>      
 <div class="form-row">
<div class="append-left">
 <img class="verifyimg reloadverify" alt="点击切换" src="<?php echo U('Public/verify');?>" alt="点击更换" title="点击更换" >
      </div>              
         </div><?php endif; ?>               
    			 <div class="form-row">
    			</div>
                 
                 
                            <div class="form-row">
                                
                                <div class="text-left col-md-6">
                                    <a href="<?php echo U('Home/Index/index');?>" title="返回前台">返回前台</a>
                                </div>
                            </div>
                        </div>
                        <div class="ui-dialog-buttonpane text-center">
                            <button type="button" id="login_ok" class="btn large primary-bg text-transform-upr font-bold font-size-11 radius-all-4">
                                <span class="button-content">
                                                                                     登&nbsp;&nbsp;录
                                </span>
                            </button>
                        </div>
                    </div>

                    

                </form>

            </div>

        </div>




  
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

<script type="text/javascript">

$(function(){
	//刷新验证码
	
    $(".reloadverify").click(function(){
    	changeverify();
     });

	function checklogin(){
		var issubmit = true;
		var i_index  = 0;
		$('#login_form').find('.in').each(function(i){
			if ($.trim($(this).val()).length == 0) {
				$(this).css('border', '1px #ff0000 solid');
				issubmit = false;
				if (i_index == 0)
					i_index  = i;
			}
		});
		if (!issubmit) {
			$('#login_form').find('.in').eq(i_index).focus();
			return false;
		}
		$("#login_ok").attr("disabled", true).val('登录中..');


        $.post($('#login_form').attr('action'),{username:$("#j_username").val(),password:$("#j_password").val(),verify:$("#j_captcha").val()},function(data){
        	
            if(!data.status){
            	
            	layer.statusinfo(data.info,'error','','',3);

            	if($('#isverify').val()==1){
            	changeverify();
            	}
            	$("#login_ok").attr("disabled", false).val('登录');
            }else{
            	
            	window.location.href = data.url;
            }

        

        		
         });
		
	}
	$("#login_ok").click(function(){
		
		
	    
		checklogin();
	});
	 $('body').keyup(function(event) {
         var keyCode = event.which;
         if (keyCode == 13) {
        	 checklogin();
         }
	 });
});

function changeverify(){

	var verifyimg = $(".verifyimg").attr("src");
	 if( verifyimg.indexOf('?')>0){
         $(".verifyimg").attr("src", verifyimg+'&random='+Math.random());
     }else{
         $(".verifyimg").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
     }
}

function genTimestamp(){
	var time = new Date();
	return time.getTime();
}


</script>





</body>
</html>