<?php

namespace Addons\Qiniu;

use Common\Controller\Addon;


/**
 * 七牛存储插件
 * @author zswin.cn
 */
class QiniuAddon extends Addon
{
    private $error;

    public $info = array(
        'name' => 'Qiniu',
        'title' => '七牛存储插件',
        'description' => '用于七牛存储的上传',
        'status' => 1,
        'author' => 'zswin',
        'version' => '0.1'
    );

    public $admin_list = array(
        'model' => 'Qiniu', //要查的表
        'fields' => '*', //要查的字段
        'map' => '', //查询条件, 如果需要可以再插件类的构造方法里动态重置这个属性
        'order' => 'id desc', //排序,
        'listKey' => array( //这里定义的是除了id序号外的表格里字段显示的表头名
            'id' => 'ID',
            'name' => '原文件名',
            'savename' => '保存名称',
            'savepath' => '保存路径',
            'size' => '文件大小',
            'create_time' => '上传时间',
        ),
    );

    public function install()
    {
    	$this->getisHook($this->info['name'], $this->info['name'], $this->info['description']);
        $prefix = C("DB_PREFIX");
        
                    $sql=<<<SQL
CREATE TABLE `{$prefix}Qiniu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文件ID',
  `name` char(30) NOT NULL DEFAULT '' COMMENT '原始文件名',
  `savename` char(20) NOT NULL DEFAULT '' COMMENT '保存名称',
  `savepath` char(30) NOT NULL DEFAULT '' COMMENT '文件保存路径',
  `ext` char(5) NOT NULL DEFAULT '' COMMENT '文件后缀',
  `mime` char(40) NOT NULL DEFAULT '' COMMENT '文件mime类型',
  `size` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  `url` varchar(100) NOT NULL DEFAULT '' COMMENT '文件url',
  `sha1` char(40) NOT NULL DEFAULT '' COMMENT '文件 sha1编码',
  `create_time` int(10) unsigned NOT NULL COMMENT '上传时间',
  `download` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文件表' AUTO_INCREMENT=1 ;
SQL;
        
        
        
        $model = D();
        $model->execute("DROP TABLE IF EXISTS {$prefix}Qiniu;");
        
        
        
        
        
        $model->execute($sql);
       
        
        
        return true;
    }

    public function uninstall()
    {
    	$this->deleteHook($this->info['name']);
        $prefix = C("DB_PREFIX");
        $model = D();
        $model->execute("DROP TABLE IF EXISTS {$prefix}Qiniu");
        return true;
    }

    public function Qiniu()
    {
    }
 
    public function upload($file){
     $uid=is_login();
		 
		
    	
    	$setting=array ( 
               
                'rootPath' => './',
                'saveName' => array ('uniqid', ''),
               'hash'     => true, //是否生成hash编码
                
            );
            $config = $this->getConfig();
         $driverConfig=array(
         
         'secrectKey' => $config['secrectKey'], 
         'accessKey' => $config['accessKey'],
         'domain' => $config['domain'],
         'bucket' => $config['bucket'], 
         
         
         
         
         
         );
          if(!is_admin($uid)){
		 	 $roleauth=getmroleauth($uid);
        
        
		 $setting['maxSize'] =$roleauth['filesize']*1024;
		 $setting['exts'] =$roleauth['fileext'];
		 }
    	$Upload = new \Think\Upload($setting,'Qiniu',$driverConfig);
        $info = $Upload->upload($file);
        
    	 if($info){
    	 	
			
    	 	$data['name']=$file['download']['name'];
    	 	$data['savename']=$info['download']['savename'];
    	 	$data['savepath']=$info['download']['savepath'];
    	 	$data['ext']=$info['download']['ext'];
    	 	$data['size']=$info['download']['size'];
    	 	$data['sha1']=$info['download']['sha1'];
    	 	$data['mime']=$info['download']['type'];
    	 	$data['url']=$info['download']['url'];
    	 	$data['create_time']=time();
    	 	
    	 	$id=M('Qiniu')->add($data);
			
		
		
		
		
            $return['status'] = 1;
           
           $return['url'] =$info['download']['url'];
            $return['info'] =$id;
        } else {
            $return['status'] = 0;
            $return['info']   = $Upload->getError();
        }
        
        return $return;
      
     
        
    }
    
    
public function Qiniu_Encode($str) // URLSafeBase64Encode
 {
    $find = array('+', '/');
    $replace = array('-', '_');
    return str_replace($find, $replace, base64_encode($str));
 }
 public function Qiniu_Sign($url) {//$info里面的url
    $config = $this->getConfig();
    
    $duetime = NOW_TIME + 86400;//下载凭证有效时间
    $DownloadUrl = $url . '?e=' . $duetime;
    $Sign = hash_hmac ( 'sha1', $DownloadUrl, $config['secrectKey'], true );
    $EncodedSign = Qiniu_Encode ( $Sign );
    $Token =  $config['accessKey'] . ':' . $EncodedSign;
    $RealDownloadUrl = $DownloadUrl . '&token=' . $Token;
    return $RealDownloadUrl;
 }

}