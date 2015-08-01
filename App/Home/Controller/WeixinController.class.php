<?php
namespace Home\Controller;
use Think\Controller;
use Think\WechatAuth;
use Think\Wechat;

class WeixinController extends HomeController {
   
    private $weixin = null;
    private $weixinTool = null;


    public function __construct()
    {
        if(C('WX_DEBUG'))
        {
            slog(array(
                'error_handler'=>true,
                'optimize'=>false,                   //是否显示利于优化的参数，如果运行时间，消耗内存等，默认为false
                'show_included_files'=>true,        //是否显示本次程序运行加载了哪些文件，默认为false
                'force_client_id'=>C('MY_DEBUG'),   //日志强制记录到配置的client_id,默认为空
                'allow_client_ids'=>C('DENUG_ARRAY'), //限制允许读取日志的client_id，默认为空,表示所有人都可以获得日志。
            ),'set_config');
        }

        $this->weixinTool = D('WeixinTool','Service');
        $this->weixin   =  new WechatAuth(C('WXAPPID'),C('WXAPPSECRET'),$this->weixinTool->getToken());

        //是否更新创建菜单
        if(C('wx_ismenu')){
            $data = '{
                 "button":[
                 {
                      "type":"click",
                      "name":"首页",
                      "key":"home"
                  },
                  {
                       "type":"click",
                       "name":"简介",
                       "key":"introduct"
                  },
                  {
                       "name":"菜单",
                       "sub_button":[
                        {
                           "type":"click",
                           "name":"hello word",
                           "key":"V1001_HELLO_WORLD"
                        },
                        {
                           "type":"click",
                           "name":"赞一下我们",
                           "key":"V1001_GOOD"
                        }]
                   }]
            }';
            $menu = $this->weixin->menuCreate($data);
            slog($menu);
        }
    }


    public function index(){

        $wechat = new Wechat(C('token'));
        //获取客户端数据
        $data = $wechat->request();

        if($data && is_array($data)){


            // 客户传来的数据进行保存
            $this->weixinTool->receive_data($data);
            switch ($data['MsgType']) {
                case 'text':
                    $response = $this->weixinTool->reply_text($data);
                    break;

                case 'image':
                    $response = $this->weixinTool->reply_image($data);
                    break;

                case 'voice':
                    $response = $this->weixinTool->reply_voice($data);
                    break;

                case 'video':
                    $response = $this->weixinTool->reply_video($data);
                    break;

                case 'location':
                    $response = $this->weixinTool->reply_location($data);
                    break;
                case 'link':
                    $response = $this->weixinTool->reply_link($data);
                    break;
                case 'event':
                    $response = $this->weixinTool->reply_event($data);
                    break;
            }

            $content = $response['content'];
            $type    = $response['type'];
            $wechat->response($content, $type);
        }

    }

}