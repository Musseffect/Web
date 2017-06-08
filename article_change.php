<?php
session_start();
require_once "dbconnection.php";
if(!isset($_SESSION['role']))
{
	echo "У вас нет прав доступа.";
	return;
}else if($_SESSION['role']!=0)//not admin
{
	echo "У вас нет прав доступа.";
	return;
}
if(!(isset($_POST['id'])&&isset($_POST['title'])&&isset($_POST['text'])))
{

	echo "У вас нет прав доступа.";
	return;
}
$flag=true;
	$title=htmlspecialchars($_POST['title']);
	if($title=="")
	{
		$flag=false;
		echo "Поле заголовок должно быть заполнено.";
	}

	$text=htmlspecialchars($_POST['text']);
	if($text=="")
	{
		$flag=false;
		echo "Поле контента не должно быть пустым.";
	}
	$id=htmlspecialchars($_POST['id']);


if($flag==false)
{
	return;
}
$query="UPDATE articles SET
            article_title='".$title."',
            article_content='".$text."' where ID_article=".$id;
            $result=mysqli_query($conn,$query);
if($result)
{
	echo "ok".$id;
}else
{
	echo "Не удалось обновить статью.";
	echo mysql_error();
}
?>