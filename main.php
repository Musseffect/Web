<!DOCTYPE html>
<html>
<head>
<title>this is main page</title>
<meta charset="windows-1251">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/modal.css">
<script src="/js/loginform.js">
</script>
</head>
<body>
<div id="topbar">
<?php
session_start();
if (isset($_SESSION['name'])){
echo "<section style=\"float:right;display:block;height:100%;overflow:hidden;\">
<ul>
<li class=\"top-li\"><a class=\"user-menu-item top-item\">".$_SESSION['name']."<i style=\"position:absolute;right:5px;\"></i></a></li>
<li class=\"top-li\"><a class=\"top-item\" href=\"exit.php\">Выход<i style=\"position:absolute;right:5px;\"></i></a></li>
</ul>
</section>";
}
else
{

echo '<section style="float:right;display:block;height:100%;overflow:hidden;">
<ul>
<li class="top-li"><a class="top-item" id="auth">Авторизация<i style="position:absolute;right:5px;"></i></a></li>
<li class="top-li"><a class="top-item">Регистрация<i style="position:absolute;right:5px;"></i></a></li>
</ul>
</section>';
}
?>
</div>
<header id="header">
	<div style="width:100%;height:auto;display:table"><div style="width:30%;height:80px;float:left;"><a style="margin:auto; " href="/" title="home"><img style="height:100%"></a></div>
	<div id="menubar">
		<nav id="menu"><ul class="list">
<li class="listelement"><a class="btn-item" href="news.php">Новости<i style="position:absolute;right:5px;"></i></a></li>
		<li class="listelement"><a class="btn-item" href="articles.php">Cтатьи<i style="position:absolute;right:5px;"></i></a></li>
<li class="listelement"><a class="btn-item">Что такое Облачные вычисления<i style="position:absolute;right:5px;"></i></a></li>
<li class="listelement"><a class="btn-item">Топ 10<i style="position:absolute;right:5px;"></i></a></li>
<li class="listelement"><a class="btn-item">Типы облачных вычислений<i style="position:absolute;right:5px;"></i></a></li>
		</ul></nav>
	</div></div>
</header>
<div id="myModal" class="modal">
<div class="modal-content">
  <div class="modal-header">
    <span class="close">&times;</span>
    <h2>Авторизация</h2>
  </div>
  <div class="modal-body">
	<p>Введите логин<input type="text" id="login" name="login"></p>
	<p>Введите пароль<input type="password" id="password" name="password"></p>
	<input type="button" name="submit" id="btn-submit" value="Авторизоваться" onclick="subm()">
  </div>
  <div class="modal-footer">
   <div id="error"></div>
  </div>
</div>
</div>
<div id="last_news">
<p id="last_news_title">Последние статьи</p>
<?php
	$query="select id as I,date as D,title as T,text as P from news limit 5";
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
			echo '<article class="news_box"><a href=news.php?id='.$row[0].'><div class="article_title">'.$row["T"]. '</div></a>';
			echo '<div class="article_date">'.$row[3].'</div>';
			echo '<div class="article_preview">';

			$string = strip_tags($row[2]);

				if (strlen($string) > 500) {

    			$stringCut = substr($string, 0, 500);
   			 // make sure it ends in a word so assassinate doesn't become ass...
    			$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="article.php?id='.$row[0].'">Прочитать далее</a>'; 
				}
			echo $string;
			echo '</div>';
			echo '</article>';	

		}
		}
	}
?>
</div>
<div id="last_articles">
<p id="last_articles_title">Последние статьи</p>
<?php
	$query="select ID_article as I,article_title as T,article_content as C,date as D from articles limit 5";
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
	}
?>
</div>
<footer>
</footer>
</body>
</html>

