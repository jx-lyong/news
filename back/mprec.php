<?php
//接收修改用户的信息
session_start();
include 'conf.php';
include 'inc.php';

$username = $_POST['username'];
$passwd = md5($_POST['pwd']);
$id = $_SESSION['id'];

connect($host,$user,$pwd,$db,$code);
$sql = "update admin set username = '$username',pwd = '$passwd' where id = $id";
$result = edit($sql);
if($result){
	printText1("用户信息修改成功!","login.html");
}else{
	printText("用户信息修改失败!","modifyPwd.php");
}
