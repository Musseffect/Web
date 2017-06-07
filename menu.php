<?php session_start();>
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