<?php
include 'conf.php';
include 'inc.php';
connect($host,$user,$pwd,$db,$code);

$id=$_GET['id'];
$page=$_GET['page'];
$tp=$_GET['tp'];
if($tp==0){
    $t=1;
}else
{
    $t=0;
}
$sqlM="update msg set tp=$t where id=$id";
$result=edit($sqlM);
if($result){
    header("location:msg.php?page=$page");
}