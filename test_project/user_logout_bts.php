<!-- 注销logout.php -->
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <title>LOGOUT</title>
 </head>
 <body>
  <?php
	session_start();
	$_SESSION['username'] = "";
	$_SESSION['isLogin'] = 0;
	session_destroy();
	echo "注销成功！";
	header("refresh:1; url='index.php'");
  ?>
 </body>
</html>
