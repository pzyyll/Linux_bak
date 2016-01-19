<?php 
	require_once("db_add.php");
	
	$sql = "select * from video where id = {$_GET['id']}";
	$row = fetchOne($sql);
	$array["hint"] = $row["hint"] + 1;
	update($array,"video", "id = {$_GET['id']}");
	
?>


<div class="container">

    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">


            <div class="row box">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item">
                                <img class="img-responsive img-full" src="admin/images/<?php echo $row['pic']; ?>" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="admin/images/<?php echo $row['pic']; ?>" alt="">
                            </div>
                            <div class="item active">
                                <img class="img-responsive img-full" src="admin/images/<?php echo $row['pic']; ?>" alt="">
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>

                    <h1 class="brand-name"><?php echo $row['name'] ?></h1>

                </div>


            </div>
            <!--/row-->
            <div class="row box">

                <div class="col-lg-12">
                    <h2 class="intro-text text-center">内容简介
                    </h2>
					<h4>发表于 <?php echo $row['mtime']; ?></h4>
						<br />
					<p><?php echo $row['intro']; ?></p>

					<div class="page-header">
					  <h4>下载地址</h4>
					</div>
					<p><a href="<?php echo $row["addr"]; ?>">本地下载</a></p>
                </div>
            </div>
			<!-- editor -->
			<div class="row box">
                <div class="col-lg-12">
					<div class="page-header">
					  <h1>发布评论</h1>
					</div>
<?php 
	$commentSql = "select * from message where movie_id = {$_GET['id']} order by time asc limit 0,10";
	$commentArray = fetchAll($commentSql);

	if($commentArray != 0) {
		for($i = 0; $i < count($commentArray); $i++) {
?>
						<div class="media">
						  <div class="media-left">
							<a href="#">
							  <img class="media-object img-circle" src="assets\images\comment.png" alt="38x38" style="width: 84px; height: 84px;">
							</a>
							<p><?php echo $commentArray[$i]['name']; ?></p>
							<p>发表于</p>
							<p><?php echo $commentArray[$i]['time']; ?></p>
						  </div>
						  <div class="media-body">
							<h3 class="media-heading"><?php echo $commentArray[$i]['title']; ?></h3>
							<p><?php echo $commentArray[$i]['comment']; ?></p>
						  </div>
						</div>
<?php
		}
	} else {
		echo "还没有人评论哦~赶快来吐曹吧~~~<br/><br/>";
	}
?>
				<form method=post action="add_message.php" class="form-horizontal">
					 <header>
<!--
						<div class="form-group">
							<label for="InputName">姓名</label>
							<input type="text" class="form-control" id="InputName" placeholder="Enter name" name="name">
						</div>
						<div class="form-group">
							<label for="InputEmail1">邮箱</label>
							<input type="email" class="form-control" id="InputEmail1" placeholder="Enter email" name="email">
						</div>
-->
						<div class="form-group">
							<label for="title">标题</label>
							<input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
						</div>
                   </header>
				   <div class="form-group">
                      <textarea class="form-control" rows="5" name="comment" id="input" placeholder="Comment"></textarea>
					  <button type="submit" class="btn btn-info" name="submit">发布</button>
					</div>
					<input type="hidden" name="movie_id" value="<?php echo $_GET['id']; ?>">
                </form>
				</div>
            </div>
			<!-- editor_end -->

        </div>
        <!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
            <div class="list-group">
                <h2>点击排行</h2>
                <ul class="list-inline row text-center">
<?php 
	$sql = "select * from video where type = {$row['type']} order by hint desc limit 0,6";
	$rows = fetchAll($sql);

	for($i = 0; $i < count($rows); $i++) {
?>
                    <li class="col-xs-12 col-lg-6">
                        <img src="assets/images/<?php echo $rows[$i]['pic']; ?>" class="responsive img-thumbnail"/>
                        <p><a href="show.php?id=<?php echo $rows[$i]['id']; ?>"><?php echo $rows[$i]['name']; ?></a>
                        </p>
                    </li>
<?php 
	}
?>
                </ul>
            </div>

        </div>
        <!--/.sidebar-offcanvas-->
    </div>
    <!--/row-->

    <hr>

    <footer>
        <p>&copy; Company 2014</p>
    </footer>

</div>
<!--/.container-->


<?php 
	close($link);
	require_once("./assets/tmp/footer.php");
?>