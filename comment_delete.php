<?php
session_start();
require_once "dbconnection.php";
if(!isset($_GET['id']))
{
	echo 'Invalid request';
	return;
}
if(isset($_SESSION['id']))
{
	$flagcomments=false;
	if(isset($_SESSION['delete_comments']))
	{
		$flagcomments=$_SESSION['delete_comments'];
	}
	$query="SELECT ID_user from comments where id=".$_GET['id'];
	$result=mysqli_query($conn,$query);
	if($result)
	{
		if(mysqli_num_rows ($result)!=0)
		{
			$row=mysqli_fetch_row($result);
			if($_SESSION['id']==$row[0])
			{
				$flagcomments=true;
			}
		}
	}
	if($flagcomments=true)
	{
	$query="DELETE from comments where id=".$_GET['id'];
	$result=mysqli_query($conn,$query);
	if(!$result)
	{
		echo "Не удалось удалить комментарий.";
	}else
	{
		echo "ok";
	}
	}else
	{
		echo "Невозможно удалить данный комментарий.";
	}

}else
{
	header("Location: articles.php");
}





?>