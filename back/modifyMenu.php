<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>编辑菜单</title>
	<link rel="stylesheet" href="../lib/css/bootstrap.min.css">
	<script src="../lib/js/bootstrap.min.js"></script>
	<script src="../lib/js/check.js"></script>
</head>
<body style="padding:5px;">
<ol class="breadcrumb" style="background: #369;color:#fff">
  <li><a href="#" style="color:#fff">首页</a></li>
  <li><a href="#" style="color:#fff">菜单管理</a></li>
  <li class="active" style="color:#eee">编辑菜单</li>
</ol>

<table class="table table-bordered table-hover">
    <tr>
        <th>菜单编号</th>
        <th>菜单名称</th>
        <th>菜单描述</th>
        <th>添加时间</th>
        <th>操作</th>
    </tr>
    <?php
        include 'conf.php';
        include 'inc.php';
        date_default_timezone_set('PRC');
        connect($host,$user,$pwd,$db,$code);
        $sql="select * from menu";
        $rows=fetchAll($sql);
        foreach ($rows as $row){
    ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['dsc'];?></td>
            <td><?php echo date('Y-m-d H:i:s',$row['mdate']);?></td>
            <td><button class="btn btn-info btn-xs" onclick="edit(<?php echo $row['id'];?>)">修改</button> <button class="btn btn-info btn-xs" onclick="del(<?php echo $row['id'];?>)">删除</button></td>
        </tr>
    <?php
    }
    ?>
</table>

</body>
</html>