<?php
include './back/conf.php';
include './back/inc.php';
date_default_timezone_set('PRC');
connect($host,$user,$pwd,$db,$code);
$sql="select * from config";
$config=fetchOne($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $config['sysname'] ?>首页</title>
	<meta name="keyword" content="<?php echo $config['keyword'];?>">
	<meta name="description" content="<?php echo $config['dsc'];?>">
	<link rel="stylesheet" href="lib/css/bootstrap.min.css">
	<script src="lib/js/jquery-3.3.1.min.js"></script>
	<script src="lib/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/common.css">
</head>
<body>
<div class="container">
		<!-- header -->
	  <div class="row">
	    	<div class="col-md-6">
				<h1>新闻发布系统</h1>
	    	</div>
  			<div class="col-md-6">
				<form class="navbar-form navbar-right" role="search">
				  <div class="form-group">
				    <input type="text" class="form-control" placeholder="Search">
				  </div>
				  <button type="submit" class="btn btn-default">搜索</button>
				</form>
  			</div>
	  </div>
	  <!-- nav-->
	  <div class="row">
	  	<nav class="navbar navbar-inverse">
	  		<ul>
						<li><a href="index.php">首页</a></li>
						<?php
									$sql="select * from menu";
									$rows=fetchAll($sql);
									foreach($rows as $row){
						?>
						<li><a href="menu.php?id=<?php echo $row['id']?>&name=<?php echo $row['name']?>"><?php echo $row['name'];?></a></li>
						<?php
						}
						?>
	  		</ul>
	  	</nav>
	  </div>
	  <!-- banner -->
	  <div class="row">
	  	<img src="img/2.jpg" alt="2" class="img-thumbnail">
	  </div>