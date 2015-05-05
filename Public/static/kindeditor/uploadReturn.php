<?php
/*
这里可以直接通过$_GET['upload_ret']获取自定义的返回数据，数据是经过编码的，解码后可得到json格式字符串，解码方式看下方代码
获取后可以进行存库等操作
最后一步返回的数据是按照Kindeditor的格式返回
*/
if (empty($_GET['upload_ret'])){
	exit('access deny');
}else{
	$str = json_decode(base64_decode(str_replace(array('-', '_'), array('+', '/'), $_GET['upload_ret'])), true);
	exit('{"error":0, "url": "'.$str['url'].'"}');
}
?>