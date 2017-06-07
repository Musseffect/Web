<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<title>this is main page</title>
<meta charset="windows-1251">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/modal.css">
<link rel="stylesheet" type="text/css" href="css/article.css">
<link rel="stylesheet" type="text/css" href="css/news.css">
</head>
<body>
<?php
require_once("menu.php");
require_once("dbconnection.php");
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$query='select * from articles where ID_article='.$id;
	$result=mysqli_query($conn,$query);
	if($result!=false)
	{
		$row=mysqli_fetch_row($result);
		echo '<article class="article_box_full"><div class="article_title_full">'.$row[1]. '</div></a>';
			echo '<div class="article_date_full">'.$row[3].'</div>';
			echo '<div class="article_content">';
			echo $row[2];
			echo '</div>';
			echo '</article>';	
	}else
	echo "Запрашиваемая вами страница не существует";

}else
{
$query="select ID_article as I,article_title as T,article_content as C,date as D from articles order by date desc";
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
			echo '<article class="article_box"><a href=articles.php?id='.$row[0].'><div class="article_title">'.$row["T"]. '</div></a>';
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
}

?>
</body>
</html>
