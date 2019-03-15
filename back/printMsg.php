<?php

function printText($msg="添加成功!",$url="index.php"){
	$txt = "<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8'>
	<title>{$msg}</title>
	<style>
		*{margin:0;padding:0;}
		body{font-family:microsoft yahei;font-size:14px;color:#666;}
		.box{width:200px;height:auto;border:1px solid #ccc;margin:100px auto;padding:10px;}
		.box h3{font-size:16px;line-height:30px;border-bottom:1px solid #ccc;}
		.box div{line-height:25px;}
		.box a{color:#ccc;text-decoration:none;}
	</style>
</head>
<body>
	<div class='box'>
		<h3>信息提示：</h3>
		<div>{$msg}<span id='time'>5</span>秒后跳转!<a href='$url'>点击跳转</a></div>
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
