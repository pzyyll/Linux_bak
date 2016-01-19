<?php
	require_once('inc_admin.php');
?>
		 <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-xs-12">
					       <h1>VIDEO_ADD</h1>
	<div class="container">
	   <form method=post action="add_video_bts.php" class="form-horizontal" enctype="multipart/form-data">
		  <div class="form-group">
			<label for="inputName" class="col-sm-2 control-label">视频名字:</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" id="inputName" name="video_name" >
			</div>
		  </div>
		  <div class="form-group">
			<label for="videoType" class="col-sm-2 control-label">视频类型:</label>
			<div class="col-sm-10">
			  		<select class="form-control" name="video_type" id="videoType">
						<option>--请选择--</option>
						<option value="1" selected>电影</option>
						<option value="2" >电视剧</option>
						<option value="3" >动画</option>
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
			  <textarea class="form-control" rows="3" name="intro"></textarea>
			</div>
		  </div>

		  <div class="form-group">
			<label class="col-sm-2 control-label">下载地址:</label>
			<div class="col-sm-10">
			  <input type="text" name="addr" class="form-control">
			</div>
		  </div>

			<div class="form-group">
				 <div class="col-sm-10 col-sm-offset-2">
					<input class="btn btn-info" type="submit" name="submit" value="添加">
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
	require_once('template/footer.php');
?>
