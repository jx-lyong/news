<?php
include 'conf.php';
include 'inc.php';
if(isset($_POST['submit'])){
	
	//定义一个(允许上传)文件类型数组
	$arr = array("jpg","jpeg","gif","png","pjpeg");
	$size = 204800;
	//1.对于文件上传文件夹的操作
	$dir = "upload/".date("Ymd",time());
	if(!is_dir($dir)){
		mkdir($dir,0777,true);
	}
	//2.文件类型的判断
	$file_arr = explode(".",$_FILES['path']['name']);
	$ext = $file_arr[count($file_arr)-1];
	if(!in_array($ext,$arr)){
		exit("$ext 类型文件不允许上传");
	}
	//3.文件大小判断
	if($_FILES['path']['size']>$size){
		exit("文件大小超出100KB");
	}
	//4.新文件名的设计
	$filename = md5(date("YmdHis",time())).".".$ext;
	//5.存储文件
	if(is_uploaded_file($_FILES['path']['tmp_name'])){
		if(move_uploaded_file($_FILES['path']['tmp_name'],$dir."/".$filename)){
			$title = $_POST['title'];
			$source = $_POST['source'];
			$keyword = $_POST['keyword'];
			$mid = $_POST['mid'];
			$content = $_POST['content'];
			$cdate = time();

			connect($host,$user,$pwd,$db,$code);
			$sql = "insert into content(title,source,keyword,mid,cdate) values('$title','$source','$keyword',$mid,$cdate)";
			$id = addId($sql);

			$sql = "insert into ncontent(tid,content) values($id,'$content')";
			$result = add($sql);

			$path = $dir."/".$filename;
			$sql = "insert into img(tid,path) values($id,'$path')";
			$result1 = add($sql);
			if($result && $result1){
				printText('专题新闻添加成功!','special.php');
			}else{
				printText('专题新闻添加失败!','special.php');
			}

		}
	}
}

//接收新闻添加数据，完成添加操作







