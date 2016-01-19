<?php
header('Content-type:text/html;charset="UTF-8" ');

require_once('template/header.php');
require_once('template/top.php');
require_once('template/menu.php');

require_once('../system/db/mysql.func.php');
require_once('../system/db/config.php');

//require_once('../system/function.php');
//连接数据库
$link = connect();
?>

<?php
/*
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sex = $_POST['sex'];
	$hobby = implode(',',$_POST['hobby']);
	$degree = $_POST['degree'];
	$intro = $_POST['intro'];

   $inser_sql = "insert into user values (null,'".$username."', '".$password."', ".$sex.", '".$hobby."', ".$degree.", '".$intro."')";
   $result = mysql_query($inser_sql) or die('更新数据失败：'.mysql_error());
   //增删改影响的行
   $rows = mysql_affected_rows();
*/
	//$array["id"] = null;
	$array["username"] = $_POST["username"];
	$array["password"] = $_POST["password"];
	$array["sex"] = $_POST["sex"];
	$array["hobby"] = implode(',', $_POST["hobby"]);
	$array["degree"] = $_POST["degree"];
	$array["intro"] = $_POST["intro"];

	$rows = insert($array, "user");

   if ($rows == 0) {
	   echo "<br/>";
	   echo '注册失败';
   } else {
	   echo '注册成功';

   } 
   
   close($link);
   echo "<br/>即将返回注册页面，点<a href = 'login.html'>这里</a>立即返回";
   header("refresh : 1; URL = 'login.html'");

  ?>
<?php 
	require_once('template/footer.php');
?>
