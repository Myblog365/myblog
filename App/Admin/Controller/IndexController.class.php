<?php
namespace Admin\Controller;
class IndexController extends CommonController {

    // 框架首页
    public function index() {
    	
    	$views=M('article')->where(array('status'=>1))->sum('view');
    	
    	$this->assign ( 'views', $views);
    	$artcount=M('article')->where(array('status'=>1))->count();
    	 
    	$this->assign ( 'artcount', $artcount);
    	$usercount=M('member')->where(array('status'=>1))->count();
    	$this->assign ( 'usercount', $usercount);
    	
    	
    	
       $syslog=D('syslogs')->order('id desc')->limit(10)->select();
        
        $this->assign ( 'syslog', $syslog);

       $os = new \Admin\Model\LocalCommentModel();
       $mysqlVersion = $os->_mysql_version();
       $this->assign('mysqlVersion',$mysqlVersion);
       $mysqlSize = $os->_mysql_db_size();
       $this->assign('mysqlSize',$mysqlSize);
        //获取操作系统
        $this -> assign('ap',php_uname('s'));
        //获取服务器软件
        $this -> assign('sw',$_SERVER['SERVER_SOFTWARE']);
        //系统版本
        $this -> assign('xt',php_uname('r'));
        $this -> assign('fs',sizecount(disk_free_space("/")));

        $this->display();
    }



}

?>