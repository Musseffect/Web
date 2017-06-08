<?php session_start();
if(!isset($_SESSION['role']))
{
	header('Location: articles.php');
}else if($_SESSION['role']!=0)//not admin
{
	header('Location: articles.php');//redirect to main;
}

?>
<!DOCTYPE html>
<html>
<head>
<title>this is main page</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/article.css">
</head>
<body>
<?php require_once("menu.php");
//check get






?>
</body>
</html>
