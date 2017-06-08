<?php
require_once "dbconnection.php";
if(!isset($_SESSION['role']))
{
	echo "У вас нет прав на совершение этого действия.";
	return;
}else if($_SESSION['role']!=0)//not admin
{
	echo "У вас нет прав на совершение этого действия.";
	return;
}

$flag=true;
if(isset($_POST['title']))
{
	$title=$_POST['title'];
	if($title=="")
	{
		$flag=false;
		echo "Поле заголовок должно быть заполнено.";
	}
}
else
{
	$flag=false;
	echo "Поле заголовок должно быть заполнено.";
}
if(isset($_POST['date']))
{
	$date=$_POST['date'];
	if($date=="")
	{
		$date=date("Y-m-d");
	}
}
else
{
	$date=date("Y-m-d");

}
if(isset($_POST['text']))
{
	$text=$_POST['text'];
	if($text=="")
	{
		$flag=false;
		echo "Поле контента не должно быть пустым.";
	}
}
else
{
	$flag=false;
	echo "Поле заголовок должно быть заполнено.";
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