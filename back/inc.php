<?php

/* 链接数据库服务器选择数据库*/
function connect($host,$user,$pwd,$db,$code){
	global $link;
	$link = @mysqli_connect($host,$user,$pwd,$db);
	if(!$link){
		exit("connect error!");
	}
	mysqli_set_charset($link,$code);
}

/* 查询返回单条记录 */
function fetchOne($sql){
	global $link;
	$result = @mysqli_query($link,$sql) or exit("fetchOne error!");
	$row = mysqli_fetch_assoc($result);
	return $row;

}

/*  查询返回所有记录  */
function fetchAll($sql){
	global $link;
	$result = @mysqli_query($link,$sql) or exit("fetchAll error!");
	$rows=array();
	while($row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}

/* 添加数据*/

function add($sql){
	global $link;
	$result = @mysqli_query($link,$sql) or exit("add error!");
	if($result && mysqli_affected_rows($link)>0){
		return 1;
	}else{
		return 0;
	}
}

//添加成功后，返回主键id值
function addId($sql){
	global $link;
	$result = @mysqli_query($link,$sql) or exit("addId error!");
	if($result && mysqli_affected_rows($link)>0){
		return mysqli_insert_id($link);//返回当前所添加的记录的主键ID值
	}else{
		return 0;
	}
}

//修改数据函数
function edit($sql){
	global $link;
	$result = @mysqli_query($link,$sql) or exit('edit error!');
	if($result && mysqli_affected_rows($link)>0){
		return 1;
	}else{
		return 0;
	}
}
//返回结果集中纪录的数目
function returnTotal($sql){
	global $link;
	$result = @mysqli_query($link,$sql) or exit('returnTotal error!');
	return mysqli_num_rows($result);
}
//输出提示信息
function printText($msg="添加成功!",$url="index.php"){
	$txt = "<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8'>
	<title>{$msg}</title>
	<style>
		*{margin:0;padding:0;}
		body{font-family:microsoft yahei;font-size:14px;color:#666;}
		.box{width:250px;height:auto;border:1px solid #ccc;margin:100px auto;padding:10px;}
		.box h3{font-size:16px;line-height:30px;border-bottom:1px solid #ccc;}
		.box div{line-height:25px;}
		.box a{color:#ccc;text-decoration:none;}
	</style>
</head>
<body>
	<div class='box'>
		<h3>信息提示：</h3>
		<div>{$msg}&nbsp;<span id='time'>3</span>&nbsp;秒后跳转!&nbsp;<a href='$url'>点击跳转</a></div>
	</div>
	<script>
		var t = document.getElementById('time').innerText;
		var clock;
		function setTime(){
			if(t > 0){
				document.getElementById('time').innerText = --t;
			}else{
				window.location='$url';
				clearInterval(clock);
			}
		}

		function setClock(){
			clock = setInterval('setTime()',1000);
		}
		setClock();
	</script>
</body>
</html>";
echo $txt;
}


function printText1($msg="添加成功!",$url="index.php"){
	$txt = "<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8'>
	<title>{$msg}</title>
	<style>
		*{margin:0;padding:0;}
		body{font-family:microsoft yahei;font-size:14px;color:#666;}
		.box{width:250px;height:auto;border:1px solid #ccc;margin:100px auto;padding:10px;}
		.box h3{font-size:16px;line-height:30px;border-bottom:1px solid #ccc;}
		.box div{line-height:25px;}
		.box a{color:#ccc;text-decoration:none;}
	</style>
</head>
<body>
	<div class='box'>
		<h3>信息提示：</h3>
		<div>{$msg}&nbsp;<span id='time'>3</span>&nbsp;秒后跳转!&nbsp;<a href='$url' target='_parent'>点击跳转</a></div>
	</div>
	<script>
		var t = document.getElementById('time').innerText;
		var clock;
		function setTime(){
			if(t > 0){
				document.getElementById('time').innerText = --t;
			}else{
				parent.location.href='$url';
				clearInterval(clock);
			}
		}

		function setClock(){
			clock = setInterval('setTime()',1000);
		}
		setClock();
	</script>
</body>
</html>";
echo $txt;
}
