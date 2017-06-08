<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/modal.css">
<link rel="stylesheet" type="text/css" href="css/article.css">
<link rel="stylesheet" type="text/css" href="css/news.css">
<title>Article</title>
</head>
<body>
<?php
require_once("menu.php");
require_once("dbconnection.php");
if(isset($_GET['id']))
{
$id=$_GET['id'];
	require_once('dbconnection.php');
	$query='select id as I,date as D,title as T,text as P from news where id='.$id;
	$result=mysqli_query($conn,$query);
	if($result!=false)
	{
		$row=mysqli_fetch_row($result);
		echo '<article class="news_box_full"><div class="news_title_full">'.$row[2]. '</div></a>';
			echo '<div class="news_date_full">'.$row[1].'</div>';
			echo '<div class="news_content">';
			echo $row[3];
			echo '</div>';
			echo '</article>';	
	}else
	echo '<div class="page_error">Запрашиваемая вами страница не существует</div>';

}else
{
	$query="select id as I,date as D,title as T,text as P from news order by date desc limit 5";
	$result=mysqli_query($conn,$query);
	if($result!=false)
	{
		if(mysqli_num_rows ($result )==0)
		{
			echo '<div>К сожалению на данный момент на сайте нет ни одной новости.</div>';
		}else
		{
		while($row=mysqli_fetch_array($result))
		{
			echo '<article class="news_box"><a href=news.php?id='.$row[0].'><div class="news_title">'.$row[2]. '</div></a>';
			echo '<div class="news_date">'.$row[1].'</div>';
			echo '<div class="news_preview">';

			$string = strip_tags($row[3]);

				if (strlen($string) > 500) {

    			$stringCut = substr($string, 0, 500);
    			$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="news.php?id='.$row[0].'">Прочитать далее</a>'; 
				}
			echo $string;
			echo '</div>';
			echo '</article>';	
		}
		}
	}
}
?>



</div>
</body>
</html>