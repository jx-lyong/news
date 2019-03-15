<?php
include 'sess.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>系统配置信息的设置</title>
	<link rel="stylesheet" href="../lib/css/bootstrap.min.css">
	<script src="../lib/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/common.css">
</head>
<body style="padding:5px;">
<ol class="breadcrumb" style="background: #369;color:#fff">
  <li><a href="#" style="color:#fff">首页</a></li>
  <li><a href="#" style="color:#fff">系统管理</a></li>
  <li class="active" style="color:#eee">系统配置</li>
</ol>


<div class="panel panel-default" >
  <div class="panel-heading" style="background: #369;color:#fff">系统配置信息设置：</div>
  <div class="panel-body">
	<?php
	include 'conf.php';
	include 'inc.php';
	connect($host,$user,$pwd,$db,$code);
	$sql ="select * from config";
	$row = fetchOne($sql);
	?>

	<form method="post" action="system.php">
	  <div class="form-group">
	    <label for="sysname">系统名称</label>
	    <input type="text" class="form-control" id="sysname" name="sysname" placeholder="系统名称" value="<?php echo $row['sysname'];?>">
	  </div>

	  <div class="form-group">
	    <label for="keyword">关键字</label>
	    <input type="text" class="form-control" id="keyword" name="keyword" placeholder="系统关键字" value="<?php echo $row['keyword'];?>">
	  </div>

	  <div class="form-group">
	    <label for="dsc">系统描述</label>
	    <textarea name="dsc" rows="5" class="form-control" placeholder="系统描述"><?php echo $row['dsc'];?></textarea>
	  </div>

	  <div class="form-group">
	    <label for="address">地址</label>
	    <input type="text" class="form-control" id="address" name="address" placeholder="地址" value="<?php echo $row['address'];?>">
	  </div>

	  <div class="form-group">
	    <label for="copy">版权</label>
	    <input type="text" class="form-control" id="copy" name="copy" placeholder="版权信息" value="<?php echo $row['copy'];?>">
	  </div>

	  <div class="form-group">
	    <label for="tel">电话号码</label>
	    <input type="text" class="form-control" id="tel" name="tel" placeholder="电话号码" value="<?php echo $row['tel'];?>">
	  </div>

	  <div class="form-group">
	    <label for="author">设计者</label>
	    <input type="text" class="form-control" id="author" name="author" placeholder="设计者" value="<?php echo $row['author'];?>">
	  </div>
	  
	  <button type="submit" class="btn btn-default">修改信息</button>
	</form>
	  </div>
	</div>

</body>
</html>