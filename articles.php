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
<?php
require_once("dbconnection.php");
$query="select ID_article as I,article_title as T,article_content as C,date as D from articles";
$result=mysqli_query($conn,$query);
	if($result!=false)
	{
		while($row=mysqli_fetch_array($result))
		{
			echo '<article class="article_box"><a href=article.php?id='.$row[0].'><div class="article_title">'.$row["T"]. '</div></a>';
			echo '<div class="article_date">'.$row[3].'</div>';
			echo '<div class="article_preview">';

			$string = strip_tags($row[2]);

				if (strlen($string) > 500) {

    			$stringCut = substr($string, 0, 500);
    			$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="article.php?id='.$row[0].'">Прочитать далее</a>'; 
				}
			echo $string;
			echo '</div>';
			echo '</article>';	

		}
	}
?>
</body>
</html>
