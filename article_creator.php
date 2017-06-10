<?php
session_start();
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
<script src="./js/article_add.js" type="text/javascript" async>
</script>
<title>this is news creator page</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/modal.css">
<link rel="stylesheet" type="text/css" href="css/article.css">
<link rel="stylesheet" type="text/css" href="css/news.css">
</head>
<body>
<div class="content">
<?php include_once("menu.php");?>
<div id="article_add_error">
</div>
<p>
	Заголовок статьи<br>
    <input type="text"  style="border:1px silver solid; width:160px;" name="title" id="title">
</p>
<p>
   Содержимое статьи<br>
   <textarea style="width:650px; height:260px;"  name="text" id="text" cols="80" ></textarea>
</p>
 <input type="submit" class="buttons" onclick="send()"  id="submit" value="Подтвердить">
 </div>
</body>
<?php require_once("footer.php");?>
</html>

