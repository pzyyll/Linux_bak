<?php
	require_once('inc_admin.php');

	$sql = "select * from message";
	$rows = fetchAll($sql);

?>
        <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-xs-12">
					       <h1>用户评论</h1>
 <div class="table-responsive">
  <table class="table table-hover" >
	<thead>
		<tr>
		<th></th>
		<th>姓名</th>
		<th>邮箱</th>
		<th>视频名字</th>
		<th>评论标题</th>
		<th>评论内容</th>
		<th>评论时间</th>
		<th>操作</th>
		</tr>
	</thead>
	<tbody>
  <?php
	for($i = 0; $i < count($rows); $i++) {
		echo "<tr>";
		echo "<th scope='row'>".($i+1)."</th>";
		echo "<td>{$rows[$i]['name']}</td>";
		echo "<td>{$rows[$i]['email']}</td>";
		$movieName = fetchOne("select name from video where id = {$rows[$i]['movie_id']}");
		echo "<td>{$movieName['name']}</td>";
		echo "<td>{$rows[$i]['title']}</td>";
		echo "<td style='width:30%'>{$rows[$i]['comment']}</td>";
		echo "<td>{$rows[$i]['time']}</td>";
		echo "<td><a href=\"delete_comment.php?id={$rows[$i]['id']}\" onClick=\"return confirm('确定删除吗?')\">删除</a></td>";
		echo "</tr>";
	}
  ?>
	</tbody>
  </table>
 </div>					   

                    </div>
                </div>
                <hr />
            </div>
        </div>
       <!--END PAGE CONTENT -->
<?php 
	close($link);
	require_once('template/footer.php');
?>