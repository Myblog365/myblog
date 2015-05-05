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
          <i class="icon-4041"></i>
          <h1 class="successcolor">Success!</h1>
          <h2><i class="icon-ok-sign"></i>  <?php echo ($message); ?></h2>
          <p class="page-404"><?php if(isset($jumpUrl)): ?>系统将在<span style="color: green; font-weight: bold" id="wait"><?php echo ($waitSecond); ?></span>秒后自动跳转，如果不想等待，直接点击<a
	href="<?php echo ($jumpUrl); ?>"  id="href">这里</a> 
	
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script><?php endif; ?></p>
      </section>

    </div>


  </body>
</html>