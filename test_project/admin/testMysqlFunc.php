<?php
header('content-type:text/html;charset=utf-8');
require_once '../db/mysql.func.php';
require_once '../db/config.php';
//连接数据库
$link=connect();
//var_dump($link);

/*//插入记录 返回id
$array=array(
'name'=>'king1',
'type'=>'1',
'intro'=>'介绍'    
);

 $table='video';
 $res=insert($array, $table);
 var_dump($res);
*/
/*//修改记录 返回修改的记录数量
$array2=array(
'name'=>'king is king',
'type'=>'1',
'intro'=>'介绍'    
);
 $table='video';
 $res=update($array2, $table,'id=8');
 var_dump($res);
*/
/*//删除记录 返回删除的记录数量
 $table='video';
$res=delete($table,'id=8');
var_dump($res);

*/


/*//获取一条记录 返回关联数组
 $sql='SELECT * FROM users2 WHERE id=1 ';
 $row=fetchOne($sql);
 var_dump($row);
 */

//获取多条记录 返回多条记录的数组（每条记录是关联数组）
$sql='SELECT * FROM video';
$rows=fetchAll($sql);
var_dump($rows);
?>

<table border='1'>

<tr>
<th>视频ID</th><th>视频名称</th><th>视频介绍</th>
</tr>
<?php
echoTInfos($rows,array("id","name","intro"));
/*
for($i=0;$i<count($rows);$i++){
	echo "<tr>";
	echo "<td>{$rows[$i]['id']}</td>";
	echo "<td>{$rows[$i]['name']}</td>";
	echo "<td>{$rows[$i]['intro']}</td>";
	echo "</tr>";
}*/
?>
</table>