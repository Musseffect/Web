<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<title>cloudcomp.ru</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/modal.css">
<link rel="stylesheet" type="text/css" href="css/article.css">
</head>
<body>
<div class="content">
<?php include_once("menu.php");?>
<div id="last_articles"><h2 class="page_info">Последние статьи</h2>
<!--<p id="last_articles_title">Последние статьи</p>-->
<?php
'<div id="articles_column"><h2 class="page_info">Статьи</h2>';
	$query="select ID_article as I,article_title as T,article_content as C,date as D from articles order by date desc limit 5";
	$result=mysqli_query($conn,$query);
	if($result!=false)
	{
		if(mysqli_num_rows ($result )==0)
		{
			echo '<div>К сожалению на данный момент на сайте нет ни одной статьи.</div>';
		}else
		{
			while($row=mysqli_fetch_array($result))
			{
				echo '<article class="article_box"><div class="article_title"><a href=articles.php?id='.$row[0].'>'.$row["T"]. '</a></div>';
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
	}
?>
</div>
</div>
<?php require_once("footer.php");?>
</body>
</html>

