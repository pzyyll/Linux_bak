<?php
header('Content-type:text/html;charset=UTF-8 ');
    $db = new PDO('mysql:dbname=exam_bank;host=localhost', 'root', 'mysql');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $query = "SELECT * FROM `Course`";
    
    try {
        $db->query("set names 'utf8'");
        $pdoStatement = $db->query($query);
        print_r($pdoStatement->fetchAll());
    } catch(PDOException $e) {
        echo $e->getMessage();
    }

$str = "abc";
$str2 = "cba";
echo $str.$str2;
?>