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
<link rel="stylesheet" type="text/css" href="css/modal.css">
<link rel="stylesheet" type="text/css" href="css/article.css">
<link rel="stylesheet" type="text/css" href="css/news.css">
<script src="./js/article_edit.js" type="text/javascript" async></script>
</head>
<body>
<div class="content">
<?php require_once("menu.php");
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$query='select * from articles where ID_article='.$id;
	$result=mysqli_query($conn,$query);
	if($result!=false)
	{
		if(mysqli_num_rows ($result)==0)
		{
		echo "Запрашиваемая вами страница не существует";
		}{
		$row=mysqli_fetch_row($result);
		echo '
		<div class="article_editor"><div id="article_edit_error">
		</div>
		<p>
		Заголовок статьи<br>
    	<input type="text" style="border:1px silver solid; " value="'.$row[1].'" name="title" id="title">
		</p>
		<p>
  		Содержимое статьи<br>
  		<textarea   name="text" id="text" cols="80" >'.$row[2].'</textarea>
		</p></div>
		<div class="center_button">
 		<input type="submit" class="button" onclick="send('.$id.')"  id="submit" value="Подтвердить"></div>';
 	}
	}else
	echo "Запрашиваемая вами страница не существует";

}
?>
</div>

<?php require_once("footer.php");?>
</body>
</html>
