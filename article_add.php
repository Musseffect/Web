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
if(!(isset($_POST['title'])&&isset($_POST['text'])))
{

	echo "У вас нет прав доступа.";
	return;
}
$flag=true;
if(isset($_POST['title']))
{
	$title=htmlspecialchars($_POST['title']);
	if($title=="")
	{
		$flag=false;
		echo "Поле заголовок должно быть заполнено.";
	}
}

$date=date("Y-m-d");
if(isset($_POST['text']))
{
	//strip_tags(string $str[, string $allowable_tags])
	$text=htmlspecialchars($_POST['text']);
	if($text=="")
	{
		$flag=false;
		echo "Поле контента не должно быть пустым.";
	}
}
if($flag==false)
{
	return;
}
$query="INSERT into articles SET
            article_title='".$title."',
            date='".$date."',
            article_content='".$text."'";
            $result=mysqli_query($conn,$query);
if($result)
{
	echo "ok".mysqli_insert_id($conn);
}else
{
	echo "Не удалось добавить статью.";
	echo mysql_error();
}
?>