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
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$query='select * from articles where ID_article='.$id;
	$result=mysqli_query($conn,$query);
	if($result!=false)
	{
		$row=mysqli_fetch_row($result);
		echo '<div id="article_edit_error">
		</div>
		<p>
		Заголовок статьи<br>
    	<input type="text"  style="border:1px silver solid; width:160px;" value="'.$row[1].'" name="title" id="title">
		</p>
		<p>
  		Содержимое статьи<br>
  		<textarea style="width:650px; height:260px;"  name="text" id="text" cols="80" '.$row[2].'</textarea>
		</p>
 		<input type="submit" class="buttons" onclick="send()"  id="submit" value="Подтвердить">';
	}else
	echo "Запрашиваемая вами страница не существует";

}
?>
</body>
</html>
