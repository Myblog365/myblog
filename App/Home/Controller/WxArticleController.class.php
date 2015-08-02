<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15-8-2
 * Time: 下午2:35
 * 等待以后有需要的时候用
 */

namespace Home\Controller;

class WxArticleController extends HomeController{

    public function artc()
    {
        $id=I('id');

        $info=M('article')->find($id);
        if(!$info){
            $this->error('非法ID！',U('Index/index'),false,true);
        }

        $this->assign('info',$info);
        $this->display();
    }
}