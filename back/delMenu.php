<?php
//接收数据，删除对应菜单
include 'conf.php';
include 'inc.php';
$id=$_GET['id'];
connect($host,$user,$pwd,$db,$code);
$sql="delete from menu where id=$id";
$result = edit($sql);
if($result){
	printText("菜单删除成功!","modifyMenu.php");
}else{
	printText("菜单删除失败!","modifyMenu.php");
}
?>