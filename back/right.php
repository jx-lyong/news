<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>显示欢迎信息</title>
	<link rel="stylesheet" href="../lib/css/bootstrap.min.css">
	<script src="../lib/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/common.css">
</head>
<body style="padding:5px;">
<ol class="breadcrumb" style="background: #369;color:#fff">
  <li><a href="#" style="color:#fff">首页</a></li>
  <li class="active" style="color:#eee">后台管理</li>
</ol>
<div class="panel panel-default" >
  <div class="panel-heading" style="background: #369;color:#fff">服务器信息显示：</div>
  <div class="panel-body">
	<table class="table table-hover table-bordered" style="text-align:center;">
		<tr>
			<td>服务器:</td>
			<td><?php echo $_SERVER['SERVER_NAME']?></td>
			<td>服务器端口:</td>
			<td><?php echo $_SERVER['SERVER_PORT']?></td>
			<td>客户端地址:</td>
			<td><?php echo $_SERVER['REMOTE_ADDR']?></td>
		</tr>
		
		<tr>
			<td>服务器根目录:</td>
			<td><?php echo $_SERVER['DOCUMENT_ROOT']?></td>
			<td>数据请求方式:</td>
			<td><?php echo $_SERVER['REQUEST_METHOD']?></td>
			<td>文件地址:</td>
			<td><?php echo $_SERVER['PHP_SELF']?></td>
		</tr>
		<tr>
			<td>浏览器:</td>
			<td><?php echo substr($_SERVER['HTTP_USER_AGENT'],0,12)?></td>
			<td>请求协议:</td>
			<td><?php echo $_SERVER['SERVER_PROTOCOL']?></td>
			<td>时间:</td>
			<td><?php echo date("Y-m-d H:i:s",$_SERVER['REQUEST_TIME'])?></td>
		</tr>
	</table>
  </div>
</div>

<?php
	include 'conf.php';
	include 'inc.php';
	connect($host,$user,$pwd,$db,$code);
	$sql ="select * from config";
	$row = fetchOne($sql);
?>
<div class="panel panel-default">
  <div class="panel-heading" style="background: #369;color:#fff">新闻发布系统信息显示：</div>
  <div class="panel-body">
	<table class="table table-hover table-bordered" style="text-align:center;">
		<tr>
			<td>系统名称:</td>
			<td><?php echo $row['sysname'];?></td>
			<td>关键字:</td>
			<td><?php echo mb_substr($row['keyword'],0,15)."...";?></td>
			<td>描述:</td>
			<td><?php echo mb_substr($row['dsc'],0,15)."...";?></td>
		</tr>
		<tr>
			<td>地址:</td>
			<td><?php echo $row['address'];?></td>
			<td>版权:</td>
			<td><?php echo $row['copy'];?></td>
			<td>电话:</td>
			<td><?php echo $row['tel'];?></td>
		</tr>
		<tr>
			<td>设计:</td>
			<td><?php echo $row['author'];?></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</table>
  </div>
</div>
</body>
</html>