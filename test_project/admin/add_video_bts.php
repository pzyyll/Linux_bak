<?php
	require_once('inc_admin.php');

   //print_r($_FILES['photo']);
   $tmp_name = $_FILES['photo']['tmp_name'];
   if($_POST['submit']!="添加"||!$tmp_name){
	   echo "对不起，请提交表单";
	   exit;
   }
   //如果提交了表单，则执行下面的代码
   //获取当前文件的根目录
   
   $path = '../assets/images/';
   $size = $_FILES['photo']['size'];
   $name = $_FILES['photo']['name'];
   $type = $_FILES['photo']['type'];

/*
   $video_name = $_POST['video_name'];
   $video_type = $_POST['video_type'];
   $intro = $_POST['intro'];
   $addr = $_POST['addr'];
*/
   //先上传文件，然后存储到数据库 
   if($size>1000000) die("文件过大");
   //限制文件类型：假设只允许上传图片
   if($type!="image/pjpeg" && $type!="image/jpeg" && $type!="image/gif" && $type!="image/png"   ){
	  die("必须上传图片文件（jpeg，gif或png）！");
   }

   //获取文件扩展名
   $suffix = strrchr($name, '.');	//获取.在文件名中最后一次出现
   //echo $suffix;
   //文件名规则：时间+随机数+扩展名
   $newname=date("YmdHis").rand(1000,9999).$suffix;

   /*
   $sql = "insert into photo values(null,'".$newname."','".$path."',".$size.",'".$type."',".$userid.")";
   echo $sql; 
   */


	$array["name"] = $_POST['video_name'];
	$array["type"] = $_POST['video_type'];
	$array["mtime"] = date("Y-m-d h:i:s");
	//$array["hint"] = 0;
	$array["pic"] = $newname;
	$array["intro"] = $_POST['intro'];
	$array["addr"] = $_POST['addr'];
	//$array["download"] = 0;

	$id = insert($array, "video");
/*
   $sql = "insert into video values(null, '".$video_name."', ".$video_type.", sysdate(), 0, '".$newname."', '".$intro."', '".$addr."', 0)";
   echo "<br/>".$sql;
   $result = mysql_query($sql);
   $id = mysql_insert_id();
*/
   if($id==0){
	  echo "添加失败！";
	  //header("location:reg.html");
   }else{	  
	  echo "添加成功！<br/>";
	  //假设把上传文件保存在images文件夹中
	  move_uploaded_file($_FILES["photo"]["tmp_name"],"$path/$newname");
	  /*
	  echo "<img src='$path/$newname'>";
	  echo "<a href=\"getdata.php?id=$id\">你要看看吗？</a><br/>";
	  echo "<a href=\"download.php?id=$id\">下载</a><br/>";
	  */
   }

	close($link);
?>
