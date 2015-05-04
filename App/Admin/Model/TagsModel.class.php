<?php
/*http://www.zswin.cn
QQ:49007623
company:kssoulmate.com*/
namespace Admin\Model;
use Think\Model;


class TagsModel extends CommonModel {
	
public function _after_find(&$result,$options) {
	$typetext =C('CATE_TYPE');
	
	$result['typetext'] = $typetext[$result['type']];
	$result['path']=getThumbImageById($result['img']);

}

public function _after_select(&$result,$options){
	foreach($result as &$record){
			
		$this->_after_find($record,$options);
	}
}

    public function InsertTags($tags,$type,$edit=0){//插入一个标签数组


        $tag=M('Article')->where(array('id'=>$edit))->getField('tag');

        foreach ($tags as $key =>$vo){

            if($edit==0||false===strpos($tag,$vo)){
                $this->InsertTag($vo, $type);
            }
        }


    }
    public function InsertTag($tag,$type){//插入一个标签


        $data['title']=$tag;
        $data['type']=$type;

        $id=$this->where($data)->getField('id');


        if($id>0){

            $this->where($data)->setInc('num',1);
            $this->where($data)->setField('update_time',time());
        }else{
            $data['update_time']=time();
            $data['num']=1;
            $id=$this->add($data);


        }

        return $id;
    }

}