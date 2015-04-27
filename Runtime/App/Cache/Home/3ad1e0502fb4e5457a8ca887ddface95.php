<?php if (!defined('THINK_PATH')) exit();?><div class="list-group" id="respond">
	<h4 class="list-group-item">发表评论</h4>
<?php if(!is_login()): if(!$can_guest_comment): ?><p class="list-group-item">要发表评论，您必须先<a href="<?php echo U('User/login');?>">登录</a>。</p>
<?php else: ?>
<div id="commentform" class="form-horizontal list-group-item">
<div id="comment-user">
<p class="logged-in-help">游客
 <a href="<?php echo U('User/login');?>" title="登出这个帐号">登录</a></p>
</div>
<div class="markeditor ">
<textarea class="form-control autosize" rows="3"  id="commentcontent"></textarea>
</div>
<div id="comment-action" class="btn-toolbar clearfix">

<div class="btn-group">
<button class="btn btn-default"  id="submit-comment" data-url="<?php echo tox_addons_url('LocalComment/Index/addComment', array('app'=>$app,'con'=>$mod, 'row_id'=>$row_id,'uid'=>$uid));?>">
发表评论</button>
</div>
</div>

<input type="hidden" name="pid" id="pid" value="" />
</div><?php endif; ?>
<?php else: ?>

<div id="commentform" class="form-horizontal list-group-item">
<div id="comment-user">
<p class="logged-in-help">以<a href="<?php echo ($loginuser['space_url']); ?>"><?php echo ($loginuser['nickname']); ?></a>登录。
 <a href="<?php echo U('User/logout');?>" title="登出这个帐号">登出 »</a></p>
</div>
<div class="markeditor ">
<textarea class="form-control autosize" rows="3"  id="commentcontent"></textarea>
</div>
<div id="comment-action" class="btn-toolbar clearfix">

<div class="btn-group">
<button class="btn btn-default"  id="submit-comment" data-url="<?php echo tox_addons_url('LocalComment/Index/addComment', array('app'=>$app,'con'=>$mod, 'row_id'=>$row_id,'uid'=>$uid));?>">
发表评论</button>
</div>
</div>

<input type="hidden" name="pid" id="pid" value="" />
</div><?php endif; ?>
</div>
<ul class="list-group commentlist">
<li class="list-group-item respond-title"><?php echo ($total_count); ?>条回应给“<?php echo ($info["title"]); ?>”的评论</li>
<ul id="thread-comments">
<?php if(!$list): else: ?>
 <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$comment): $mod = ($i % 2 );++$i;?><li class="comment byuser depth-1 list-group-item top parent">
<div class="comment-votes vote-group">
<a  callback="dingcai" title='支持' href="<?php echo tox_addons_url('LocalComment/Index/ding',array('id'=>$comment['id']));?>" target=AjaxTodo class="up">
<span class="glyphicon glyphicon-chevron-up"></span> 
<span class="votes" id="commentding<?php echo ($comment['id']); ?>" ><?php echo ($comment['ding']); ?></span>
</a>
<a  callback="dingcai" title='反对' href="<?php echo tox_addons_url('LocalComment/Index/cai',array('id'=>$comment['id']));?>" target=AjaxTodo class="down">
<span class="votes" style="margin:0;" id="commentcai<?php echo ($comment['id']); ?>" ><?php echo ($comment['cai']); ?></span>
<span class="glyphicon glyphicon-chevron-down"></span>

</a>
</div>	


<div id="comment-body">
		<div class="row">
            <div class="col-md-1">

                <?php if(($comment["user"]["face"]) == ""): ?><img src="<?php echo getRootUrl();?>Addons/Avatar/default_64_64.jpg" class="avatar" width="52" height="52" style="display: block;">
                <?php else: ?>
                    <img src="<?php echo (getFaceUrl($comment["user"]["face"])); ?>" class="avatar" width="50" height="50" style="display: block;"><?php endif; ?>

            </div>
            <div id="comment-content" class="col-md-11">
                <p>
                    <?php if(($comment["uid"]) == "0"): ?><a>游客</a>
                        <?php else: ?>
                        <a href="<?php echo ($comment["user"]["space_url"]); ?>" class="fn"><?php echo (op_t($comment["user"]["nickname"])); ?></a><?php endif; ?>
                    ：<?php echo (op_h($comment["content"])); ?>
                    <?php if($comment['pid'] > 0): ?><span class="commentpre"><?php echo (getpcomment($comment["id"])); ?></span><?php endif; ?>
                </p>

                <div id="comment-meta">
                    <time datetime="<?php echo (toDate($comment["create_time"])); ?>" title="<?php echo (toDate($comment["create_time"])); ?>"><?php echo (toDate($comment["create_time"])); ?></time>

                    <?php if(is_login()): ?><a class="comment-reply-link local-comment-reply" data-id="<?php echo ($comment["id"]); ?>" href="javascript:void(0)" data-uid="<?php echo ($comment["uid"]); ?>" data-username="<?php echo (op_t($comment["user"]["nickname"])); ?>">
                            <span class="glyphicon glyphicon-transfer"></span>回复</a>
                        <a class="pm" href="<?php echo U('Ucenter/usersendmail',array('uid'=>$comment['uid']));?>" title="私信" target="_blank"><span class="glyphicon glyphicon-share-alt"></span>私信</a>

                        <?php else: ?>
                        <a rel="nofollow" class="comment-reply-login" href="<?php echo U('User/login');?>" >
                            <span class="glyphicon glyphicon-transfer"></span>登录以回复</a><?php endif; ?>
                </div>

            </div>
		</div>



</div>
</li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
<div class="pull-right">
<?php echo getPagination($total_count, $count);?>
</div>
	</ul>

	</ul>
<script>
  
        $(function () {

$('.pagination li a').each(function(){

var href=$(this).attr('href');


$(this).attr('href',href+'#comments');


	
});


        	
        $('.local-comment-reply').click(function(e){
                 var $textarea = $('#commentcontent');
                 var nickname = $(this).attr('data-username');
                 var uid = $(this).attr('data-uid');
                 $textarea.focus();
                 $textarea.append('回复 @' + nickname + ' ：');
                 //tinyMCE.editors[0].setContent('');
                 //tinyMCE.editors[0].setContent('回复 @' + nickname + ' ：');//0表示当前的第一个编辑器
                // $textarea.val('回复 @' + nickname + ' ：');
                 $('#pid').val($(this).attr('data-id'));

                 
        });
        $('#submit-comment').click(function (e) {
            e.preventDefault();
            var url = $(this).attr('data-url');
            var pid=$('#pid').val();
           // tinyMCE.triggerSave();
            var content = $('#commentcontent').val();
            var $this = $(this);
            $this.attr('disabled','true');
            $.post(url, {content: content,pid:pid}, function (a) {
            	if(a.status){
            		layer.statusinfo(a.info,'success',function(){location.reload();});
            	}else{

            		$this.removeAttr('disabled');
            		layer.statusinfo(a.info,'error');
            	}
            });
        });
    });
</script>