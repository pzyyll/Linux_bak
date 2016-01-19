<?php
	require_once('inc_admin.php');
	$row = fetchOne("select * from video where id = {$_GET['id']}");
	//echo $_GET['id'];
	$res=delete("video",'id='.$_GET['id']);
	if($res){
		$filepath = "./images/".$row['pic'];
		if(file_exists($filepath)) {
			unlink($filepath);
		} else {
			echo "图片不存在！";
		}
		header('location:video_list_bts.php');
	}
	else{
		echo '<script>history.go(-1)</script>';
		
	}
	close($link);
?>
