<?php
//接收修改菜单的信息
include 'conf.php';
include 'inc.php';
$menuname = $_POST['menuname'];
$ms = $_POST['ms'];
$id = $_POST['id'];
$mdate =time();
connect($host,$user,$pwd,$db,$code);
$sql = "update menu set name= '$menuname', dsc= '$ms',mdate=$mdate where id = $id";
$result = edit($sql);
if($result){
	printText("菜单信息修改成功!","modifyMenu.php");
}else{
	printText("菜单信息修改失败!","edit.php");
}
