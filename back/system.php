<?php
//修改系统配置信息
include 'conf.php';
include 'inc.php';

$sysname = $_POST['sysname'];
$keyword = $_POST['keyword'];
$dsc = $_POST['dsc'];
$address = $_POST['address'];
$tel = $_POST['tel'];
$copy = $_POST['copy'];
$author = $_POST['author'];

connect($host,$user,$pwd,$db,$code);
$sql = "update config set sysname='$sysname',keyword ='$keyword',dsc = '$dsc',address = '$address',tel='$tel',copy='$copy',author = '$author'";
$result = edit($sql);
if($result){
	printText('修改信息成功!','config.php');
}else{
	printText('修改信息失败!','config.php');
}