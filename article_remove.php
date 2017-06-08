<?php 
session_start();
require_once "dbconnection.php";
if(!isset($_SESSION['role']))
{
	echo "У вас нет права доступа";
	//header("Location: articles.php");
	return;
}else if($_SESSION['role']!=0)//not admin
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
$query="DELETE from articles where ID_article=".$id;
$result=mysqli_query($conn,$query);
	if($result!=false)
	{
		echo "ok";
 	}
	else
		echo "Удаление не удалось.";

?>