<?php if (!defined('THINK_PATH')) exit(); if($list['type'] == 2): if(count($list['res']) > 1): ?><div class="advcss" style="width:<?php echo ($list['width']); ?>px;height:<?php echo ($list['height']); ?>px">
      <div id="carousel-ad" class="carousel slide" data-ride="carousel" style="margin:0;" > 
        <div class="carousel-inner" role="listbox_<?php echo ($list["ad"]["pos"]); ?>">
            <?php if(is_array($list["res"])): $i = 0; $__LIST__ = $list["res"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="item <?php if($key == 1): ?>active<?php endif; ?>">
            <a href="<?php echo ($vo["link"]); ?>" target="_blank">
            <img src="<?php echo (get_cover($vo["advspic"],'path')); ?>"   style="width:<?php echo ($list['width']); ?>px;height:<?php echo ($list['height']); ?>px" title="<?php echo ($vo['title']); ?>" alt="<?php echo ($vo['title']); ?>">
            </a>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
            
          </div>   
            
<a class="left carousel-control" href="#carousel-ad" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
</a>
<a class="right carousel-control" href="#carousel-ad" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
</a>
 </div>
 </div><?php endif; ?>


    <?php elseif($list['type'] == 3): ?>
    <div style="width:<?php echo ($list['width']); ?>;height:<?php echo ($list['height']); ?>;background: #cecece;">
        <div style="margin:0px auto;width:150px;line-height: 30px;"><?php echo ($list["advstext"]); ?></div>
    </div>
    <?php elseif($list['type'] == 1): ?>
    <?php if($list['advspic'] != 0): ?><a href="<?php echo ($list["link"]); ?>"><img src="<?php echo (get_cover($list["advspic"],'path')); ?>" width="<?php echo ($list['width']); ?>" height="<?php echo ($list['height']); ?>" title="<?php echo ($list['title']); ?>" alt="<?php echo ($list['title']); ?>" /></a><?php endif; ?>

    <?php elseif($list['type'] == 4): ?>
    <?php echo ($list["advshtml"]); endif; ?>
<!-- add more -->