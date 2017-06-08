<?php 
session_start();
require_once "dbconnection.php";
if(!isset($_SESSION['role']))
{
	header("Location: articles.php");
	return;
}else if($_SESSION['role']!=0)//not admin
{
	header("Location: articles.php");
	return;
}
$query="";





















?>