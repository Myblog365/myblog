<?php
$config = array(
	'QINIU_AK' => '31BMePSLtnrquPr5uXgOiCii-_S8vVY0pIobQU9V',
	'QINIU_SK' => '9j4-N40OrKM7UelTtijcr9P5Ka_LgTcQfucHQjYG',
	'QINIU_HOST' => 'http://7xiuw8.com1.z0.glb.clouddn.com/',
	'QINIU_BUCKET' => 'myblog',
	'QINIU_RSF_HOST' => 'http://rsf.qbox.me',
	'SITE_URL' => 'http://myblog365.xyz/Public/static/kindeditor/'
);

function token($data, $accessKey, $secretKey){
	$data = str_replace(array('+', '/'), array('-', '_'), base64_encode(json_encode($data)));
	$sign = hash_hmac('sha1', $data, $secretKey, true);
	return $accessKey.':'.str_replace(array('+', '/'), array('-', '_'), base64_encode($sign)).':'.$data ;
}
?>
