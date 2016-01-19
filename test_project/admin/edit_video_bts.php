<?php
	require_once('inc_admin.php');
	$id = $_GET["id"];
	$row = fetchOne("select * from video where id = {$id}");
	//print_r($row);
?>
        <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-xs-12">
					       <h1>EDIT_VIDEO</h1>
 	<div class="container">
	   <form method=post action="update_video_bts.php" class="form-horizontal" enctype="multipart/form-data">
		  <div class="form-group">
			<label for="inputName" class="col-sm-2 control-label">视频名字:</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" id="inputName" name="video_name" value="<?php echo $row['name']?>">
			</div>
		  </div>
		  <div class="form-group">
			<label for="videoType" class="col-sm-2 control-label">视频类型:</label>
			<div class="col-sm-10">
			  		<select class="form-control" name="video_type" id="videoType">
						<option>--请选择--</option>
						<option value="1" <?php if(1 == $row['type']) echo "selected"; ?> >电影</option>
						<option value="2" <?php if(2 == $row['type']) echo "selected"; ?> >电视剧</option>
						<option value="3" <?php if(3 == $row['type']) echo "selected"; ?> >动画</option>
					</select>
			</div>
		  </div>

		  <div class="form-group">
			<label class="col-sm-2 control-label">海报:</label>
			<div class="col-sm-10">
			  <input type="file" name="photo">
			</div>
		  </div>

		  <div class="form-group">
			<label class="col-sm-2 control-label">简介:</label>
			<div class="col-sm-10">
			  <textarea class="form-control" rows="3" name="intro"><?php echo $row['intro']; ?></textarea>
			</div>
		  </div>

		  <div class="form-group">
			<label class="col-sm-2 control-label">下载地址:</label>
			<div class="col-sm-10">
			  <input type="text" name="addr" class="form-control" value="<?php echo $row['addr']; ?>" >
			</div>
		  </div>

			<div class="form-group">
				 <div class="col-sm-10 col-sm-offset-2">
					<input class="btn btn-info" type="submit" name="submit" value="更新">
					<input class="btn btn-info" type="reset" name="reset" value="重置">
				 </div>
			</div>
	   </form>
	</div>                               

                    </div>
                </div>
                <hr />
            </div>
        </div>
       <!--END PAGE CONTENT -->
<?php 
	session_start();
	$_SESSION['id'] = $row['id'];
	require_once('template/footer.php');
?>












