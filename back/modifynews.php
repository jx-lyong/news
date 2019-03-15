<?php
include 'sess.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>编辑新闻</title>
	<link rel="stylesheet" href="../lib/css/bootstrap.min.css">
	<script src="../lib/js/bootstrap.min.js"></script>
	<script src="../lib/js/check.js"></script>
</head>
<body style="padding:5px;">
<ol class="breadcrumb" style="background: #369;color:#fff">
  <li><a href="#" style="color:#fff">首页</a></li>
  <li><a href="#" style="color:#fff">新闻管理</a></li>
  <li class="active" style="color:#eee">编辑新闻</li>
</ol>
<?php
include 'conf.php';
include 'inc.php';
	//定义每页记录数
	$pageSize = 18;
	//定义当前页
	if(isset($_GET['page'])){
		if($_GET['page'] < 1){
			$page = 1;
		}else{
			$page = intval($_GET['page']);
		}
		
	}else{
		$page = 1;
	}
	connect($host,$user,$pwd,$db,$code);
	$sql = "select * from content";
	//获取总记录数
	$totalNum = returnTotal($sql);
	//总页数
	$totalPage = ceil($totalNum/$pageSize);
	//定义偏移量
	//$totalPage = 3
	//
	if($page > $totalPage){
		$page = $totalPage;
	}
	$offSet = ($page-1)*$pageSize;
	//构造查询语句
	$pageSQL = "select * from content order by id desc limit $offSet,$pageSize";
	$rows= fetchAll($pageSQL);
	?>

<table class="table table-bordered table-hover">
    <tr>
        <th>新闻编号</th>
        <th>新闻标题</th>
        <th>新闻来源</th>
        <th>新闻分类</th>
        <th>添加时间</th>
        <th>新闻操作</th>
    </tr>
    <?php
        date_default_timezone_set('PRC');
        foreach ($rows as $row){
    ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['title'];?></td>
            <td><?php echo $row['source'];?></td>
						<td>
							<?php 
									$mid = $row['mid'];
									$sql="select name from menu where id=$mid";
									$name = fetchOne($sql);
									echo $name['name'];
							?>
						</td>
            <td><?php echo date('Y-m-d H:i:s',$row['cdate']);?></td>
            <td><button class="btn btn-info btn-xs" onclick="edit(<?php echo $row['id'];?>,2)">修改</button> <button class="btn btn-info btn-xs" onclick="del(<?php echo $row['id'];?>,2)">删除</button></td>
        </tr>
    <?php
    }
    ?>
		<tr align="center">
			<td colspan="6" align="center">
				<?php
					if($totalNum > $pageSize){
						echo "<a href='?page=1' >首页</a>&nbsp;";
						if($page <= 1){
							echo "上一页&nbsp;";
						}else{
							echo "<a href=?page=".($page-1)." >上一页</a>&nbsp;";
						}
						
						if($page < $totalPage){
							echo "<a href=?page=".($page+1)." >下一页</a>&nbsp;";
						}else{
							echo "下一页&nbsp;";
						}
						echo "<a href=?page=".$totalPage." >末页</a>&nbsp;";
					}
				?>
			</td>
		</tr>
</table>

</body>
</html>