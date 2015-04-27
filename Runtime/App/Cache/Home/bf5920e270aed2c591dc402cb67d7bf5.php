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
        <h1 class="h4 text-center login-title">找回密码</h1>
        <form target="formAjax" method="post"  action="/thinkblog/index.php/User/mi.shtml" id="user" role="form">
            <div class="form-group">
                <label for="email" class="required">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="输入邮箱地址">
            </div>
            <div class="form-group">
                <label for="username" class="required">用户名</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="输入用户名">
            </div>
            <button type="submit" id="submit" class="btn btn-primary btn-block btn-lg">重置密码</button>
        </form>
    </div>

 

    <div class="text-center col-md-12 login-link">
        <a href="<?php echo U('User/register');?>">注册新帐号</a>
        |
        <a href="<?php echo U('Index/index');?>">首页</a>
        |
        <a href="<?php echo U('Index/login');?>">账号登录</a>
    </div>
</div>





</body>
</html>