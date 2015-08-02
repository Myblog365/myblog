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
            $wh['description'] = array('like','%'.$dataArr[1].'%');
            $order             = "id desc";
            $response          = $this->reply_news($wh,$order);
        }else if($data['Content'] == '推荐'){
            $wh['tj']   = 1;
            $order      = "id desc";
            $response   = $this->reply_news($wh,$order);
        }else if($data['Content'] == '最新'){
            $wh         = '';
            $order      = "id desc";
            $response   = $this->reply_news($wh,$order);
        }else if($data['Content'] == '热门'){
            $wh         = '';
            $order      = "view desc";
            $response   = $this->reply_news($wh,$order);

        }else{
            $response['content'] =  "发送“推荐”可发送精选博客\n\r\n发送“最新”可发送最新博客\n\r\n发送“热门”可发送热门博客\n\r\n发送“搜索_内容”可搜索该内容的博客\n\r\n";
            $response['type']='text';
        }
        return $response;
    }

    public function  reply_news($wh,$order){
        if(empty($wh))
        {
            $data = M('article')->order($order)->limit(5)->select();
        }else{
            $data = M('article')->where($wh)->order($order)->limit(5)->select();
        }
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
                "Title"         => $colArr['title'],
                "Description"   => $colArr['description'],
                "Url"           => $Url,
                "PicUrl"        => $PicUrl,
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
        switch ($data['Event'])
        {
            case "subscribe":   //关注事件
                $title = "您好，欢迎您的关注，myblog365天天博客，致力开源，分享交流。";
                $articles = array();
                $articles[] = array(
                    "Title"         => '欢迎您的关注！',
                    "Description"   => $title,
                    "Url"           => C('blog_url'),
                    "PicUrl"        => C('blog_url')."/Uploads/art_thumb/image/20150430/20150430214728_91949.png",
                );

                $response['content']= $articles;
                $response['type']   = 'news';
                return $response;
                break;
            case "unsubscribe": //取消关注事件
                $response['content']='你就这么狠心的把我取消了！';
                $response['type']='text';
                return $response;
                break;
        }



    }




}



 ?>