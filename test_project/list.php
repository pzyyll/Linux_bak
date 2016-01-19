<?php 
	require_once("db_add.php");

	$sql = "select * from video where type = {$_GET['type']}";
	$row = fetchAll($sql);
?>

<div class="container">

    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">


            <div class="row">


                <div class="col-xs-12 col-lg-12 mlist">

<?php 
	switch($_GET['type']) {
		case '1':
			echo "<h2>电影专栏</h2>";
			break;
		case '2':
			echo "<h2>电视剧专栏</h2>";
			break;
		case '3':
			echo "<h2>动画专栏</h2>";
			break;
		case '4':
			echo "<h2>体育专栏</h2>";
			break;
		case '5':
			echo "<h2>教育教学专栏</h2>";
			break;
		case '6':
			echo "<h2>原创专栏</h2>";
			break;
	}
?>
                    <ul class="list-inline row text-center">
<?php 
	for ($i = 0; $i < count($row); $i++) {
?>
						<li class="col-xs-6 col-lg-3">
                            <img src="admin/images/<?php echo $row[$i]['pic'] ?>" class="responsive img-thumbnail"/>
                            <p><a href="show.php?id=<?php echo $row[$i]['id']?>"><?php echo $row[$i]['name'] ?></a>
                            </p>
                        </li>
<?php 
	}
?>
                    </ul>
                    <nav class="text-center">
                        <ul class="pagination">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>


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
	$sql = "select * from video where type = {$_GET['type']} order by hint desc limit 0,6";
	$rows = fetchAll($sql);

	for($i = 0; $i < count($rows); $i++) {
?>
                    <li class="col-xs-12 col-lg-6">
                        <img src="assets/images/<?php echo $rows[$i]['pic'] ?>" class="responsive img-thumbnail"/>

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