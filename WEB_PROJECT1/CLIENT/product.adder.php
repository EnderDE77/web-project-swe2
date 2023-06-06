<?php
$keys = [];
$quants = [];
foreach($_POST as $key => $value){
    var_dump($key);
    var_dump($value);
    if($key[0] == 'q'){
        array_push($quants, $value);
    }
    else{
        if(count($quants) - count($keys) > 1){
            unset($keys[count($keys)-2]);
        }
        array_push($keys, $key);
    }
}
var_dump($keys);
var_dump($quants);
//header("Location: ./clientview.php");
