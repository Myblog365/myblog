<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Kindeditor上传七牛云存储示例</title>
		<script src="http://apps.bdimg.com/libs/jquery/1.8.2/jquery.min.js"></script>
		<link rel="stylesheet" href="themes/default/default.css" />
		<script charset="utf-8" src="kindeditor.js"></script>
		<script charset="utf-8" src="lang/zh_CN.js"></script>
		<script>
		$(document).ready(function(){
			$.ajax({url: 'getToken.php?type=3', async: false, success: function(data){
				token1 = data.token1;
				token2 = data.token2;
				editor = KindEditor.create('.keditor', {
					uploadJson : 'http://upload.qiniu.com/',
					filePostName : 'file',
					allowFileManager : true,
					fileManagerJson : 'fileManage.php',
					extraFileUploadParams : {token : token2},
					token : token1,
					resizeType : 1,
					afterCreate: function(){this.sync();},
					afterBlur: function(){this.sync();}
				});
			}});
		});
		</script>
	</head>
	<body>
		<h3>请放置在外网服务器使用，否则七牛云的回调不了</h3>
		<h3>请勿上传重要资料，空间不定时清理，资料丢失责任自负哦</h3>
		<h3>默认模式</h3>
		<form>
			<textarea name="content" class='keditor' style="width:800px;height:400px;visibility:hidden;">KindEditor</textarea>
		</form>
		<h3>如果你发现Bug或有更好的想法请联系本人，我们一起改进，共同进步，谢谢！本人QQ:781850795(加好友请说明来意)</h3>
	</body>
</html>
