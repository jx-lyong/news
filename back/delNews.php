<?php
//接收新闻修改数据，完成修改操作
include 'conf.php';
include 'inc.php';
$id = $_GET['id'];
connect($host,$user,$pwd,$db,$code);
$sql = "delete from content where id=$id";
$result1=edit($sql);
$sql="delete from ncontent where tid=$id";
$result2=edit($sql);
if($result1 || $result2){
	printText("新闻删除成功!","modifynews.php");
}else{
	printText("新闻删除失败!","modifynews.php");
}
