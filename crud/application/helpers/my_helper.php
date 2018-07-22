<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function count_char($str, $ch){
    //$str = "the quick brown fox jumps over...";
    $n = explode($ch,$str);
    return count($n)-1;
}

function reverse_words($str){
    $arr = explode(' ',$str);
    $newarr = array();
    foreach($arr as $a){
        $newarr[] = strrev($a);
    }
    $newstr = implode(' ',$newarr);
    return $newstr;
}