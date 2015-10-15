<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 15-10-10
 * Time: 上午12:36
 */
//header("Status: 404 Not Found");

$num = rand(0,15);
if($num < 5){
    header("HTTP/1.1 404 Not Found");
}else if($num>5 && $num<10){
    $s_rand = rand(0,10);
    if($s_rand > 7){
        sleep(1);
    }
    echo '111';
}else{
    echo '3333';
}