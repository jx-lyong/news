<?php
include 'sess.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加菜单</title>
	<link rel="stylesheet" href="../lib/css/bootstrap.min.css">
	<script src="../lib/js/bootstrap.min.js"></script>

</head>
<body style="padding:5px;">
<ol class="breadcrumb" style="background: #369;color:#fff">
  <li><a href="#" style="color:#fff">首页</a></li>
  <li><a href="#" style="color:#fff">菜单管理</a></li>
  <li class="active" style="color:#eee">添加菜单</li>
</ol>

<div class="panel panel-default">
  <div class="panel-heading" style="background: #369;color:#fff">添加菜单：</div>
  <div class="panel-body">
	
	<form method="post" action="mrec.php">
	  <div class="form-group">
	    <label for="name">菜单名称</label>
	    <input type="text" class="form-control" id="name" name="name" placeholder="请输入菜单名称">
	  </div>

	  <div class="form-group">
	    <label for="dsc">菜单描述</label>
	    <input type="text" class="form-control" id="dsc" name="dsc" placeholder="请输入菜单描述">
	  </div>

	  <button type="submit" class="btn btn-default">添加菜单</button>
	</form>
	  </div>
	</div>

</body>
</html>