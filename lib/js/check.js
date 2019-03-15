function check(){
	var p = document.getElementById('pwd').value;
	var c = document.getElementById('cfm').value;
	var err = document.getElementById('msgErr');
	if(p != c){
		err.innerText = "密码不一致!";
		return false;
	}else{
		return true;
	}
}

function edit(id,num=1){
	if(num==1){
		window.location="edit.php?id="+id;
	}else if(num==2){
		window.location="newsEdit.php?id="+id;
	}else{
		
	}
}
function del(id,num=1){
	if(confirm("确定删除该数据？")){
		if(num==1){
			window.location="delMenu.php?id="+id;
		}else if(num==2){
			window.location="delNews.php?id="+id;
		}else{

		}
		
	}else
	{
		return false;
	}
}