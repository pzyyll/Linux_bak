<?php
	require_once('inc_admin.php');
?>
<?php
	mysql_query("set names utf8");
	$rows = fetchAll("select * from video");
	$totalNum = count($rows);
	echo '<p>A total of '.$totalNum.'<br/></p>';
?>
        <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-xs-12">
					       <h1>LIST OF VIDEO</h1>
 <div class="table-responsive">
  <table class="table table-hover">
	<thead>
		<tr>
		<th>视频名字</th>
		<th>视频类型</th>
		<th>添加时间</th>
		<th>播放次数</th>
		<th>海报</th>
		<th>视频简介</th>
		<th>下载地址</th>
		<th>下载次数</th>
		<th>操作</th>
		</tr>
	</thead>
	 <tbody>
	<?php
		for($i = 0; $i < $totalNum; $i++) {
			echo "<tr>";
			echo "<td>".$rows[$i]["name"]."</td>";
			//echo "<th>".$row["type"]."</th>";
			echo "<td>";
				if(1 == $rows[$i]["type"]) { echo "电影"; }
				else if (2 == $rows[$i]["type"]) { echo "电视剧";}
				else if (3 == $rows[$i]["type"]) { echo "动画";}
				else { echo "未知";}
			echo "</td>";
			
			echo "<td>".$rows[$i]["mtime"]."</td>";
			echo "<td>".$rows[$i]["hint"]."</td>";
			echo "<td><img src='../assets/images/{$rows[$i]['pic']}' alt='{$rows[$i]['name']}' class='img-rounded img-responsive' style='width: 140px; height: 140px;'></td>";
			echo "<td style='width:30%'><div style='max-width:300px; overflow:scroll;white-space:nowrap'>".$rows[$i]["intro"]."</div></td>";
			//echo "<th>".$row["addr"]."</th>";
			echo "<td><a href='{$rows[$i]['addr']}'>点我</a></td>";
			echo "<td>".$rows[$i]["download"]."</td>";

			echo "<td><a href='edit_video_bts.php?id={$rows[$i]['id']}'>修改</a> | <a href='delete_video_bts.php?id={$rows[$i]['id']}' onClick='return confirm(\"确定删除吗？\")'>删除</a></td>";
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
require_once('template/footer.php');
?>












