<?php
//接收新闻修改数据，完成修改操作
include 'conf.php';
include 'inc.php';
$id = $_POST['id'];
$title = $_POST['title'];
$source = $_POST['source'];
$keyword = $_POST['keyword'];
$mid = $_POST['mid'];
$content = $_POST['content'];
$cdate=time();
connect($host,$user,$pwd,$db,$code);
$sql = "update content set title='$title',source='$source',keyword='$keyword',mid=$mid where id=$id";
$result1=edit($sql);

$sql="update ncontent set content='$content' where tid=$id";
$result2=edit($sql);
if($result1==1 || $result2==1)
{
    $sql = "update content set cdate=$cdate where id=$id";
    $result1=edit($sql);
}
/* echo $result1;
echo "<br>";
echo $result2;
die; */
if($result1 || $result2){
	printText("新闻修改成功!","modifynews.php");
}else{
	printText("没有做任何修改，保存失败！","modifynews.php");
}
