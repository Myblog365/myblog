<?php
/*http://www.zswin.cn
QQ:49007623
company:kssoulmate.com*/
namespace Admin\Model;
use Think\Model;


class LocalCommentModel extends CommonModel {
	
public function _after_find(&$result,$options) {
	
	$result['rowtitle'] =D($result['app'].'/'.$result['con'])->where(array('id'=>$result['row_id']))->getField('title');
	
	if(strtolower($result['con'])=='article'){
		$result['rowurl'] = U('Home/Index/artc',array('id'=>$result['row_id']));
	}
	if(strtolower($result['con'])=='music'){
		$result['rowurl'] = U('Home/Index/musicc',array('id'=>$result['row_id']));
	}
	if(strtolower($result['con'])=='group'){
		$result['rowurl'] = U('Home/Index/groupc',array('id'=>$result['row_id']));
	}
	
	
	

}

public function _after_select(&$result,$options){
	foreach($result as &$record){
			
		$this->_after_find($record,$options);
	}
}

    ////////////////获取数据库的大小和版本////////////////////////
    public function _mysql_version()
    {
        $Model = new Model();
        $version = $Model->query("select version() as ver");
        return $version[0]['ver'];
    }
    public function _mysql_db_size()
    {
        $Model = new Model();
        $sql = "SHOW TABLE STATUS FROM ".C('DB_NAME');
        $tblPrefix = C('DB_PREFIX');
        if($tblPrefix != null) {
            $sql .= " LIKE '{$tblPrefix}%'";
        }
        $row = $Model->query($sql);
        $size = 0;
        foreach($row as $value) {
            $size += $value["data_length"] + $value["index_length"];
        }
        return round(($size/1048576),2).'M';
    }

}