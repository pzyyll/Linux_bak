<?php
session_start();
$uname = $_POST['uname'];
$passw = $_POST['passw'];
//echo $uname.$passw;
$host = 'localhost:3306';
$user ='root';
$pass = '';

$link = mysql_connect($host,$user,$pass) or die (mysql_error());
mysql_select_db('video_jsz',$link) or die (mysql_error());
mysql_query('set names utf8');

$sql = "select * from admin where adminname='".$uname."' and pass = md5('".$passw."')";
$result = mysql_query($sql);
$rowcount = mysql_num_rows($result);
if($rowcount>0){
	$_SESSION['ADMIN'] = $uname;
	//var_dump($_SESSION);
	header('location:ulist.php');
	
}else{
	header('location:login.html');
}
mysql_close();


?>
<!doctype html>
<html lang="zh-cn">
 <head>
  <meta charset="UTF-8">
  <title>Document</title>
 </head>
 <body>
  
 </body>
</html>
