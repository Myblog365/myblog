<?php
include 'config.php';

$type = $_GET['type'];

if (!in_array($type, array(1, 2, 3))){
	exit('access deny');
}

header("Content-type:text/html;charset=utf-8");
$bucket = $config['QINIU_BUCKET'];
$host = $config['QINIU_HOST'];
$accessKey = $config['QINIU_AK'];
$secretKey = $config['QINIU_SK'];
$userId = 123;//用户标识，文件管理时根据此参数划分目录
$fileName = date('YmdHis').'_'.'$(fname)';

$data =  array(
	"scope" => $bucket,
	"saveKey" => $fileName,
	"deadline" => time() + 3600
);
//token1用于单文件上传调用，由于Kindeditor单文件上传是通过提交给隐藏的Iframe实现，因此要通过303重定向来返回值，因此要配置returnUrl和returnBody
$data1 = array_merge($data, array('returnUrl' => $config['SITE_URL'].'uploadReturn.php', 'returnBody' => '{"url": "'.$host.'/'.$fileName.'", "size": $(fsize), "name": "$(fname)"}'));
$token1 = token($data1, $accessKey, $secretKey);
//token2用于多文件上传时，回调服务器进行相关数据处理，比如记录上传文件的信息，如果不需要记录，也可以不设置callbackUrl和callbackBody
$data2 = array_merge($data, array('callbackUrl' => $config['SITE_URL'].'uploadCallback.php', 'callbackBody' => 'url='.$host.'/'.$fileName.'&size=$(fsize)&name=$(fname)'));
$token2 = token($data2, $accessKey, $secretKey);

header('Content-Type:application/json; charset=utf-8');
if($type == 3){
	exit(json_encode(array('token1' => $token1, 'token2' => $token2)));
}else if($type == 2){
	exit(json_encode($token2));
}else{
	exit(json_encode($token1));
}
?>
