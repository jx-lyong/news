<?php
include 'sess.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户信息修改</title>
	<link rel="stylesheet" href="../lib/css/bootstrap.min.css">
	<script src="../lib/js/bootstrap.min.js"></script>
	<script src="../lib/js/check.js"></script>
	<link rel="stylesheet" href="../css/common.css">

</head>
<body style="padding:5px;">
<ol class="breadcrumb" style="background: #369;color:#fff">
  <li><a href="#" style="color:#fff">首页</a></li>
  <li><a href="#" style="color:#fff">系统管理</a></li>
  <li class="active" style="color:#eee">信息修改</li>
</ol>


<div class="panel panel-default" >
  <div class="panel-heading" style="background: #369;color:#fff">用户信息修改：</div>
  <div class="panel-body">
	
	<form method="post" action="mprec.php" onsubmit = "return check();">
	  <div class="form-group">
	    <label for="username">用户名</label>
	    <input type="text" class="form-control" id="username" name="username" placeholder="请输入新的用户名">
	  </div>

	  <div class="form-group">
	    <label for="pwd">新密码</label>
	    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="请输入新密码">
	  </div>

	  <div class="form-group">
	    <label for="cfm">再次输入新密码</label><span id="msgErr" style="color:#f00;display:inline-block;text-indent: 20px;"></span>
	    <input type="password" class="form-control" id="cfm" name="cfm" placeholder="请再次输入新密码">
	  </div>

	  <button type="submit" class="btn btn-default">修改用户信息</button>
	</form>
	  </div>
	</div>

</body>
</html>