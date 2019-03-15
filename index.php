<?php include 'header.php';?>
	  <!-- news -->
	  <div class="row" style="margin:10px 0px;">
	  	<div class="col-md-4" style="padding:0px;">
			<div class="panel panel-info" >
			  <div class="panel-heading">
			    <h3 class="panel-title"><span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span>财经频道</h3>
			  </div>
			  <div class="panel-body gs1">
			    <ul>
						<?php
							$sql="select * from content where mid=5 order by cdate desc limit 10";
							$m=fetchAll($sql);
							foreach($m as $v){
						?>
			    	<li><a href="detail.php?id=<?php echo $v['id']?>&mid=<?php echo $v['mid']?>"><?php echo mb_substr($v['title'],0,20)?></a></li>
						<?php
						}
						?>
			    </ul>
			  </div>
			</div>
	  	</div>
  		<div class="col-md-4">
			<div class="panel panel-info">
			  <div class="panel-heading">
			    <h3 class="panel-title"><span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span>热点要闻</h3>
			  </div>
			  <div class="panel-body gs1">
			    <ul>
					<?php
							$sql="select * from content where mid=6 order by cdate desc limit 10";
							$m=fetchAll($sql);
							foreach($m as $v){
						?>
			    	<li><a href="detail.php?id=<?php echo $v['id']?>&mid=<?php echo $v['mid']?>"><?php echo mb_substr($v['title'],0,20)?></a></li>
						<?php
						}
						?>
			    </ul>
			  </div>
			</div>
  		</div>


  		<div class="col-md-4">
			<div class="panel panel-info" >
			  <div class="panel-heading" >
			    <h3 class="panel-title"><span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span>娱乐世界</h3>
			  </div>
			  <div class="panel-body gs1">
			    <ul>
					<?php
							$sql="select * from content where mid=4 order by cdate desc limit 10";
							$m=fetchAll($sql);
							foreach($m as $v){
						?>
			    	<li><a href="detail.php?id=<?php echo $v['id']?>&mid=<?php echo $v['mid']?>"><?php echo mb_substr($v['title'],0,20)?></a></li>
						<?php
						}
						?>
			    </ul>
			  </div>
			</div>
  		</div>
  		</div>
			<!-- 图片新闻 -->
	  <div class="row" style="margin-top:15px;">
			<?php
				$sqlI="select * from content as c,img as i where c.id=i.tid order by id desc limit 3";
				$result=fetchAll($sqlI);
				foreach($result as $resultI){
			?>
		  <div class="col-sm-6 col-md-4" >
		    <div class="thumbnail">
		      <img src="back/<?php echo $resultI["path"]?>" alt="<?php echo $resultI["title"]?>">
		      <div class="caption">
		        <h3><?php echo $resultI["title"]?></h3>
		        <p><?php echo $resultI["path"]?></p>
		        <p><a href="detail.php?id=<?php echo $resultI["id"]?>&mid=<?php echo $resultI["mid"]?>" class="btn btn-primary" role="button">详细</a></p>
		      </div>
		    </div>
			</div>
			<?php
				}
			?>
		</div>
		<?php include 'footer.php';?>