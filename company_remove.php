<?php 
session_start();
require_once "dbconnection.php";
if(!isset($_SESSION['companies_perms']))
{
	echo "У вас нет прав доступа";
	//header("Location: articles.php");
	return;
}else if($_SESSION['companies_perms']!=1)//not admin
{
	echo "У вас нет прав доступа";
	//header("Location: articles.php");
	return;
}
if(isset($_GET["id"]))
{
	$id=$_GET["id"];
	if(!is_numeric($id))
	{
		echo "Invalid request";
		return;
	}
}else
{
	echo "Invalid request";
	return;
}
$query="SELECT logo from companies where id=".$id;
$result=mysqli_query($conn,$query);
if($result)
{
	$row=mysqli_fetch_row($result);
	if(!empty($row[0]));
	@unlink($row[0]);
}else
{
	echo "Удаление не удалось.";
}
$query="DELETE from companies where id=".$id;
$result=mysqli_query($conn,$query);
	if($result!=false)
	{
		echo "ok";
 	
	}else{
		echo "Удаление не удалось.";
	}

?>