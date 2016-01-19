<?php
	require_once('inc_admin.php');
	$username = $_GET['username'];
	$rows = delete("user", "username = '".$username."'");
	if($rows){
		echo '删除成功';
		echo "<br/>页面即将返回，点<a href = 'list_user_bts.php'>这里</a>立即返回";
		header("refresh : 2; URL = 'list_user_bts.php'");
	} else{
		echo '删除失败';
		echo "<script>history.go(-1)</script>";
	}
	close($link);
?>
