<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache,no-store, must-revalidate"> 
<META HTTP-EQUIV="pragma" CONTENT="no-cache"> 
<META HTTP-EQUIV="expires" CONTENT="0">
<?php echo hook('syncMeta');?>

<link rel="shortcut icon" href="/thinkblog/Public/static/images/favicon.jpg">

<?php echo hook('seo');?>

<?php if($webtitle != ''): ?><title><?php echo ($webtitle); ?>|<?php echo C('WEB_SITE_TITLE');?>|<?php echo C('WEB_SITE_KEYWORD');?></title>
<?php else: ?>
<title><?php echo C('WEB_SITE_TITLE');?>|<?php echo C('WEB_SITE_KEYWORD');?></title><?php endif; ?>

<?php if($webkeyword != ''): ?><meta name="keyword" content="<?php echo ($webkeyword); ?>|<?php echo C('WEB_SITE_KEYWORD');?>">
<?php else: ?>
<meta name="keyword" content="<?php echo C('WEB_SITE_KEYWORD');?>"><?php endif; ?>

<?php if($webdescription != ''): ?><meta name="description" content="<?php echo ($webdescription); ?>|<?php echo C('WEB_SITE_DESCRIPTION');?>">
<?php else: ?>
<meta name="description" content="<?php echo C('WEB_SITE_DESCRIPTION');?>"><?php endif; ?>



<meta name="author" content="Kevin">




<!-- Bootstrap core CSS -->
<link href="/thinkblog/Public/static/css/bootstrap.css" rel="stylesheet">
<!--external css-->
<link href="/thinkblog/Public/static/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<link href="/thinkblog/Public/home/css/simplestyle.css" rel="stylesheet">




    <!-- 公共js -->
<script src="/thinkblog/Public/static/jquery-1.10.2.min.js"></script>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
      <script src="/thinkblog/Public/static/html5.js"></script>
      <script src="/thinkblog/Public/static/respond.min.js"></script>
<![endif]-->

<script src="/thinkblog/Public/home/Js/core.js"></script>
<script src="/thinkblog/Public/static/layer/layer.js"></script>
<script src="/thinkblog/Public/static/bootstrapTags/bootstrap-tags.js"></script>


<script>
var _STATIC_ = "/thinkblog/Public/static";
var _APP_="/thinkblog/index.php";
var _PUBLIC_="/thinkblog/Public";
$(function(){

	initUI();
	if("<?php echo ($zswinerror); ?>"){
		
		var url="<?php echo ($jumpUrl); ?>";
		
		layer.statusinfo("<?php echo ($error); ?>",'error',urllocation,url,"<?php echo ($waitSecond); ?>");
	
	}
	
	
	
});


</script>


</head>

<body>




<div class="container">
    <div class="header text-center">
        <h1>
            <a href="<?php echo U('Index/index');?>" class="logo1">
                <img src="/thinkblog/Public/admin/images/logo.png" alt="ZswinBlog">
            </a>
        </h1>
        <p class="description text-muted"><?php echo C('WEB_SITE_DESCRIPTION');?></p>
    </div>
</div>


<div class="container">
    <div class="col-md-6 col-md-offset-3 bg-white login-wrap">
        <h1 class="h4 text-center login-title">注册新账号</h1>
                <form role="form" id="user" target="formAjax" <?php if($isverify): ?>verify="1"<?php endif; ?> method="post"  action="/thinkblog/index.php/User/register.shtml">
            
            <div class="form-group">
                <label class="required">用户名</label>
                <input type="text" class="form-control" name="username" placeholder="字母、数字等，用户名唯一">
            </div>
           <div class="form-group">
                <label class="required">昵称</label>
                <input type="text" class="form-control" name="nickname" placeholder="网页显示的名字">
            </div>
            <div class="form-group">
                <label class="required">Email</label>
                <input type="email" class="form-control" name="email" placeholder="你的常用邮箱地址">
            </div>
            <div class="form-group">
                <label for="" class="required">密码</label>
                <input type="password" class="form-control" name="password" placeholder="6位~30位">
            </div>
            <div class="form-group">
                <label for="" class="required">确认密码</label>
                <input type="password" class="form-control" name="repassword" placeholder="6位~30位">
            </div>
            <?php if($isverify): ?><div class="form-group">
                <label><i class="icon icon-picture"></i> 验证码</label>
                <input type="text" class="form-control" id="verify" name="verify" placeholder="请输入下方的验证码" >
                <div class="mt10"><a id="reloadCaptcha" href="javascript:void(0)"><img class="verifyimg reloadverify" alt="点击切换" src="<?php echo U('Home/Home/verify');?>" alt="点击更换" title="点击更换" ></a></div>
            </div><?php endif; ?>
            <div class="form-group">
                您将同意并接受<a href="#" target="_blank">《服务条款》</a>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg">注册新用户</button>
            </div>
        </form>
    </div>


    <div class="text-center col-md-12 login-link">
        <a href="<?php echo U('User/login');?>">账号登录</a>
        |
        <a href="<?php echo U('Index/index');?>">首页</a>
        |
        <a href="<?php echo U('User/mi');?>">找回密码</a>
    </div>
</div>



<script>
$(function(){
	//刷新验证码
	
    $(".reloadverify").click(function(){
    	changeverify();
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
</script>

</body>
</html>