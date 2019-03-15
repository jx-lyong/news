<?php
//接收新闻添加数据，完成添加操作
include 'conf.php';
include 'inc.php';
$title = $_POST['title'];
$source = $_POST['source'];
$keyword = $_POST['keyword'];
$mid = $_POST['mid'];
$content = $_POST['content'];
$cdate=time();
connect($host,$user,$pwd,$db,$code);
$sql = "insert into content(title,source,keyword,mid,cdate) values('$title','$source','$keyword',$mid,$cdate)";
$id=addId($sql);

$sql="insert into ncontent(tid,content) values($id,'$content')";
$result=add($sql);
if($result){
	printText("新闻添加成功!","news.php");
}else{
	printText("新闻添加失败!","news.php");
}
