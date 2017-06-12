<?php
session_start();
header('Content-Type: text/plain; charset=utf-8'); 
require_once "dbconnection.php";
if(isset($_POST['submit']))
{
	if(!(isset($_POST['username'])&&isset($_POST['password'])))
	{
		return "Invalid requiest";
	}
	$username=$_POST['username'];
	$pass=$_POST['password'];
	$pass=md5($pass);
	try{
	$query="select p.delete_comments,p.articles_perms,p.companies_perms,u.Username,u.User_ID from users as u INNER JOIN permissions as p on u.id_permissions=p.id where u.Username='".$username."' and Password= '".$pass."'";
	$result=mysqli_query($conn,$query);
	if($result!=false)
	{
	$count=mysqli_num_rows($result);
	if($count==1)
	{
		echo "ok";
		$row=mysqli_fetch_row($result);
		//print_r($row);
		$_SESSION['delete_comments']=$row[0];
		$_SESSION['articles_perms']=$row[1];
		$_SESSION['companies_perms']=$row[2];
		$_SESSION['name']=$row[3];
		$_SESSION['id']=$row[4];
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