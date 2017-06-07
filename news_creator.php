<?php
session_start();
if(!isset($_SESSION['role']))
{
	header('Location: nonexistingpage.php');
}else if($_SESSION['role']!=0)//not admin
{
	header('Location: menu.php');//redirect to main;
}
?>

<!DOCTYPE html>
<html>
<head>
<script>


var error;
var text;
var title;
var button;
window.onload=function()
{
text=document.getElementById("content");
title=document.getElementById("title");
error=document.getElementById("error");
button=document.getElementById('submit');
}

function send()
{
var date=new Date();
var xhr = new XMLHttpRequest();
xhr.open('POST', 'news_add.php', true);
xhr.onreadystatechange=function()
{
	if(this.readyState==4)
	{
		if(this.status!=200)
		{
			error.innerHTML="Произошла ошибка.";

			button.value ='Подтвердить';
			button.disabled = false;

		}else{
			if(this.responseText.substr(0,2)=='ok')
				{
				//setTimeout(' window.location.href = "main.html"; ',2000);
				setTimeout(' location.reload(true); ',1000);
				}
			else
			{	
				error.innerHTML =this.responseText;
				button.value='Подтвердить';
				button.disabled = false;
			}
		}
	}
};
button.value = 'Подождите...'; // (2)
button.disabled = true;
var mess='title='+encodeURIComponent(title.value)+'&text='+encodeURIComponent(text.value)+'&date='+encodeURIComponent(date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate());
xhr.timeout=30000;
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xhr.ontimeout=function()
{
	error.innerHTML='Время ожидание ответа сервера превысило допустимое значение.';
	button.value ='Подтеврдить';
	button.disabled = false;
};
error.innerHTML="";
xhr.send(mess);
return false;
}



</script>
<title>this is news creator page</title>
<meta charset="windows-1251">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/reset.css">
</head>
<body>
<div id="error">
</div>
<p>
	Заголовок новости <br>
    <input type="text"  style="border:1px silver solid; width:160px;" name="title" id="title">
</p>
<p>
   Новость<br>
   <textarea style="width:650px; height:260px;"  name="text" id="content" cols="80" ></textarea>
</p>
 <input type="submit" class="buttons" onclick="send()"  id="submit" value="Подтвердить">


</body>
</html>