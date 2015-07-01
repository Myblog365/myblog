<?php
namespace Home\Controller;
use Think\Controller;

class ApiController extends Controller {
    public function GetApi(){
        $arr=array('12'=>array('aa','bb','cc'),'22','33','44','55');
        echo jsonFormat($arr);
    }
}