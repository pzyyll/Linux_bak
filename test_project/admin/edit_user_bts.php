<?php
	require_once('inc_admin.php');
?>
        <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-xs-12">
					       <h1>EDIT USER</h1>
  <?php
	$username = $_GET['username'];

	$sql = "select * from user where username = '".$username."'";
	//echo $sql.'</br>';
	$result = mysql_query($sql);
	$row = mysql_fetch_assoc($result);

  ?>

  <div class="container">
	<form method=post action="update_user_bts.php" class="form-horizontal">
	  <div class="form-group">
		<label for="inputText" class="col-sm-2 control-label">姓名:</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" value="<?php echo $username; ?>" id="inputText" name="username" readonly = "readonly">
		</div>
	  </div>

	<div class="form-group">
		<label class="col-sm-2 control-label">性别:</label>
		<div class="col-sm-10" >
			<label class="radio-inline" >
			  <input type="radio" name="sex" id="inlineRadio1" value="1" <?php
			  if($row['sex'] == 1) echo 'checked' ?> > 男
			</label>
			<label class="radio-inline">
			  <input type="radio" name="sex" id="inlineRadio2" value="0" <?php
			  if($row['sex'] == 0) echo 'checked' ?>> 女
			</label>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-2 control-label">爱好:</label>
		<div class="col-sm-10" >
		<label class="checkbox-inline">
		  <input type="checkbox" id="inlineCheckbox1" name="hobby[]" value="旅游" <?php if(strstr($row['hobby'],"旅游")) echo "checked"; ?>> 旅游
		</label>
		<label class="checkbox-inline">
		  <input type="checkbox" id="inlineCheckbox1" name="hobby[]" value="登山" <?php if(strstr($row['hobby'],"登山")) echo "checked"; ?>> 登山
		</label>
		<label class="checkbox-inline">
		  <input type="checkbox" id="inlineCheckbox1" name="hobby[]" value="健身" <?php if(strstr($row['hobby'],"健身")) echo "checked"; ?>> 健身
		</label>	
		<label class="checkbox-inline">
		  <input type="checkbox" id="inlineCheckbox1" name="hobby[]" value="上网" <?php if(strstr($row['hobby'],"上网")) echo "checked"; ?>> 上网
		</label>	
		<label class="checkbox-inline">
		  <input type="checkbox" id="inlineCheckbox1" name="hobby[]" value="游泳" <?php if(strstr($row['hobby'],"游泳")) echo "checked"; ?>> 游泳
		</label>	
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">学历:</label>
		<div class="col-sm-10">
		  <select class="form-control" name="degree">
			<option>--请选择--</option>
			<option value = "1" <?php if($row['degree'] == 1) { echo "selected"; } ?> >大学</option>
			<option value = "2" <?php if($row['degree'] == 2) { echo "selected"; } ?>>硕士</option>
			<option value = "3" <?php if($row['degree'] == 3) { echo "selected"; } ?>>博士</option>
		  </select>
		</div>
	</div>

	  <div class="form-group">
		<label for="Text" class="col-sm-2 control-label">自我介绍:</label>
		<div class="col-sm-10">
		  <textarea class="form-control" name="intro" rows="5"><?php echo $row['intro']; ?></textarea>
		</div>
	  </div>
	  <div class="form-group">
		  <div class="col-sm-10 col-sm-offset-2">
				<input class="btn btn-info" type="submit" value="更新">
				<input class="btn btn-info" type="reset" value="重置">
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












