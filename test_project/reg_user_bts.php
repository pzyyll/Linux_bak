
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <title>Document</title>
 </head>
 <body>
  <?php
	header('content-type:text/html;charset=utf-8');
	require_once '.\system\db\mysql.func.php';
	require_once '.\system\db\config.php';

	$username = $_POST['username'];
	$password = $_POST['password'];
	$sex = $_POST['sex'];
	$hobby = implode(',',$_POST['hobby']);
	$degree = $_POST['degree'];
	$intro = $_POST['intro'];

	//echo $username.','.$pwd.','.$sex.','.$hobby.','.$degree.','.$intro.'<br/>';

   //include_once("db_connect.php");
   $link = connect();

   //mysql_set_charset('utf8');

   $inser_sql = "insert into user values (null,'".$username."', '".$password."', ".$sex.", '".$hobby."', ".$degree.", '".$intro."')";
   $result = mysql_query($inser_sql) or die('更新数据失败：'.mysql_error());
   //增删改影响的行
   
   $rows = mysql_affected_rows();
   if ($rows != 1) {
	    echo "<br/>";
		echo '注册失败';
   } else {
		echo '注册成功';
   } 
   
   close($link);
   echo "<br/>即将返回首页，点<a href = 'index.php'>这里</a>立即返回";
   header("refresh : 1; URL = 'index.php'");

  ?>
 </body>
</html>
