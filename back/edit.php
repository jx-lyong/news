<?php
include 'conf.php';
include 'inc.php';
$id=$_GET['id'];
date_default_timezone_set('PRC');
connect($host,$user,$pwd,$db,$code);
$sql="select * from menu where id=$id";
$row=fetchOne($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改菜单</title>
	<link rel="stylesheet" href="../lib/css/bootstrap.min.css">
	<script src="../lib/js/bootstrap.min.js"></script>
</head>
<body style="padding:5px;">
<ol class="breadcrumb" style="background: #369;color:#fff">
  <li><a href="#" style="color:#fff">首页</a></li>
  <li><a href="#" style="color:#fff">菜单管理</a></li>
  <li class="active" style="color:#eee">修改菜单</li>
</ol>

<form method="post" action="modifyMenu-1.php">
    <table class="table table-bordered table-hover">
        <tr>
            <input type="hidden" id="id" name="id" value="<?php echo $row['id'];?>">
        </tr>
        <tr>
            <td>
                <label for="name">菜单名称</label>
                <input type="text" class="form-control" id="name" name="menuname" placeholder="输入菜单名称" value="<?php echo $row['name'];?>">
            </td>
        </tr>
        <tr>
            <td>
                <label for="ms">菜单描述</label>
                <input type="text" class="form-control" id="ms" name="ms" placeholder="输入菜单描述" value="<?php echo $row['dsc'];?>">
            </td>
        </tr>
        <tr>
            <td><button type="submit" class="btn btn-info">保存修改</button></td>
        </tr>
    </table>
</form>
</body>
</html>