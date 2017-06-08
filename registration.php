<?php
session_start();
header('Content-Type: text/plain; charset=utf-8'); 
require_once "dbconnection.php";
$pass=$_REQUEST['password'];
//check password
$username=$_REQUEST['username'];
//check username
$query="select username from users where username='".$username."'";
$result=mysqli_query($conn,$query);
$count=mysql_num_rows($result);
if($count==0)
{
	$pass=md5($pass);
	$query="insert into users(Username,Password,Roles) VALUES('".$username."','".$pass."',0)";
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
}
?>


