<?php
/**
 * Created by PhpStorm.
 * User: caizhili
 * Date: 15/12/12
 * Time: 下午11:29
 */

$filename = "./test.json";
$json_string = file_get_contents($filename);

//echo $json_string;

$arr = json_decode($json_string);
//print_array($arr);
var_dump($arr);