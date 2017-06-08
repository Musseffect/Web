<?php session_start();?>
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
<?php require_once("menu.php");?>
<input type="text" id="title" maxlength="40">
<input type="number" id="date" min="1971" max="<?php echo date('Y'); ?>">
<input type="text" id="site" maxlength="40">
<input type="text" id="description" maxlength="255">
<input type="button" value="Добавить" class="button_custom">
</body>
</html>