<?php
	require_once('inc_admin.php');

	$username = $_POST['username'];
	$array['sex'] = $_POST['sex'];
	$array['hobby'] = implode(',', $_POST['hobby']);
	$array['degree'] = $_POST['degree'];
	$array['intro'] = $_POST['intro'];

	//include_once('db_connect.php');
	$link = connect();
	
	/*
	$sql = "update user set sex = ".$sex.", hobby = '".$hobby."', degree = ".$degree.", intro = '".$intro."'
			where username = '".$username."'";
	
	//echo $sql."<br/>";
	$result = mysql_query($sql);
	*/
	$rows = update($array, "user", "username='".$username."'");
	
	if($rows){
		header('location:list_user_bts.php');
	}
	else{
		echo '<script>history.go(-1)</script>';
		
	}
	close($link);
?>
