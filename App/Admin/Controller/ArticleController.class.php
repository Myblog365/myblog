<?php
namespace Admin\Controller;
use Common\Api\CategoryApi;

class ArticleController extends CommonController {
	
	public function _initialize(){
		$cate=new CategoryApi();
		$catelist=$cate->get_catelist(0,1);
		$this->assign('clist',$catelist);
		
		parent::_initialize();
	}
   function before_selectedDelete($ids){
		
		$condition = array ('id' => array ('in', explode ( ',', $ids ) ) );
		$uidarr=M('Article')->where ( $condition )->getField('uid',true);

		foreach ($uidarr as $key =>$vo){
			setuserscore($vo, C('ARTSCORE'),false);
			
		}
		
					
		
	      
		
	}
function before_foreverdelete($ids){
		
		$condition = array ('id' => array ('in', explode ( ',', $ids ) ) );
		$uidarr=M('Article')->where ( $condition )->getField('uid',true);

		foreach ($uidarr as $key =>$vo){
			setuserscore($vo, C('ARTSCORE'),false);
			
		}
		
					
		
	      
		
	}
	

	
function after_pass($ids){
		
		$condition = array ('id' => array ('in', explode ( ',', $ids ) ) );
		$uidarr=M('Article')->where ( $condition )->getField('uid',true);

		foreach ($uidarr as $key =>$vo){
			setuserscore($vo, C('ARTSCORE'));
			
		}
		
					
		
	      
		
	}


function insert() {
        if(I("post.thumb")){
            $_POST['thumb'] = cut_pic_url(I("post.thumb"));
        }else{
            unset($_POST['thumb']);
        }
         $_POST['status'] = 1;
         $_POST['uid'] = $_SESSION[C('USER_AUTH_KEY')];
         $_POST['create_time'] = time();
         $_POST['update_time'] = time();
         $_POST['copyright'] = "原文链接：<a href='{link}' rel='Kevin'>{$_POST['title']}</a>，转发请注明来源！";

        $affected = M('article') -> add($_POST);
        if(!empty($_POST['tag']))
        {
            $data['tag'] = explode(',',$_POST['tag']);
            //$model_tag = \Home\Model\TagsModel();
            D('Tags')->InsertTags($data['tag'],1);
        }

        if($affected){
            $this->mtReturn(200, '新增成功!');
        }else{
            $this->mtReturn(300, '新增失败!');
        }
    }


function update() {
        $wh['id'] = I('post.id');
        unset($_POST['id']);
        if(I("post.thumb")){
            $_POST['thumb'] = cut_pic_url(I("post.thumb"));
        }else{
            unset($_POST['thumb']);
        }
        $_POST['update_time'] = time();

        if(!empty($_POST['tag']))
        {
            $data =explode(',',$_POST['tag']);
            D('Tags')->InsertTags($data,1,$wh['id']);
        }
        $affected = M('article')->where($wh)-> save($_POST);
        if($affected){
            $this->mtReturn(200, '修改成功!');
        }else{
            $this->mtReturn(300, '修改失败!');
        }

    }

}

?>