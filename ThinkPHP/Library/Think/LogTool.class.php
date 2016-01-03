<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15-7-10
 * Time: 下午2:55
 */
namespace Think;


class LogTool
{

    public static function setLogPath(){
        if(!class_exists('Seaslog')){
            throw new \Exception('SeasLog没有开启,请开启服务！');
        }
        //设置seasLog保存位置
        \SeasLog::setBasePath('./Runtime/SeasLog');

    }

    public function  getlogPath()
    {
        self::setLogPath();
        return \SeasLog::getBasePath();
    }

    public static function error($message,array $content = array(),$module = '')
    {
        self::setLogPath();
        if ($module != '') {
            \SeasLog::error($message, $content, $module);
        } else {
            \SeasLog::error($message, $content);
        }
    }


    public static function debug($message,array $content = array(),$module = '')
    {
        self::setLogPath();
        if ($module != '') {
            \SeasLog::debug($message, $content, $module);
        } else {
            \SeasLog::debug($message, $content);
        }
    }


    public static function info($message,array $content = array(),$module = '')
    {
        self::setLogPath();
        if ($module != '') {
            \SeasLog::info($message, $content, $module);
        } else {
            \SeasLog::info($message, $content);
        }
    }


    public static function warning($message,array $content = array(),$module = '')
    {
        self::setLogPath();
        if ($module != '') {
            \SeasLog::warning($message, $content, $module);
        } else {
            \SeasLog::warning($message, $content);
        }
    }

    public static function critical($message,array $content = array(),$module = '')
    {
        self::setLogPath();
        if ($module != '') {
            \SeasLog::critical($message, $content, $module);
        } else {
            \SeasLog::critical($message, $content);
        }
    }

    public static function alert($message,array $content = array(),$module = '')
    {
        self::setLogPath();
        if ($module != '') {
            \SeasLog::alert($message, $content, $module);
        } else {
            \SeasLog::alert($message, $content);
        }

    }

    public static function emergency($message,array $content = array(),$module = '')
    {
        self::setLogPath();
        if ($module != '') {
            \SeasLog::emergency($message, $content, $module);
        } else {
            \SeasLog::emergency($message, $content);
        }
    }


    /**
     * 通用日志方法
     * @param $level
     * @param $message
     * @param array $content
     * @param string $module
     */
    public static function log($level,$message,array $content = array(),$module = '')
    {
        self::setLogPath();
        if ($module) {
            \SeasLog::$level($message, $content, $module);
        } else {
            \SeasLog::$level($message, $content);
        }
    }
}