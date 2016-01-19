<?php
	require_once('inc_admin.php');
?>
  <?php

	mysql_query("set names utf8");
	$sql = "select * from user";
	$q_result = mysql_query($sql) or die("查询失败：".mysql_error());
	
	$rows = mysql_num_rows($q_result);

	echo '<p>A total of '.$rows.' user<br/></p>';

  ?>
        <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-xs-12">
					       <h1>用户列表</h1>

 <div class="table-responsive">
  <table class="table table-hover" >
	<thead>
		<tr>
		<th></th>
		<th>用户名</th>
		<th>性别</th>
		<th>爱好</th>
		<th>学历</th>
		<th>自我介绍</th>
		<th>操作</th>
		</tr>
	</thead>

  <?php
	echo "<tbody>";
	$order = 1;
	while($row = mysql_fetch_assoc($q_result))    //mysql_fetch_assoc();获取关联数组，可用列名作下表；---3：对应3片段；
	{
		//print_r($row);
		echo '<tr>';
		
		/*
		for ($i = 0; $i < count($row); $i++) {
			if ($i != 1)
				echo '<td>'.$row[$i].'</td>';
			
		}
		*/

		/*
		foreach($row as $col_value) {
			echo '<td>'.$col_value.'</td>';
		}
		*/
		echo "<th scope='row'>".$order."</th>";
		echo '<td>'.$row['username'].'</td>';
		echo '<td>'.($row['sex'] == 1 ? '男' : '女').'</td>';
		echo '<td>'.$row['hobby'].'</td>';
		//echo '<td>'.$row['degree'].'</td>';
		switch($row["degree"]) {
			case '1':
				$d = "大学";
				break;
			case '2':
				$d = "硕士";
				break;
			case '3':
				$d = "博士";
				break;
			default: 
				$d = "unkonw";
		
		}
		echo "<td>".$d."</td>";

		echo "<td style='width:30%; hight:100%'><div style='max-width:300px; overflow:scroll;white-space:nowrap'>".$row['intro']."</div></td>";
		
		echo '<td><a href="edit_user_bts.php?username='.$row['username'].'">修改</a> | <a href="delete_user_bts.php?username='.$row['username'].'" onClick="return confirm(\'确定删除吗?\')">删除</a></td>';
		echo '<tr>';
		$order++;
	}
	echo "</tbody>";
    close($link);
  ?>
  </table>
 </div>
                    </div>
                </div>
                <hr />
            </div>
        </div>
       <!--END PAGE CONTENT -->
<?php 
	require_once('template/footer.php');
?>
