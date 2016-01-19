<?php
	require_once('inc_admin.php');
	session_start();
	$_SESSION['ADMIN'] = "";
	$_SESSION['isLogin'] = 0;
	session_destroy();
	echo "注销成功！";
	header("refresh:1; url='login.html'");
?>
