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
<?php include_once("menu.php");


echo "";











?>

<div id="error">
</div>
<p>
	Заголовок новости <br>
    <input type="text"  style="border:1px silver solid; width:160px;" name="title" id="title">
</p>
<p>
   Новость<br>
   <textarea style="width:650px; height:260px;"  name="text" id="content" cols="80" ></textarea>
</p>
 <input type="submit" class="buttons" onclick="send()"  id="submit" value="Подтвердить">
</body>
</html>
