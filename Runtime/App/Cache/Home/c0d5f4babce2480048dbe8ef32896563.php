<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript" src="/Addons/Fancybox/static/jquery-1.4.2.min.js"></script>
<script type="text/javascript">
    var jQuery = $.noConflict(true);
</script>
<script type="text/javascript" src="/Addons/Fancybox/static/jquery.fancybox-1.3.4.pack.js?1.2"></script>
<script type="text/javascript" src="/Addons/Fancybox/static/jquery.easing-1.3.pack.js"></script>
<script type="text/javascript" src="/Addons/Fancybox/static/jquery.mousewheel-3.0.4.pack.js"></script>
<link rel="stylesheet" href="/Addons/Fancybox/static/jquery.fancybox-1.3.4.css" type="text/css" media="screen">
<script type="text/javascript">
jQuery(function(){
	var group = <?php echo ($addons_config['group']); ?> ? "rel = 'group'" : "";
	jQuery('#description img').each(function(){
		var src = jQuery(this).attr('src');
		var title = jQuery(this).attr('title');
		jQuery(this).wrap("<a class='fancybox_che1988' title='"+title+"' "+group+" href='"+src+"' ></a>");
	});
	jQuery("a.fancybox_che1988").fancybox({
		'transitionIn'           :   "<?php echo ($addons_config['transitionIn']); ?>",
		'transitionOut'          :   "<?php echo ($addons_config['transitionOut']); ?>",
		'padding'                :   "<?php echo ($addons_config['padding']); ?>",
		'hideOnContentClick'     :   "<?php echo ($addons_config['hideOnContentClick']); ?>",
		'easingIn'               :   "<?php echo ($addons_config['easingIn']); ?>",
 	});
});
</script>