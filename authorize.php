<?php
session_start();
header('Content-Type: text/plain; charset=utf-8'); 
require_once "dbconnection.php";
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$pass=$_POST['password'];
	$pass=md5($pass);
	try{
	$query="select Role,Username from users where Username='".$username."' and Password= '".$pass."'";
	$result=mysqli_query($conn,$query);
	if($result!=false)
	{
	$count=mysqli_num_rows($result);
	if($count==1)
	{
		echo "ok";
		$row=mysqli_fetch_row($result);
		//print_r($row);
		$_SESSION['role']=$row[0];
		$_SESSION['name']=$row[1];
	}else
	{
		echo "Что-то пошло не так, попробуйте ещё раз";
	}
	}
	else
	{
		echo "Что-то пошло не так, попробуйте ещё раз";
	}
	}catch(Exception $e){
    $error = $e->getMessage();
    echo $error;
	}
}
?>