<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<title>
<?php if(isset($_GET['id']))
{?>Компания
<?php
}else{?>
Компании
<?php }?></title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/article.css">
<link rel="stylesheet" type="text/css" href="css/modal.css">
<link rel="stylesheet" type="text/css" href="css/company.css">
</head>
<body>
<script src="./js/modal.js" type="text/javascript" async></script>
<div class="content">
<?php require_once("menu.php");
//require_once("dbconnection.php");
$flag=false;
if(isset($_SESSION['companies_perms']))
{
	if($_SESSION['companies_perms']==1)
	{
		$flag=true;
	}
}
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$query="select id as I,company_name as N,year as Y,site as S,company_description as D from companies where id=".$id;
	$result=mysqli_query($conn,$query);
	if($result!=false)
	{
		if(mysqli_num_rows ($result)==0)
		{
		echo "Запрашиваемая вами страница не существует";
		}else{
		$row=mysqli_fetch_row($result);
	echo '<div id="company_block">
	<h3 class="page_info">Компания</h3>
<div id="company_box">
<div id="company_name">'.$row[1].'</div>
<hr>
<dl>
<dt>Год основания</dt>
<dd>'.$row[2].'</dd>';
if(!empty($row[3]))
{echo'<hr style="border-top:1px dashed black;"><dt>Сайт</dt>
<dd><a href="http://'.$row[3].'">'.$row[3].'</a></dd>';}
echo '<script src="./js/company_remove.js" type="text/javascript" async></script>';
echo '</dl>
</div>
<div style="font-size:120%;">О Компании</div>
<hr>
<p id="company_description">'.$row[4].'</p>
</div>';
			if($flag)
			{
			echo '<div style="padding: 10px 30px 10px 30px;"><a href="#/" onclick="invoke_modal(company_remove,this)"" id="'.$id.'" class="a_button">Удалить</a>
			</div>';
			}
		}
	}else
	echo "Запрашиваемая вами страница не существует";

}else
{
	$query="select id as I,company_name as N,company_description as D,logo as L  from companies order by N asc";
	$result=mysqli_query($conn,$query);
	if($result!=false)
	{
			echo '<div class="companies_block"><h3 class="page_info">Компании</h3>';
		if($flag)
		echo '<div class="center_button"><a href="company_creator.php" style="text-decoration:none;"><input type=button value="Добавить компанию" class="button"></a></div>';
		if(mysqli_num_rows ($result )==0)
		{
		}else
		{
				while($row=mysqli_fetch_array($result))
			{
				echo '
			<div class="company_preview_block">
			<div class="company_logo">';
			if(!empty($row[3]))
			echo '<img class="company_logo_img" src="img/'.$row[3].'">';
			echo '</div>
			<div class="company_item">
			<div class="company_name_preview"><a href="companies.php?id='.$row[0].'">'.$row[1].'</a></div>';
			$string=$row[2];
				if (strlen($string) > 500) {
    			$stringCut = substr($string, 0, 500);
    			$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
				}
			echo '<div class="company_preview_description">'.$string.'</div>
			</div>
			</div>';
			}
	}
	echo '</div>';
}
}
 ?>
 <div id="myModalConfirm" class="modal-animate-opacity">
<div id="modal-confirm">
<p>Вы уверены?</p>
<div>
<input type="button" value="Да" onclick="accept_modal()" class="modal_button">
<input type="button" value="Нет" onclick="reject_modal()" class="modal_button">
</div>
</div>
</div>
 <div id="modal_overlay_error" class="modal-animate-opacity">
<div class="modal-content">
<div id="modal_error">
</div>
<input type="button" value="Закрыть" id="error_button" onclick="close_modal_error()" class="button">
</div>
</div>
 <div id="throbber">
<ul class="loader">
  <li></li><li></li><li></li><li></li>
  <li></li><li></li><li></li><li></li>
</ul>
</div>
</div>

<?php require_once("footer.php");?>
</body>
</html>
