<?php session_start();?>
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
<script src="./js/article_remove.js" type="text/javascript" async>
</script>
<script src="./js/modal.js" type="text/javascript" async></script>
</head>
<body>
<div class="content">
<?php
require_once("menu.php");
require_once("dbconnection.php");
$flag=false;
if(isset($_SESSION['role']))
{
	if($_SESSION['role']==0)
	{
		$flag=true;

		echo '
<script src="./js/article_remove.js" type="text/javascript" async>
</script>';
	}
}
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
		}else{
		$row=mysqli_fetch_row($result);
		echo '<article class="article_box_full"><div class="article_title_full">'.$row[1]. '</div>';
			echo '<div class="article_date_full">'.$row[3].'</div><hr>';
			echo '<div class="article_content"><pre>';
			echo $row[2];
			echo '</pre></div>';
			echo '</article>';	
			if($flag)
			{
			echo '<div style="padding: 10px 30px 10px 30px;"><input type="button" onclick="invoke_modal(article_remove,this)" id="'.$id.'" value="Удалить">
			<a href="article_edit.php?id='.$id.'"><input type="button"  value="Редактировать"></a>
			</div>';
			}
		}
	}else
	echo "Запрашиваемая вами страница не существует";

}else
{
$query="select ID_article as I,article_title as T,article_content as C,date as D from articles order by date desc";
$result=mysqli_query($conn,$query);
	if($result!=false)
	{	
		{
			if($flag==true)//admin
			{
echo '<div class="center_button"><a href="article_creator.php" class="a_button">Добавить статью</a></div>';
				while($row=mysqli_fetch_array($result))
			{
			echo '<article class="article_box_admin"><div class="article_title"><a href=articles.php?id='.$row[0].'>'.$row[1]. '</a></div>';
			echo '<div class="article_date">'.$row[3].'</div>';
			echo '<div class="article_preview">';

			$string = strip_tags($row[2]);

				if (strlen($string) > 500) {

    			$stringCut = substr($string, 0, 500);
    			$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="articles.php?id='.$row[0].'">Прочитать далее</a>'; 
				}
			echo $string;
			echo '</div>';
			echo '<a href="article_edit.php?id='.$row[0].'"><input type="button"  class="edit_article" onclick=""></input></a>';
			echo '<input type="button" id="'.$row[0].'" class="delete_article" onclick="invoke_modal(article_remove,this)"></input>';
			echo '</article>';	
			}
			}
			else
			{
		while($row=mysqli_fetch_array($result))
		{
			echo '<article class="article_box"><div class="article_title"><a href=articles.php?id='.$row[0].'>'.$row[1]. '</a></div>';
			echo '<div class="article_date">'.$row[3].'</div>';
			echo '<div class="article_preview"><pre>';

			$string = strip_tags($row[2]);

				if (strlen($string) > 500) {

    			$stringCut = substr($string, 0, 500);
    			$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="articles.php?id='.$row[0].'">Прочитать далее</a>'; 
				}
			echo $string;
			echo '</pre></div>';
			echo '</article>';	

		}
	}
	}
	}
}

?>
<?php 
if($flag==true)//admin
			{
echo '
<div id="myModalConfirm">
<div id="modal-confirm">
<p>Вы уверены?</p>
<input type="button" value="Да" onclick="accept_modal()">
<input type="button" value="Нет" onclick="reject_modal()">
</div>
</div>
<div id="throbber">
<ul class="loader">
  <li></li><li></li><li></li><li></li>
  <li></li><li></li><li></li><li></li>
</ul>
</div>';
}
?></div>
<?php require_once("footer.php");?>
</body>
</html>
