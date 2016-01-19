<?php 
	require_once("./assets/tmp/top.php");
	require_once('./system/db/mysql.func.php');
	require_once('./system/db/config.php');

	$link = connect();

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
					<p><?php echo $row['intro']; ?></p>

                </div>
            </div>
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
	require_once("./assets/tmp/footer.php");
?>