<?php 
	require_once("db_add.php");
?>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="assets/images/img4.jpg" class="img-responsive" alt="Apple iPhone 5S">

            <div class="carousel-caption">
                <h3>Apple iPhone 5S</h3>

            </div>
        </div>
        <div class="item">
            <img src="assets/images/img2.jpg" class="img-responsive" alt="Samsung Galaxy Note 3">

            <div class="carousel-caption">
                <h3>Samsung Galaxy Note 3</h3>

            </div>
        </div>
        <div class="item">
            <img src="assets/images/img3.jpg" class="img-responsive" alt="Apple iPhone 5S">

            <div class="carousel-caption">
                <h3>Sony Xperia Z1</h3>

            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>

<div class="container">

    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">


            <div class="row text-center">
                <div class="col-xs-12 col-lg-12 mlist">
                    <h2>最新上架</h2>
					<?php 
						$sql = "select * from video order by mtime desc limit 0,6";
						$rows = fetchAll($sql);

					?>
                    <ul class="list-inline row text-center">
					<?php 
						for($i = 0; $i < count($rows); $i++) {
					?>
                        <li class="col-xs-4 col-sm-3 col-lg-2">
                            <img src="assets/images/<?php echo $rows[$i]['pic']; ?>" class="responsive img-thumbnail" />
                            <p><a href="show.php?id=<?php echo $rows[$i]['id']; ?>"><?php echo $rows[$i]['name']; ?></a>
                            </p>
                        </li>
					<?php 
						}
					?>

                    </ul>
                    <p><a class="btn btn-default" href="list.html" role="button">View details &raquo;</a></p>
                </div>
                <!--/.col-xs-6.col-lg-4-->

            </div>
            <!--/row-->
        </div>
        <!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
            <div class="list-group">
                <h2>点击排行</h2>
                <ul class="list-inline row text-center">
<?php 
	$sql_hint = "select * from video order by hint desc limit 0,5";
	$row_hint = fetchAll($sql_hint);
	for ($i = 0; $i < count($row_hint); $i++) {
?>
                    <li class="col-xs-12 col-lg-6">
                        <img src="assets/images/<?php echo $row_hint[$i]['pic']; ?>" class="responsive img-thumbnail"/>

                        <p><a href="show.php?id=<?php echo $row_hint[$i]['id']; ?>"><?php echo $row_hint[$i]['name']; ?></a>
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