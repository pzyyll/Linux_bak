<?php
	session_start();
	header("Content-Type:text/html;charset=utf-8");
	require_once('./system/db/mysql.func.php');
	require_once('./system/db/config.php');
	$link = connect();
	
	//$array['id'] = NULL;
	$array["movie_id"] = $_POST['movie_id'];
	//$array["name"] = $_POST['name'];
	$array["name"] = $_SESSION['username'];
	//$array["email"] = $_POST['email'];
	$array['title'] = $_POST['title'];
	$array['comment'] = $_POST['comment'];
	$array['time'] = date("Y-m-d H:i:s");
	
	if (!$_POST['comment']) {
		close($link);
		echo "<script type=\"text/javascript\">alert(\"内容不能为空！\");</script>\n";
		echo "<script>window.history.go(-1);</script>";
	} else {
		insert($array, "message");
		close($link);
		//echo "<script>window.history.go(-1);</script>";
		//echo "<script>alter('comment succeed!')</script>"
		header("Location: show.php?id={$_POST['movie_id']}");
	}
?>


