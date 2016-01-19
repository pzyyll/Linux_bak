<?php
header('Content-type:text/html;charset="UTF-8" ');
session_start();
//var_dump($_SESSION);
if(!isset($_SESSION['ADMIN'])){
	//header('location:index.html');
	die (print '你没有权限！');
	
}

require_once('template/header.php');
require_once('template/top.php');
require_once('template/menu.php');

require_once('../system/db/mysql.func.php');
require_once('../system/db/config.php');

//require_once('../system/function.php');
//连接数据库
$link = connect();
?>
