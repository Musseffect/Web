<?php 
session_start();
require_once("dbconnection.php");
if(isset($_SESSION['name']))
{
	header("Location: main.php");
}
$login="";
$pass="";
$pass2="";
$login_error="";
$pass_error="";
$pass2_error="";
$error="";
$flag=false;
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$flag=true;
if(!(isset($_POST['login'])&&isset($_POST['password'])&&isset($_POST['password2'])))
{
	header("location: register.php");
	return;
}
$login=$_POST['login'];
$pass=$_POST['password'];
$pass2=$_POST['password2'];
if(empty($login))
{
	$login_error="Введите логин";
    $flag=false;
}
if(empty($pass))
{
	$pass_error="Введите пароль";
    $flag=false;
}

if(preg_match('/[^a-zA-Z0-9_]/', $login) == 0)
    {
    }
    else
    {
    	$login_error="Логин может содержать только английские буквы и цифры.";
        $flag=false;
    }

if(preg_match('/[^a-zA-Z0-9_]/', $pass) == 0)
    {
    }
    else
    {
    	$pass_error="Пароль может содержать только английские буквы и цифры.";
        $flag=false;
    }
if($pass!=$pass2)
{
	$pass2_error="Пароли не совпадают";
	$flag=false;
}
if($flag==true)
{
	/*$query="INSERT into users SET
            Username='".$title."',
            date='".$date."',
            article_content='".$text."'";
            $result=mysqli_query($conn,$query);*/
$query="select username from users where username='".$login."'";
$result=mysqli_query($conn,$query);
$count=mysqli_num_rows($result);
if($count==0)
{
	$query="select id from permissions where role_name='user'";
	$result=mysqli_query($conn,$query);
	$count=mysqli_num_rows($result);
	if($count==0)
	{
		$flag=false;
		$error="Регистрация не удалась.";
	}else
	{
	$row=mysqli_fetch_row($result);
	$id=$row[0];
	$password=md5($pass);
	$query="insert into users(Username,Password,id_permissions) VALUES('".$login."','".$password."',".$id.")";//user permissions
	$result=mysqli_query($conn,$query);
	if($result==true)
	{
		header("Location: login.php");
	}else
	{
		$flag=false;
		$error="Регистрация не удалась.";//.mysqli_error($conn);
	}
	}
}else
{
	$flag=false;
	$login_error="Данный логин занят. Выберите другой.";
}
	
}


}
/*header('Content-Type: text/plain; charset=utf-8'); 
require_once "dbconnection.php";
$pass=$_REQUEST['password'];
//check password
$username=$_REQUEST['username'];
//check username
$query="select username from users where username='".$username."'";
$result=mysqli_query($conn,$query);
$count=mysqli_num_rows($result);
if($count==0)
{
	$query="select id from permissions where role_name='user'";
	$result=mysqli_query($conn,$query);
	$count=mysqli_num_rows($result);
	if($count==0)
	{
		echo 'Регистрация не удалась';
		return;
	}
	$row=mysqli_fetch_row($result);
	$id=$row[0];
	$pass=md5($pass);
	$query="insert into users(Username,Password,id_permissions) VALUES('".$username."','".$pass."',"$id")";//user permissions
	$result=mysqli_query($conn,$query);
	if($result==true)
	{
		echo 'ok';
	}else
	{
		echo 'Регистрация не удалась'
	}
}
else
{
	echo "Данное имя занято";
}*/
?>
<!DOCTYPE html>
<html>
<head>
<title>Регистрация</title>
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/modal.css">
<link rel="stylesheet" type="text/css" href="css/article.css">
<link rel="stylesheet" type="text/css" href="css/news.css">
<script>
/*
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
}*/
</script>
</head>
<body>
<?php require_once("menu.php");?>
<div class="content">
<div id="register_center_div">
<?php if($flag==false){?>
<form id="register_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<label><h3>Регистрация</h3></label>
<label><b>Введите Логин</b></label>
<input type="text" id="login_register" name="login" placeholder="Логин" value="<?php echo $login; ?>" required><span class="error"><?php echo $login_error;?></span>
<label><b>Введите Пароль</b></label>
<input type="password" id="password_register" name="password" value="<?php echo $pass; ?>" placeholder="Пароль" required><span class="error"><?php echo $pass_error;?></span>
<label><b>Повторите пароль</b></label>
<input type="password" id="password2_register" name="password2" value="<?php echo $pass2; ?>" placeholder="Пароль"  required><span class="error"><?php echo $pass2_error;?></span>
<input type="submit" name="submit" id="btn-submit" value="Зарегистрироваться" >
<span class="error"><?php echo $error;?></span>
<?php }else{?>
<span class="reg_success">Регистрация завершена!</span>
<?php }?>
</form>
</div>
</div>
<footer class="footer">
</footer>
</body>
</html>