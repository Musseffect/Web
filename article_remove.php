<?php 
session_start();
require_once "dbconnection.php";
if(!isset($_SESSION['articles_perms']))
{
	echo "У вас нет права доступа";
	//header("Location: articles.php");
	return;
}else if($_SESSION['articles_perms']!=1)//not admin
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
$flag=true;
mysqli_autocommit($conn, false);
$query="DELETE from comments where ID_article=".$id;
$result=mysqli_query($conn,$query);
	if(!$result)
	{
		$flag=false;
	}
$query="DELETE from articles where ID_article=".$id;
$result=mysqli_query($conn,$query);
	if(!$result)
	{
		$flag=false;
	}

	if($flag)
	{
		mysqli_commit($conn);
		echo "ok";
 	}
	else
		{
			mysqli_rollback($conn);
			echo "Удаление не удалось.";}

?>