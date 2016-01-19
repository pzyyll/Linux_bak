<?php
	header("Content-Type:text/html;charset=utf-8");
	require_once('inc_admin.php');
	$res=delete("message",'id='.$_GET['id']);
	if($res){
		echo "<script type=\"text/javascript\">alter('删除成功！');</script>";
		header('location:comment_list.php');
	}
	else{
		echo '<script>history.go(-1)</script>';
		
	}
	close($link);
?>
