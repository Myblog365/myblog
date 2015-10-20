<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15-10-10
 * Time: 上午12:36
 */
//header("Status: 404 Not Found");
if(isset($_GET['a'])){
    $act = $_GET['a'];
    switch($act){
        case 'one':
            rangeFun(0,15);
            break;
        case 'two':
            rangeFun(0,20);
            break;
        case 'three':
            rangeFun(0,30);
            break;
    }
}else{
    rangeFun(0,15);
}

function rangeFun($a,$b){
    $num = rand($a,$b);
    if($num < 5){
        header("HTTP/1.1 404 Not Found");
    }else if($num>5 && $num<10){
        $s_rand = rand(0,10);
        if($s_rand > 7){
            sleep(1);
        }
        echo json_encode(array('kevin1'=>$num,'kevin2'=>$num));
    }else{
        echo json_encode(array('kevin1'=>$num,'kevin2'=>$num));
    }
}
