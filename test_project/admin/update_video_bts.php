<?php
	session_start();
	$id = $_SESSION['id'];
	require_once('inc_admin.php');
	
	$row = fetchOne("select * from video where id = {$id}");
	$array['name'] = $_POST['video_name'];
	$array['type'] = $_POST['video_type'];
	$array['intro'] = $_POST['intro'];
	$array['addr'] = $_POST['addr'];

	//print_r($array);
	//echo "<br/>";
	//print_r($_FILES['photo']);
	$tmp_name = $_FILES['photo']['tmp_name'];
	if ($tmp_name) {
		$path_root = "./images/";
		$photoSize = $_FILES['photo']['size'];
		echo $photoType = $_FILES['photo']['type'];
		$photoName = $_FILES['photo']['name'];

		   //先上传文件，然后存储到数据库 
		   if($photoSize>1000000) die("文件过大");
		   //限制文件类型：假设只允许上传图片
		   if($photoType!="image/pjpeg" && $photoType!="image/jpeg" && $photoType!="image/gif" && $photoType!="image/png"   ){
			  die("必须上传图片文件（jpeg，gif或png）！");
		   }
		   //获取文件扩展名
		   $suffix = strrchr($photoName, '.');	// 获取.在文件名中最后一次出现
		   //echo $suffix;
		   //文件名规则：时间+随机数+扩展名
		   $photoNewname = date("YmdHis").rand(1000,9999).$suffix;
		   $upld_res = move_uploaded_file($_FILES['photo']['tmp_name'], "$path_root/$photoNewname");
		   if(!$upld_res) { die("文件上传失败！"); }
		$array['pic'] = $photoNewname;

		$photo_path = $path_root.$row['pic'];	
		if (file_exists($photo_path)) {
			unlink($photo_path);
		} else {
			echo "图片不存在<br/>";
		}
	}

	$res = update($array, "video", "id = ".$id."");
	if($res){
		header('location:video_list_bts.php');
		
	}
	else{
		echo '<script>history.go(-1)</script>';
		
	}

	close($link);
?>
