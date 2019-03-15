<?php include 'header.php' ?>
	  <!-- 面包屑导航 -->
				<ol class="breadcrumb" style="margin:15px 0px">
				  <li><a href="index.php">首页</a></li>
				  <li><?php 
				  $mid = $_GET["mid"];
				  $sqlC = "select name from menu where id=$mid";
				  $resultC = fetchOne($sqlC);
				  echo $resultC["name"];

				   ?></li>
				</ol>
	  
	  <!-- 详细新闻内容 -->
	  	<div class="row" style="margin-top:15px">
			<div class="col-md-4">
				<div class="panel panel-info">
				  <div class="panel-heading">
				    <h3 class="panel-title">热点新闻</h3>
				  </div>
				  <div class="panel-body detail">
				    <ul>
				    <?php 
				    $sqlH = "select * from content order by hit desc limit 10";
				    $h = fetchAll($sqlH);
				    foreach($h as $v){
				    ?>
						<li><a href="detail.php?id=<?php echo $v["id"]?>&mid=<?php echo $v["mid"]?>"><?php echo mb_substr($v["title"],0,20)?></a> <span class="badge" style="background-color: orange;"><?php echo $v['hit']?></span></li>
					<?php
					}
					?>	
				    </ul>
				  </div>
				</div>
			</div>
  			<div class="col-md-8">
				<div class="panel panel-default"> 
				  <div class="panel-body">
				  <?php
				  $id = $_GET["id"];
				  //修改该新闻的点击次数
				  $sqlU = "update content set hit=hit+1 where id = $id";
				  edit($sqlU);
				  $sql = "select * from content as c,ncontent as n where c.id = n.tid and id = $id";
				  $cOne = fetchOne($sql);
				  ?>
				  		<h2 align="center"><?php echo $cOne["title"]?> </h2>
				  		<p align="center"><span>编辑:<?php echo $cOne["source"]?></span> <span>时间:<?php echo date("Y-m-d H:i:s",$cOne["cdate"])?></span> <span>点击次数:<?php echo $cOne["hit"]?></span></p>
				  		<?php echo $cOne["content"]?>
				  		
				  </div>
				</div>
				<!-- 发表评论start -->
			<div class="panel panel-info">
				<div class="panel-heading">发表评论</div>
				<div class="panel-body">
					  <?php
					  if(isset($_POST["submit"])){
					  	$username = $_POST["username"];
					  	$content = $_POST["content"];
					  	$fid = $_POST["fid"];
					  	$cdate = time();
					  	$sqlM = "insert into msg(username,content,fid,cdate) values('$username','$content',$fid,$cdate)";
					  	$result = add($sqlM);
					  	if($result){
					  		printText("发表评论完成","detail.php?id=$id&mid=$mid");
					  	}
					  }
					  ?>

					<form class="form-horizontal" method="post" onsubmit="return submits();" action="">
					  <div class="form-group">
					    <label for="username" class="col-sm-2 control-label">用户</label>
					    <div class="col-sm-10">
					    <input type="hidden" name="fid" value="<?php echo $cOne["id"];?>">
					      <input type="text" class="form-control" id="username" name="username" placeholder="请输入用户名">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="content" class="col-sm-2 control-label">内容</label>
					    <div class="col-sm-10">
					      <textarea name="content" id="content" class="form-control" rows="6" placeholder="请输入评论内容"></textarea>
					    </div>
					  </div>
					  
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" name="submit" id="submit" class="btn btn-default">发表评论</button>

					      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">显示评论</button>
					    </div>
					  </div>
					</form> 

				</div>
			</div>
			<!-- 发表评论end -->
			<!-- 显示评论start -->
			<!-- Button trigger modal -->
				

				<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">显示评论</h4>
				      </div>
				      <div class="modal-body">
				        <?php
				        $sqlS = "select * from msg where tp=0 and fid = $id";
				        $resultS = fetchAll($sqlS);
				        foreach($resultS as $s){
				        ?>
				        <table class="table">
							<tr>
								<td>评论人:</td>
								<td><?php echo $s["username"]?></td>
								<td>时间:</td>
								<td><?php echo date("Y-m-d H:i:s",$s["cdate"])?></td>
							</tr>
							<tr>
								<td>评论内容:</td>
								<td colspan="3"><?php echo $s["content"]?></td>
							</tr>
				        </table>
				        <?php
				        }
				        ?>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
				      </div>
				    </div>
				  </div>
				</div>
			<!-- 显示评论end -->
  			</div>
	  	</div>
<?php include 'footer.php'?>
<script>
	function submits(){
		var userName=document.getElementById('username').value;
		var con=document.getElementById('content').value;
		var btn=document.getElementById('submit');
			if(username=="" || con=="")
			{
				alert("用户名或内容不能为空！")
				return false;
			}else{
				return true;
			}
	}
</script>