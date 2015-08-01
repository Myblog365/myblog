<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15-7-9
 * Time: 下午11:11
 */
namespace Home\Service;

use Think\Model;
use Think\WechatAuth;
//微信常用工具模块
class WeixinToolService extends Model{

    //表示没有对应的模型表时，需要这句话
    protected $autoCheckFields = False;
    public $weixin       = null;
    public $access_token = null;


    // 接收的数据进行存储
    public function receive_data($data){
        M('wx_'.$data['MsgType'])->add($data);
    }


    /**
     * @content 获取token
     * @return mixed
     * @throws \Exception
     */
    public function getToken(){

        $this->weixin = new WechatAuth(C('WXAPPID'),C('WXAPPSECRET'));
        $config   =  M('wx_token')->where(array('appid'=>C('WXAPPID'),'appsecret'=> C('WXAPPSECRET')))->order('id desc')->find();
        if (is_null($config) || $config['over_time']<time()) {
            $data['appid']          =   C('WXAPPID');
            $data['appsecret']      =   C('WXAPPSECRET');
            $data['update_time']    =   time();
            $data['over_time']     	=   $data['update_time'] + 7200;
            $data['access_token']   =   $this->weixin->getAccessToken()['access_token'];
            $add=M('wx_token')->add($data);
            if ($add) {
                $this->access_token      =    $data['access_token'];
            }else{
                throw new \Exception('保存access失败！请手动保存'.$data['access_token']);
            }
        }else{
            $this->access_token    =    $config['access_token'] ;
        }
        return $this->access_token;
    }


    /*************以下进行逻辑处理后，可进行对应回复*******************/

    public function  reply_text($data){

        $dataArr = explode('_',$data['Content']);
        if(count($dataArr)>1)
        {
            $wh['description']=array('like','%'.$dataArr[1].'%');
            $response = $this->reply_news($wh);
        }else if($data['Content'] == '推荐'){
            $wh['tj'] = 1;
            $response = $this->reply_news($wh);
        }else{
            $response['content'] =  "发送“推荐”可发送精选博客\n\r\n发送“搜索_内容”可搜索该内容的博客\n\r\n";
            $response['type']='text';
        }
        return $response;
    }

    public function  reply_news($wh){
        $data = M('article')->where($wh)->order("id desc")->limit(5)->select();
        $articles = array();
        foreach($data as $key => $colArr)
        {
            if($key == 0 || $key ==1)
            {
                if(!empty($colArr['thumb']))
                {
                    $PicUrl = C('picUrl').$colArr['thumb'];
                }else{
                    $PicUrl = C('blog_url')."/Public/home/images/art_default.jpg";
                }
            }else{
                $PicUrl = '';
            }
            $Url = C('blog_url')."/index.php/artc/{$colArr['id']}.html";
            $temp = array(
                "Title" => $colArr['title'],
                "Description" => $colArr['description'],
                "Url" => $Url,
                "PicUrl" => $PicUrl,
            );

            array_push($articles,$temp);

        }

        $response['content']=$articles;
        $response['type']='news';
        return $response;
    }

    public function  reply_image($data){
        $response['content']='这是一张图片';
        $response['type']='text';
        return $response;
    }

    public function  reply_voice($data){
        $response['content']=$data['MediaId'];
        $response['type']='voice';
        return $response;
    }

    public function  reply_video($data){
        $response['content']='12312313';
        $response['type']='text';
        return $response;
    }

    public function  reply_location($data){
        $response['content']='12312313';
        $response['type']='text';
        return $response;
    }

    public function  reply_link($data){
        $response['content']='12312313';
        $response['type']='text';
        return $response;
    }

    public function  reply_event($data){
        $response['content']='12312313';
        $response['type']='text';
        return $response;
    }




}



 ?>