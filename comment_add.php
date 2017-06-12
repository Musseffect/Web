<?php
session_start();
require_once "dbconnection.php";
if(!isset($_SESSION['id']))
{
	echo "Для добавления комментариев необходимо авторизоваться.";
	return;
}
$flag=true;
if(!(isset($_POST['ID_article'])&&isset($_POST['comment'])))
{
	echo "Invalid request.";
	return;
}
	$id_article=htmlspecialchars($_POST['ID_article']);
	if($id_article=="")
	{
		echo "Invalid request.";
		return;
	}
	$id_user=htmlspecialchars($_SESSION['id']);
	if($id_article=="")
	{
		echo "Invalid request.";
		return;
	}
	$comment=htmlspecialchars($_POST['comment']);
	if($comment=="")
	{
		echo "Комментарий не должен быть пустым.";
		return;
	}
$query="Select count(*) from users where User_ID=".$id_user;
$result=mysqli_query($conn,$query);
if(!$result)
{
		echo "Invalid request.";
		return;
}else
{
	if(mysqli_num_rows($result)==0)
	{
		echo "Invalid request.";
		return;
	}
}
$query="Select count(*) from articles where ID_article=".$id_article;
$result=mysqli_query($conn,$query);
if(!$result)
{
		echo "Invalid request.";
		return;
}else
{
	if(mysqli_num_rows($result)==0)
	{
		echo "Invalid request.";
		return;
	}
}
$date=date("Y-m-d H:i:s");
$comment=substr($comment,0,255);
$query="INSERT into comments SET
            ID_article='".$id_article."',
            ID_user='".$id_user."',
            comment='".$comment."',
            date='".$date."'";
            $result=mysqli_query($conn,$query);
if($result)
{
	echo "ok".mysqli_insert_id($conn);
}else
{
	echo "Не удалось добавить комментарий. ";
	echo mysql_error();
}
?>