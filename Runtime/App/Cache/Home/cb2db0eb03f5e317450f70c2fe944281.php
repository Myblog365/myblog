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


<div class="top-menu-wrap">
<div class="container" style="position: relative"><!-- logo -->
<div class="logo hidden-xs"><a href="<?php echo U('Index/index');?>"></a></div>
<!-- end logo --> <!-- 导航 -->






<div class="top-nav navbar">
<div class="navbar-header">
<button class="navbar-toggle pull-left" data-toggle="collapse"	data-target=".navbar-collapse"><span class="icon-bar"></span>
<span class="icon-bar"></span> <span class="icon-bar"></span></button>
</div>
<nav role="navigation"
	class="collapse navbar-collapse bs-navbar-collapse active">
<ul class="nav nav-pills ml30 mt10">
	<?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i; if($nav["name"] != '标签'): ?><li><a target="<?php echo ($nav["target"]); ?>" href="<?php echo ($nav["url"]); ?>" <?php if($nav['active'] == 1): ?>class="active"<?php endif; ?>><?php echo ($nav["name"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
	<?php if(is_array($nosigncate)): $i = 0; $__LIST__ = $nosigncate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><li class="visible-xs">
	<a	href="<?php echo ZSU('/artlist/'.$vo1['id'],'Index/artlist',array('cid'=>$vo1['id']));?>">
	<?php echo ($vo1["name"]); ?> </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</nav></div>
<!-- end 导航 --> 
<?php if($user_auth['uid'] > 0): ?><ul class="opts pull-right list-inline">
	<li><?php if(($roleauth['yesart'] == 1) OR ($isadmin)): ?><div class="mt10 ml20"><a href="<?php echo U('Ucenter/artadd');?>"
		class="btn btn-primary">发布 </a></div><?php endif; ?></li>

	<li class="mt10"><a href="javascript:void(0);"
		data-toggle="dropdown" title="<?php echo ($userinfo['nickname']); ?>个人中心"> <?php if($userinfo['mymailcount'] > 0): ?><span
		class="btn-danger badge"
		style="position: absolute; top: 5px; right: 9px;"><?php echo ($userinfo['mymailcount']); ?></span><?php endif; ?>
	<img border="0" src="<?php echo ($userinfo['avatar32']); ?>"
		alt="<?php echo ($userinfo['nickname']); ?>"> </a>

	<ul class="dropdown-menu dropdown-menu-right">
		<li><a href="<?php echo U('Ucenter/index');?>"><i class="icon-cog"></i>
		个人设置</a></li>
		<li><a
			href="<?php echo ZSU('/userart/'.$userinfo['uid'],'Ucenter/userart',array('uid'=>$userinfo['uid']));?>">
			<i	class="icon-file-text-alt"></i> 我的文章</a></li>
		<li><a
			href="<?php echo ZSU('/usersc/'.$userinfo['uid'],'Ucenter/usersc',array('uid'=>$userinfo['uid']));?>">
			<i	class="icon-bookmark"></i> 我的收藏</a></li>
		<li><a href="<?php echo ZSU('/userfocus/','Ucenter/userfocus');?>">
		<i	class="icon-heart"></i> 我的关注</a></li>

		<li><a href="<?php echo U('Ucenter/usermail');?>">
		<i	class="icon-envelope"></i> 我的消息 <?php if($userinfo['mymailcount'] > 0): ?><span	class="btn-danger badge"><?php echo ($userinfo['mymailcount']); ?></span><?php endif; ?></a></li>


		<?php if($isadmin == true): ?><li><a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?m=Admin"><i
			class="icon-suitcase"></i> 管理后台</a></li><?php endif; ?>
		<li><a href="<?php echo U('User/logout');?>" <?php if($cname == 'ucenter'): ?>jumpurl="<?php echo U('Index/index');?>"<?php endif; ?> target="AjaxTodo"><i class="icon-signout"></i> 注销登录</a></li>
	</ul>
	</li>
</ul>





<?php else: ?>
<div class="user-nav"><a class="login btn btn-normal btn-primary"
	href="<?php echo U('User/login');?>">登录</a> <a
	class="register btn btn-normal btn-success"
	href="<?php echo U('User/register');?>">注册</a></div><?php endif; ?> <!-- 搜索框 -->
<div class="search-box  ">
<form class="navbar-search" action="<?php echo U('Index/search');?>" id="global_search_form" method="post">
	<input	class="form-control search-query" type="text" placeholder="搜索" autocomplete="on" name="keyword" id="keyword"	value="<?php echo ($_REQUEST['keyword']); ?>"> 
	<span title="搜索"	id="global_search_btns" onclick="$('#global_search_form').submit();">
	<i class="icon icon-search"></i></span></form>

</div>
<!-- end 搜索框 --></div>
</div>


<div class="wrap userfile mt30 maincontent">
    <div class="container">
        <div class="row">
            <div class="col-md-4 profile">
                <div class="left_bj">

                        <div class="profile-header media">
                            <a class="pull-left" <?php if($ucenter): ?>id="cavatar" href="<?php echo U('Ucenter/useravatarset');?>"<?php endif; ?>>
                            <img class="media-object avatar-128 avatar" src="<?php echo ($cxuser['avatar128']); ?>" alt="<?php echo ($cxuser['nickname']); ?>">
                            <?php if($ucenter): ?><span class="avatarpos">更改头像</span><?php endif; ?>
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo ($cxuser['nickname']); if(!$ucenter): ?><small><a style="margin-left:15px;font-size:12px;" href="<?php echo ZSU('/usersendmail/'.$cxuid,'Ucenter/usersendmail',array('uid'=>$cxuid));?>">[私信]</a></small><?php endif; ?></h4>

                                                        <ul class="sn-inline">
                                                        <span><?php echo (getMroleNameByUserId($cxuid)); ?></span>
                                   <?php if(!$ucenter): if(!$hasfocususer): ?><a callback="focusevent" id="focusevent<?php echo ($cxuser['uid']); ?>" href="<?php echo U('Index/guanzhu',array('id'=>$cxuid,'type'=>0));?>" target=AjaxTodo class="btn btn-success btn-sm " alt="取消关注" >加关注</a>
                                   <?php else: ?>
                                    <a callback="focusevent" id="focusevent<?php echo ($cxuser['uid']); ?>" href="<?php echo U('Index/guanzhu',array('id'=>$cxuid,'type'=>0));?>" target=AjaxTodo class="btn btn-default btn-sm " alt="加关注" >取消关注</a><?php endif; endif; ?>                     </ul>
                            </div>
                        </div>
                        <ul class="list-unstyled profile-ranks">
                            <li>

                                    <strong><?php echo ($cxuser['score']); ?></strong>
                                    <span class="text-muted">积分</span>

                            </li>
                            <li>
                                <strong><?php echo ($cxuser['fensi']); ?></strong>
                                <span class="text-muted">粉丝</span>
                            </li>
                            <li class="">
                                <strong><?php echo ($cxuser['zan']); ?></strong>
                                <span class="text-muted">被赞</span>
                            </li>
                        </ul>
                       <div class="profile-bio mono">
                                            <p><?php echo ($cxuser["signature"]); ?></p>

                                        </div>
                        <div class="profile-goodjob hidden-xs" id="goodJob" data-id="1030000002451360">
                            <strong>已发布标签</strong>
                            <div id="piechart" class="clearfix">
                             <ul class="taglist--block">
                            <?php if(is_array($usertaglist)): $i = 0; $__LIST__ = $usertaglist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="mr10 tagPopup">
                                    <a class="tag" href="<?php echo ZSU('/tagart/'.$vo['id'],'Index/tagart',array('id'=>$vo['id']));?>" ><?php echo ($vo["title"]); ?></a>

                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                                    </ul>

                            </div>
                            <div class="joindate">
                                始于<?php echo (toDate($cxuser['reg_time'])); ?>

                          </div>
                        </div>

                </div>
            </div>
<div id="main" class="settings col-md-8 form-horizontal">
                <ul class="nav nav-pills">
                <?php if($ucenter): ?><li class="dropdown <?php if(in_array($aname,array('index','changepwd','yzmail','useravatarset'))): ?>active<?php endif; ?>">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                          个人设置 <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                 <li <?php if(in_array($aname,array('index'))): ?>class="active"<?php endif; ?>><a href="<?php echo ZSU('/user/'.$cxuid,'Ucenter/index',array('uid'=>$cxuid));?>">个人资料</a></li>
                   <li <?php if(in_array($aname,array('yzmail'))): ?>class="active"<?php endif; ?>><a href="<?php echo ZSU('/yzmail/','Ucenter/yzmail');?>">邮件验证</a></li>
                   <li <?php if(in_array($aname,array('changepwd'))): ?>class="active"<?php endif; ?>><a href="<?php echo ZSU('/changepwd/','Ucenter/changepwd');?>">修改密码</a></li>
                   <li <?php if(in_array($aname,array('useravatarset'))): ?>class="active"<?php endif; ?>><a href="<?php echo ZSU('/useravatarset/','Ucenter/useravatarset',array('uid'=>$cxuser['uid']));?>">修改头像</a></li>          
                   </ul>
                    </li>
  
                   <li <?php if(in_array($aname,array('usermail','usersendmail'))): ?>class="active"<?php endif; ?>><a href="<?php echo ZSU('/usermail/','Ucenter/usermail');?>">消息 <span class="badge"><?php echo ($userinfo['mymailcount']); ?></span></a></li><?php endif; ?>
                    <li <?php if(in_array($aname,array('userart'))): ?>class="active"<?php endif; ?>><a href="<?php echo ZSU('/userart/'.$cxuid,'Ucenter/userart',array('uid'=>$cxuid));?>">文章 <span class="badge"><?php if($ucenter): echo ($cxuser['allartnum']); else: echo ($cxuser['artnum']); endif; ?></span></a></li>
                                            <li <?php if(in_array($aname,array('usersc'))): ?>class="active"<?php endif; ?>><a href="<?php echo ZSU('/usersc/'.$cxuid,'Ucenter/usersc',array('uid'=>$cxuid));?>">收藏 <span class="badge"><?php echo ($cxuser['scartnum']); ?></span></a></li>
                    
                   <?php if($ucenter): ?><li class="dropdown <?php if(in_array($aname,array('userfocus','usertagfocus'))): ?>active<?php endif; ?>">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                          关注的 <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                                                        <li <?php if(in_array($aname,array('userfocus'))): ?>class="active"<?php endif; ?>><a href="<?php echo ZSU('/userfocus/','Ucenter/userfocus');?>">关注的人 <span class="badge"><?php echo ($cxuser['focusnum']); ?></span></a></li>
                                                         <li <?php if(in_array($aname,array('usertagfocus'))): ?>class="active"<?php endif; ?>><a href="<?php echo ZSU('/usertagfocus/','Ucenter/usertagfocus');?>">关注的标签 <span class="badge"><?php echo ($cxuser['tagfocusnum']); ?></span></a></li>
                                                         
                                                                                </ul>
                    </li><?php endif; ?>
                </ul>
            <!-- Nav tabs -->
            



<?php if(is_array($maillist)): $i = 0; $__LIST__ = $maillist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="clearfix stream-list border-top board">
            <div class="media stream-list__item">

	<div class="media-body pull-left">
<div class="message-content" id="mail<?php echo ($vo['id']); ?>" <?php if($vo['is_read'] == 0): ?>style="color:green;"<?php endif; ?>><?php echo ($vo['content']); ?></div>
<p class="info">  
<?php if($vo['type'] == 0): echo ($vo['title']); ?>
<?php else: ?>
<?php echo (get_nickname($vo['from_uid'])); ?>发来的私信 <a href="<?php echo ZSU('/usersendmail/'.$vo['from_uid'],'Ucenter/usersendmail',array('uid'=>$vo['from_uid']));?>">查看对话</a><?php endif; ?>
  <?php echo (toDate($vo["create_time"])); ?>
  <?php if($vo['is_read'] == 0): ?><a class="isread" id="readmail<?php echo ($vo['id']); ?>" href="<?php echo U('Ucenter/mailread',array('id'=>$vo['id']));?>" target="AjaxTodo" callback="readmail"><span class="icon-flickr"></span> 标记已读</a><?php endif; ?>	
  <a class="isread" style="color:red;" id="delmail<?php echo ($vo['id']); ?>" href="<?php echo U('Ucenter/delmail',array('id'=>$vo['id']));?>" target="AjaxTodo" callback="delmail"><span class="icon-trash"></span> 删除</a>
		</p>
		 </div>
</div></div><?php endforeach; endif; else: echo "" ;endif; ?>

  
  </ul>
   <div class="text-center">
           
<?php echo ($messpage); ?>

        </div>


             </div>
        </div>
    </div>
</div>

<footer id="footer">
<div class="container">
<div class="row hidden-xs">
<?php if(($cname == 'index') AND ($aname == 'index')): echo hook('friendLink'); endif; ?>    
</div>
<div class="copyright">
Copyright © 2015-2016 <a href="http://myblog365.xyz/" rel="nofollow">Myblog365</a>. <br><a href="http://www.miibeian.gov.cn/" rel="nofollow"><?php echo C('WEB_SITE_ICP');?></a> <?php echo hook('pageFooter');?>
</div>
   
</div>
</footer>




</body>
</html>