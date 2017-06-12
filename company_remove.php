<?php 
session_start();
require_once "dbconnection.php";
if(!isset($_SESSION['companies_perms']))
{
	echo "У вас нет права доступа";
	//header("Location: articles.php");
	return;
}else if($_SESSION['companies_perms']!=1)//not admin
{
	echo "У вас нет права доступа";
	//header("Location: articles.php");
	return;
}
if(isset($_GET["id"]))
{
	$id=$_GET["id"];
}else
{
	echo "Возникла ошибка";
	return;
}
$query="DELETE from companies where id=".$id;
$result=mysqli_query($conn,$query);
	if($result!=false)
	{
		echo "ok";
 	}
	}else
		echo "Удаление не удалось.";
}
?>