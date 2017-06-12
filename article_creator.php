<?php
session_start();
if(!isset($_SESSION['articles_perms']))
{
	header('Location: articles.php');
}else if($_SESSION['articles_perms']!=1)//not admin
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
<div class="article_editor">
<h2 class="page_info">Создание статьи</h2>
<p>
	Заголовок статьи<br>
    <input type="text" style="border:1px silver solid; " name="title" id="title">
</p>
<p>
   Содержимое статьи<br>
   <textarea style=" height:260px;"  name="text" id="text" cols="80" ></textarea>
</p>
<div class="center_button">
 <input type="submit" class="button" onclick="send()"  id="submit" value="Подтвердить">
 </div>
<div id="article_add_error" class="error">
</div>
</div>

 </div>
</body>
<?php require_once("footer.php");?>
</html>

