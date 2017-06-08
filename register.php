<?php 
session_start();
//check session

///////////



?>
<!DOCTYPE html>
<html>
<head>
<title>reg form</title>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/modal.css">
<link rel="stylesheet" type="text/css" href="css/article.css">
<link rel="stylesheet" type="text/css" href="css/news.css">
<script>
function register()
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

			button.innerHTML='Авторизоваться';
			button.disabled = false;

		}else{
			if(this.responseText=='ok')
				{
				setTimeout(' window.location.href = "main.php"; ',2000);
				}
			else
			{	
				document.getElementById('error').innerHTML=this.responseText;
				button.innerHTML='Авторизоваться';
				button.disabled = false;
			}
		}

	}

};
button.innerHTML = 'Подождите...'; // (2)
button.disabled = true;
var name=document.getElementById('login').value;
var pass=document.getElementById('password').value;
var mess='username='+encodeURIComponent(name)+'&password='+encodeURIComponent(pass)+'&submit=true';
xhr.timeout=30000;
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xhr.ontimeout=function()
{
	document.getElementById('error').innerHTML='Время ожидание превысило допустимое значение.';
	button.innerHTML='Авторизоваться';
	button.disabled = false;
};
xhr.send(mess);
return false;
}
</script>
</head>
<body>
<?php require_once("menu.php");?>
<form action="" method="post">
<input type="text" id="login" name="login"><div id="loginerror"></div>
<input type="password" id="password" name="password"><div id="passerror"></div>
<input type="password" id="password2" name="password2"><div id="passerror2"></div>
<input type="submit" name="submit" id="btn-submit" value="Зарегистрироваться" >//проверка данных ajaxom
</form>
</body>
</html>