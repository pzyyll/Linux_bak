<!-- index.php -->
<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Off Canvas Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/offcanvas.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>
    <script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">智立影视</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">首页</a></li>
                <li><a href="list.php?type=1">电影</a></li>
                <li><a href="list.php?type=2">电视剧</a></li>
                <li><a href="list.php?type=3">动画</a></li>
                <li><a href="list.php?type=4">体育</a></li>
                <li><a href="list.php?type=5">教育教学</a></li>
                <li><a href="list.php?type=6">原创</a></li>
				 <form method=post action="search.php" class="navbar-form navbar-left" role="search">
					 <div class="form-group">
						<input type="text" class="form-control" placeholder="Search" name="searchName">
					 </div>
					 <button type="submit" class="btn btn-default">Submit</button>
				 </form>
            </ul>
<?php 
	if( isset($_SESSION['username']) && $_SESSION['isLogin'] == 1) {
?>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#"><?php echo $_SESSION['username']; ?></a></li>
				<li><a href="user_logout_bts.php">退出</a></li>
			</ul>
<?php 
	} else {
?>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="user_login_bts.html">登录</a></li>
				<li><a href="../test_project/reg_user_bts.html">注册</a></li>
			</ul>
<?php
	}
?>
        </div>
        <!-- /.nav-collapse -->
    </div>
    <!-- /.container -->
</nav>
<!-- /.navbar -->
