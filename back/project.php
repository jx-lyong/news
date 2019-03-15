<?php
include 'sess.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>添加新闻</title>
    <link rel="stylesheet" href="../lib/css/bootstrap.min.css">
    <script src="../lib/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../lib/kindeditor-4.1.7/themes/default/default.css" />
	<link rel="stylesheet" href="../lib/kindeditor-4.1.7/plugins/code/prettify.css" />
	<script charset="utf-8" src="../lib/kindeditor-4.1.7/kindeditor.js"></script>
	<script charset="utf-8" src="../lib/kindeditor-4.1.7/lang/zh_CN.js"></script>
	<script charset="utf-8" src="../lib/kindeditor-4.1.7/plugins/code/prettify.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content"]', {
				cssPath : '../lib/kindeditor-4.1.7/plugins/code/prettify.css',
				uploadJson : '../lib/kindeditor-4.1.7/php/upload_json.php',
				fileManagerJson : '../lib/kindeditor-4.1.7/php/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
	</script>
</head>
<body style="padding:5px;">
<ol class="breadcrumb" style="background: #369;color:#fff">
  <li><a href="#" style="color:#fff">首页</a></li>
  <li><a href="#" style="color:#fff">新闻管理</a></li>
  <li class="active" style="color:#eee">专题新闻</li>
</ol>
    <form method="post" name="example" enctype="multipart/form-data" action="srec.php">
        <div class="form-group">
            <label for="title">新闻标题</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="请输入新闻标题">
        </div>
        <div class="form-group">
            <label for="source">新闻来源</label>
            <input type="text" class="form-control" id="source" name="source" placeholder="请输入新闻来源">
        </div>
        <div class="form-group">
            <label for="keyword">关键字</label>
            <input type="text" id="keyword" class="form-control" name="keyword" placeholder="请输入新闻关键字">
        </div>
        <div class="form-group">
            <label for="mid">新闻分类</label>
            <select name="mid" id="mid" class="form-control">
                <?php
                    include 'conf.php';
                    include 'inc.php';
                    connect($host,$user,$pwd,$db,$code);
                    $sql="select * from menu";
                    $rows=fetchAll($sql);
                    foreach($rows as $row){
                ?>
                <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                <?php
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="path">选择文件</label>
            <input type="file" id="path" name="path" class="form-control" name="file">
        </div>
        <div class="form-group">
            <label for="content">新闻内容</label>
            <textarea type="content" class="form-control" id="content" name="content" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-default">添加新闻</button>
        </form>
</body>
</html>