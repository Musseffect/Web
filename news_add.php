<?php
require_once "dbconnection.php";
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
$query="INSERT into news SET
            title='".$title."',
            date='".$date."',
            text='".$text."'";
            $result=mysqli_query($conn,$query);
if($result)
{
	echo "ok";
}else
{
	echo "Не удалось добавить новость.";
	echo mysql_error();
}
?>