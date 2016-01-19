<?php
	require_once('inc_admin.php');
	$res=delete("video",'id='.$_GET['id']);
	if($res){
		header('location:videolist.php');
		
	}
	else{
		echo '<script>history.go(-1)</script>';
		
	}
	close($link);
?>
