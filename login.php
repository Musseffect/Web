<?php 
session_start();
require_once("dbconnection.php");
if(isset($_SESSION['name']))
{
	header('Location: main.php');//негоже логинится по многу раз
}
header('Content-type: text/html; charset=utf-8"');



$login="";
$pass="";
$login_error="";
$pass_error="";
$error="";
$flag=false;
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$general_error="";
$flag=true;
if(!(isset($_POST['login'])&&isset($_POST['password'])))
{
	header("location: login.php");
	return;
}
$login=$_POST['login'];
$pass=$_POST['password'];
if(empty($login))
{
	$login_error="Введите логин";
    $flag=false;
}
if(empty($pass))
{
	$login_error="Введите пароль";
    $flag=false;
}

if(preg_match('/[^a-zA-Z0-9_]/', $login) == 0)
    {
    	//echo "0";
    }
    else
    {
    	$login_error="Логин может содержать только английские буквы и цифры.";
        $flag=false;
    }

if(preg_match('/[^a-zA-Z0-9_]/', $pass) == 0)
    {
    	//echo "1";
    }
    else
    {
    	$pass_error="Пароль может содержать только английские буквы и цифры.";
        $flag=false;
    }
if($flag=true)
{
	/*$query="INSERT into users SET
            Username='".$title."',
            date='".$date."',
            article_content='".$text."'";
            $result=mysqli_query($conn,$query);*/

	$password=md5($pass);
	try{
	$query="select p.delete_comments,p.articles_perms,p.companies_perms,u.Username,u.User_ID from users as u INNER JOIN permissions as p on u.id_permissions=p.id where u.Username='".$login."' and Password= '".$password."'";
	$result=mysqli_query($conn,$query);
	if($result!=false)
	{
	$count=mysqli_num_rows($result);
	if($count==1)
	{
		$row=mysqli_fetch_row($result);
		//print_r($row);
		$_SESSION['delete_comments']=$row[0];
		$_SESSION['articles_perms']=$row[1];
		$_SESSION['companies_perms']=$row[2];
		$_SESSION['name']=$row[3];
		$_SESSION['id']=$row[4];
		header("Location: main.php");
	}else
	{
		$error="Что-то пошло не так, попробуйте ещё раз";
	}
	}
	else
	{
		$error="Что-то пошло не так, попробуйте ещё раз";
	}
	}catch(Exception $e){
    $error = $e->getMessage();
	}
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Авторизация</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/modal.css">
<link rel="stylesheet" type="text/css" href="css/article.css">
<link rel="stylesheet" type="text/css" href="css/news.css">
<link rel="stylesheet" type="text/css" href="css/comments.css">
<script>/*
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
}*/
</script>
</head>
<body>
<div class="content">
<?php require_once("menu.php");?>
<div id="login_center_div">
    <form id="login_form" class="modal-body" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   <label><h3>Авторизация</h3></label>
	<label><b>Логин</b></label><input placeholder="Введите логин" type="text" id="login" value="<?php echo $login; ?>" name="login" required>
	<span class="error"><?php echo $login_error;?></span>
	<label><b>Пароль</b></label><input placeholder="Введите пароль" type="password" value="<?php echo $pass; ?>" id="password" name="password" required>
	<span class="error"><?php echo $pass_error;?></span>
	<input type="submit" name="submit" id="btn-submit" value="Авторизоваться">
   <div class="error"><?php echo $error;?></div>
  </form>
  <!--<div class="modal-body">
	<label><b>Логин</b></label><input placeholder="Введите логин" type="text" id="login" name="login" required>
	<label><b>Пароль</b></label><input placeholder="Введите пароль" type="password" id="password" name="password" reqired>
	<input type="button" name="submit" id="btn-submit" value="Авторизоваться" onclick="subm()"> 
  </div>-->
</div>
</div>
</body>
</html>