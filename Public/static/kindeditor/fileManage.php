<?php
include 'config.php';
//七牛请求参数整理
$path = empty($_GET['path']) ? 123 : '123_'.$_GET['path'];
$url = '/list?'.http_build_query(array('bucket' => $config['QINIU_BUCKET'], 'delimiter' => '_', 'prefix' => $path.'_'));

$sign = hash_hmac('sha1', $url."\n", $config['QINIU_SK'], true);
$token = $config['QINIU_AK'].':'.str_replace(array('+', '/'), array('-', '_'), base64_encode($sign));

$header = array('Host: rsf.qbox.me', 'Content-Type:application/x-www-form-urlencoded', 'Authorization: QBox '.$token);

//七牛请求获取数据
$curl = curl_init ();
curl_setopt($curl, CURLOPT_URL, trim($config['QINIU_RSF_HOST'].$url,'\n'));
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  
curl_setopt($curl, CURLOPT_POSTFIELDS, "");   
$qiniuResult = json_decode(curl_exec($curl), true);
curl_close($curl);

//按照Kindeditor格式组合数据
$file_list = array();
$ext_arr = array('gif', 'jpg', 'jpeg', 'png', 'bmp');
foreach ($qiniuResult['items'] as $k => $v){
	$file_ext = strtolower(pathinfo($v['key'], PATHINFO_EXTENSION));
	$file_list[] = array(
		'is_dir' => false,
		'has_file' => false,
		'filesize' => $v['fsize'],
		'is_photo' => in_array($file_ext, $ext_arr),
		'filename' => str_ireplace($path.'_', '', $v['key']),
		'datetime' => date('Y-m-d H:i:s', (int)($v['putTime']/10000000))
	);
}
foreach ($qiniuResult['commonPrefixes'] as $k => $v){
	$name = explode('_', $v);
	$file_list[] = array(
		'is_dir' => true,
		'has_file' => true,
		'filename' => $name[1]
	);
}
$result['moveup_dir_path'] = '';
$result['current_dir_path'] = $_GET['path'];
$result['current_url'] = $config['QINIU_HOST'].'/'.$path.'_';
$result['file_list'] = $file_list;

header('Content-Type:application/json; charset=utf-8');
exit(json_encode($result));
?>