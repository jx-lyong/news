<?php include 'header.php';?>
	  <!-- 面包屑导航 -->
				<ol class="breadcrumb" style="margin:15px 0px">
				  <li><a href="index.php">首页</a></li>
				  <li><?php echo $_GET['name'];?></li>
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
									$sqlH="select * from content order by hit desc limit 10";
									$h=fetchAll($sqlH);
									foreach($h as $v){
								?>
								<li><a href="detail.php?id=<?php echo $v['id']?>&mid=<?php echo $v['mid']?>"><?php echo mb_substr($v['title'],0,20);?></a> <span class="label label-danger"><?php echo $v['hit'];?></span></li>
								<?php
									}
									?>
				    </ul>
				  </div>
				</div>
			</div>
  			<div class="col-md-8">
				<div class="panel panel-default"> 
                    <div class="panel-heading">
				        <h3 class="panel-title"><?php echo $_GET['name'];?></h3>
				    </div>
				    <div class="panel-body detail">
								<ul>
										<?php
											$id=$_GET['id'];
											$sql="select * from content where mid=$id";
											$content=fetchAll($sql);
											if($content!=array()){
											foreach($content as $c){
										?>
											<li class="col-md-12"><a href="detail.php?id=<?php echo $c['id']?>&mid=<?php echo $v['mid']?>"><?php echo $c['title']?></a></li>
										<?php
										}
									}else{
										echo "没有可以显示的新闻！";
									}
										?>
								</ul>
				    </div>
				</div>
  			</div>
	  	</div>
		<?php include 'footer.php';?>