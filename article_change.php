<?php
session_start();
require_once "dbconnection.php";
if(!isset($_SESSION['articles_perms']))
{
	echo "У вас нет прав доступа.";
	return;
}else if($_SESSION['articles_perms']!=1)//not admin
{
	echo "У вас нет прав доступа.";
	return;
}
if(!(isset($_POST['id'])&&isset($_POST['title'])&&isset($_POST['text'])))
{
	echo "Invalid request";
	return;
}
$flag=true;
	$title=htmlspecialchars($_POST['title']);
	if(empty($title))
	{
		$flag=false;
		echo "Поле заголовок должно быть заполнено.";
	}

	$text=htmlspecialchars($_POST['text']);
	if(empty($text))
	{
		$flag=false;
		echo "Поле контента не должно быть пустым.";
	}
	$id=htmlspecialchars($_POST['id']);
	if(!is_numeric($id))
	{
		echo "Invalid request";
		return;
	}

if($flag==false)
{
	return;
}

if($stmt=mysqli_prepare($conn,"Update articles SET article_title=?, article_content=? where ID_article=?")){
	mysqli_stmt_bind_param($stmt,"ssd",$title,$text,$id);
	if(mysqli_stmt_execute($stmt))
	{
	//mysqli_stmt_bind_result($stmt,$result); 
	mysqli_stmt_close($stmt);
	echo "ok".$id;
	}else
	{
	 echo "Возникла проблема при соединении с базой данных.";
	 echo mysqli_error($conn);
	}
}



/*
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
	echo mysqli_error($conn);
}*/
?>