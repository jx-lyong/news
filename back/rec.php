<?php
//实现用户登陆的操作
session_start();
include 'conf.php';
include 'inc.php';
$username = $_POST['username'];
$passwd = md5($_POST['pwd']);

connect($host,$user,$pwd,$db,$code);
$sql = "select * from admin where username='$username' and pwd = '$passwd'";
$row = fetchOne($sql);
if(is_array($row)){
	$_SESSION['id'] = $row['id'];
	$_SESSION['username'] = $row['username'];
	printText('欢迎登陆!','index.php');
}else{
	printText('登陆失败!','login.html');
}


