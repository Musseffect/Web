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
<div class="content">
<div id="register_center_div">
<form id="register_form" action="register.php" method="post">
<label><h3>Регистрация</h3></label>
<label><b>Логин</b></label>
<input type="text" id="login_register" name="login" required><div id="loginerror"></div>
<label><b>Пароль</b></label>
<input type="password" id="password_register" name="password" required><div id="passerror"></div>
<label><b>Повторите пароль</b></label>
<input type="password" id="password2_register" name="password2" required><div id="passerror2"></div>
<input type="submit" name="submit" id="btn-submit" value="Зарегистрироваться" >
</form>
</div>
</div>
<footer class="footer">
</footer>
</body>
</html>