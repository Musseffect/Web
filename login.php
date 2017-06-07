<?php 
session_start();
if(isset($_SESSION['role']))
{
	header('Location: main.php');//негоже логинится по многу раз
}
header('Content-type: text/html; charset=utf-8"');?>
<!DOCTYPE html>
<html>
<head>
<title>reg form</title>
<meta charset="utf-8">
<script>
function subm()
{
var xhr = new XMLHttpRequest();
xhr.open('POST', 'authorize.php', true);
button=document.getElementById('btn-submit');
xhr.onreadystatechange=function()
{
	if(this.readyState==4)
	{
		if(this.status!=200)
		{
			document.getElementById('error').innerHTML="Произошла ошибка.";

			button.value='Авторизоваться';
			button.disabled = false;

		}else{
			if(this.responseText=='ok')
				{


				setTimeout(' window.location.href = "main.html"; ',2000);
				}
			else
			{	
				document.getElementById('error').innerHTML=this.responseText;
				button.value='Авторизоваться';
				button.disabled = false;
			}
		}

	}

};
button.value = 'Подождите...'; 
button.disabled = true;
var name=document.getElementById('login').value;
var pass=document.getElementById('password').value;
var mess='username='+encodeURIComponent(name)+'&password='+encodeURIComponent(pass)+'&submit=true';
xhr.timeout=30000;
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xhr.ontimeout=function()
{
	document.getElementById('error').innerHTML='Время ожидание превысило допустимое значение.';
	button.value='Авторизоваться';
	button.disabled = false;
};
xhr.send(mess);
return false;
}
</script>
</head>
<body>

<div id="error"></div>
<input type="text" id="login" name="login">
<input type="password" id="password" name="password">
<input type="button" name="submit" id="btn-submit" value="Авторизоваться" onclick="subm()">

</body>
</html>