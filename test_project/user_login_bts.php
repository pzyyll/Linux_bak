<!-- admin_login_bts.php -->
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <title>login</title>
 </head>
 <body>
 <?php
	header('content-type:text/html;charset=utf-8');
	require_once '.\system\db\mysql.func.php';
	require_once '.\system\db\config.php';

   $username = $_POST['username'];
   $pwd = $_POST['pwd'];

   //include_once('db_connect.php');
   $link = connect();

   echo $sql = "select * from user where username='".$username."' and password='".$pwd."'";
   
   //执行sql语句
   $result = mysql_query($sql);
   //获取返回的行数
   $rows = mysql_num_rows($result);
   if ($rows > 0) {
		echo '登录成功';
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['isLogin'] = 1;
		close($link);
		header("location:index.php");
   } else {
	    echo '登录失败<br/>';
		echo "即将将返回登录页面,点<a href = 'user_login_bts.html'>这里</a>立即返回。";
		close($link);
		//header("refresh:3; url='user_login_bts.html'");
   }
   echo '<br/>';

   //echo $username.','.$pwd.'<br/>';
 ?>
 </body>
</html>
