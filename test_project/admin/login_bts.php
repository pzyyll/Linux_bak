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
   $username = $_POST['username'];
   $pwd = $_POST['pwd'];

   $sql = "select * from admin where adminname='".$username."' and pwd='".$pwd."'";
   
   //执行sql语句
   $result = mysql_query($sql);
   //获取返回的行数
   $rows = mysql_num_rows($result);
   if ($rows > 0) {
		echo '登录成功';
		session_start();
		$_SESSION['ADMIN'] = $username;
		$_SESSION['isLogin'] = 1;
		close($link);
		header("location:list_user_bts.php");
   } else {
	    echo '登录失败<br/>';
		echo "即将将返回登录页面,点<a href = 'login.html'>这里</a>立即返回。";
		close($link);
		header("refresh:3; url='login.html'");
   }
   echo '<br/>';

   //echo $username.','.$pwd.'<br/>';
 ?>
<?php 
require_once('template/footer.php');
?>
