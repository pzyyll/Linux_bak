<?php
	header("Content-Type:text/html;charset=utf-8");
	require_once('./system/db/mysql.func.php');
	require_once('./system/db/config.php');
	$link = connect();
	
	$movieName = $_POST['searchName'];
	$sql = "select * from video where name = '{$movieName}' ";
	$row = fetchOne($sql);
	
	if ($row) {
		$id = $row[id];
		header("Location: show.php?id={$id}");
	} else {
		echo "<script type=\"text/javascript\">alert(\"没有这部电影 ！！\");</script>\n";
		echo "<script>window.history.go(-1);</script>";
	}
?>
