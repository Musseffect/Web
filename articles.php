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
<link rel="stylesheet" type="text/css" href="css/comments.css">
<script src="./js/article_remove.js" type="text/javascript" async>
</script>
<script src="./js/modal.js" type="text/javascript" async></script>
</head>
<body>
<div class="content">
<?php
require_once("menu.php");
require_once("dbconnection.php");
function comments($array,$number)//21 ,2-4, 5-20, 
{
	if(($number%100>4 && $number%100<21)||$number%10==0||$number%10>4)
	{
		echo $array[2];
	}else
	{
		if($number%10==1)
			echo $array[0];
		else
			echo $array[1];
	}
}

$flag=false;
if(isset($_SESSION['articles_perms']))
{
	if($_SESSION['articles_perms']==1)
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
		echo '<article class="article_box_full"><h3 class="page_info">Статья</h3><div class="article_title_full">'.$row[1]. '</div>';
			echo '<div class="article_date_full">'.$row[3].'</div><hr>';
			echo '<div class="article_content"><pre>';
			echo $row[2];
			echo '</pre></div>';
			echo '</article>';	
			if($flag)
			{
			echo '<div style="padding: 10px 30px 10px 20px;"><input type="button" onclick="invoke_modal(article_remove,this)" id="'.$id.'" value="Удалить" class="button">
			<a href="article_edit.php?id='.$id.'" style="text-decoration:none;"><input type="button" value="Редактировать" class="button"></a>
			</div>';
			}
			if(isset($_SESSION['name']))
			{
				//показать форму добавления комментария
				echo '<div id="comment_add_box">
				<textarea id="comment_add_text"></textarea>
				<input id="add_commentary" class="button" type="button" value="Добавить комментарий" onclick="show_error(\'lol\')">
				</div>';
			}
			$query='select c.ID_user,c.id,c.comment,u.Username from comments as c INNER JOIN users as u on c.ID_user=u.User_ID where ID_article='.$id;
			$result=mysqli_query($conn,$query);
			$flagcomments=false;
			if(isset($_SESSION['delete_comments']))
			{
				$flagcomments=false;
			}
			if($result)
			{
				$count=mysqli_num_rows($result);

				echo '<div class="comments_count">'.$count.' ';
				comments(array('комментарий','комментария','комментариев'),$count);
				echo '</div>';
			while($row=mysqli_fetch_array($result))
			{

			}

			}
			//вывести комментарии
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
			echo '<div id="articles_column"><h2 class="page_info">Статьи</h2>';
			if($flag==true)//admin
			{
		echo '<div class="center_button"><a href="article_creator.php" style="text-decoration:none;"><input type=button value="Добавить статью" class="button"></a></div>';
				while($row=mysqli_fetch_array($result))
			{
			echo '<article class="article_box">';
			echo '<a href="article_edit.php?id='.$row[0].'"><input type="button"  class="edit_article" onclick=""></input></a>';
			echo '<input type="button" id="'.$row[0].'" class="delete_article" onclick="invoke_modal(article_remove,this)"></input>';
			echo '<div class="article_title"><a href=articles.php?id='.$row[0].'>'.$row[1]. '</a></div>';
			echo '<div class="article_date">'.$row[3].'</div>';
			echo '<div class="article_preview">';

			$string = strip_tags($row[2]);

				if (strlen($string) > 500) {

    			$stringCut = substr($string, 0, 500);
    			$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="articles.php?id='.$row[0].'">Прочитать далее</a>'; 
				}
			echo $string;
			echo '</div>';
		
			echo '</article>';	
			}
			}
			else
			{
		while($row=mysqli_fetch_array($result))
		{
			echo '<article class="article_box"><div class="article_title"><a href=articles.php?id='.$row[0].'>'.$row[1]. '</a></div>';
			echo '<div class="article_date">'.$row[3].'</div>';
			echo '<div class="article_preview">';

			$string = strip_tags($row[2]);

				if (strlen($string) > 500) {

    			$stringCut = substr($string, 0, 500);
    			$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="articles.php?id='.$row[0].'">Прочитать далее</a>'; 
				}
			echo $string;
			echo '</div>';
			echo '</article>';	

		}
	}
		echo '</div>';
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
<div>
<input type="button" value="Да" onclick="accept_modal()" class="modal_button">
<input type="button" value="Нет" onclick="reject_modal()" class="modal_button">
</div>
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
<div id="modal_overlay_error">
<div class="modal-content">
<div id="modal_error">
</div>
<input type="button" value="Закрыть" id="error_button" onclick="close_modal_error()" class="button">
</div>
</div>
<?php require_once("footer.php");?>
</body>
</html>