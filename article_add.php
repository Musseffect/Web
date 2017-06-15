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
		echo "<p>Поле заголовок должно быть заполнено.</p>";
	}
}

$date=date("Y-m-d");
if(isset($_POST['text']))
{
	//strip_tags(string $str[, string $allowable_tags])
	//$text=nl2br(strip_tags( $_POST['text'], "<br><p><img><b><i><u><s><a><img>"),false);
	//);
	$text=htmlspecialchars($_POST['text']);
	if($text=="")
	{
		$flag=false;
		echo "<p>Поле контента не должно быть пустым.</p>";
	}
}
if($flag==false)
{
	return;
}
if($stmt=mysqli_prepare($conn,"INSERT into articles SET article_title=?,date=?, article_content=?")){
	mysqli_stmt_bind_param($stmt,"sss",$title,$date,$text);
	if(mysqli_stmt_execute($stmt))
	{
	//mysqli_stmt_bind_result($stmt,$result); 
	mysqli_stmt_close($stmt);
	echo "ok".mysqli_insert_id($conn);
	}else
	{
	 echo "Возникла проблема при соединении с базой данных.";
	 echo mysqli_error($conn);
	}
}









/*
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
	echo mysqli_error($conn);
}*/
?>