<?php
//菜单数据的添加处理
include 'conf.php';
include 'inc.php';
$name = $_POST['name'];
$dsc = $_POST['dsc'];
$mdate = time();

connect($host,$user,$pwd,$db,$code);
$sql = "insert into menu(name,dsc,mdate) values('$name','$dsc','$mdate')";
$result = add($sql);
if($result){
	printText('菜单添加成功!','menu.php');
}else{
	printText('菜单添加失败!','menu.php');
}