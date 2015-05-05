<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache,no-store, must-revalidate"> 
<META HTTP-EQUIV="pragma" CONTENT="no-cache"> 
<META HTTP-EQUIV="expires" CONTENT="0">
<?php echo hook('syncMeta');?>
<meta name="description" content="<?php echo ($webdescription); if($webdescription != ''): ?>|<?php endif; echo C('WEB_SITE_DESCRIPTION');?>">
<meta name="author" content="zswin.cn">
<meta name="keyword" content="<?php echo ($webkeyword); if($webkeyword != ''): ?>|<?php endif; echo C('WEB_SITE_KEYWORD');?>">
<link rel="shortcut icon" href="/Public/static/images/favicon.jpg">
<title><?php echo ($webtitle); if($webtitle != ''): ?>|<?php endif; echo C('WEB_SITE_TITLE');?>|<?php echo C('WEB_SITE_KEYWORD');?></title>





<!-- Bootstrap core CSS -->
<link href="/Public/static/css/bootstrap.css" rel="stylesheet">
<!--<link href="/Public/static/css/bootstrap-theme.css" rel="stylesheet">-->
<!--external css-->
<link href="/Public/static/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<link href="/Public/home/css/style.css" rel="stylesheet">


<!-- 公共js -->
<script src="/Public/static/jquery-1.10.2.min.js"></script>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
      <script src="/Public/static/html5.js"></script>
      <script src="/Public/static/respond.min.js"></script>
<![endif]-->

<script src="/Public/home/Js/core.js"></script>
<script src="/Public/static/layer/layer.js"></script>
<script src="/Public/static/bootstrapTags/bootstrap-tags.js"></script>


<script>
var _STATIC_ = "/Public/static";
var _APP_="/index.php";
var _PUBLIC_="/Public";
$(function(){

	initUI();
	if("<?php echo ($zswinerror); ?>"){
		
		var url="<?php echo ($jumpUrl); ?>";
		
		layer.statusinfo("<?php echo ($error); ?>",'error',urllocation,url,"<?php echo ($waitSecond); ?>");
	
	}
	
	
	
});


</script>


</head>





  <body class="body-404">

    <div class="container">

      <section class="error-wrapper">
          <i class="icon-404"></i>
          <h1>404</h1>
          <h2><?php echo ($error); ?></h2>
          <p class="page-404">有时候<a href="<?php echo U('Index/index');?>">返回首页</a>也是一个正确的选择</p>
      </section>

    </div>


  </body>
</html>