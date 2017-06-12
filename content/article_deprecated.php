<!DOCTYPE html>
<html>
<head>
<title>Article</title>
</head>
<body>
<?php 

if(isset($_GET['id']))
{
$id=$_GET['id'];
	require_once('dbconnection.php');
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
	}
	echo "Запрашиваемая вами страница не существует";

}else
{
	echo "Запрашиваемая вами страница не существует";
}
?>



</div>
</body>
</html>