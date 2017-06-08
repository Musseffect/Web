<?php session_start();
require_once "dbconnection.php";
if(!isset($_SESSION['role']))
{
	header("location: companies.php");
	return;
}else if($_SESSION['role']!=0)//not admin
{
	header("location: companies.php");
	return;
}
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$general_error="";
$flag=true;
if(!(isset($_POST['title'])&&isset($_POST['date'])&&isset($_POST['site'])))
{
	header("location: companies.php");
	return;
}
$title=htmlspecialchars($_POST['title']);
$date=htmlspecialchars($_POST['date']);
$site=htmlspecialchars($_POST['site']);
$description=htmlspecialchars($_POST['description']);
if(empty($title))
{

	$flag=false;
}
if(empty($date))
{

	$flag=false;
}
if(empty($site))
{

	$flag=false;
}
if(empty($description))
{

	$flag=false;
}
$name="";
if($flag)
	{	if((!empty($_FILES['logo']))&&(!empty($_FILES['logo']['name'])))
		{
			print_r($_FILES['logo']);
			if(($_FILES['logo']['error']==0))
			{
				$filePath=$_FILES['logo']['tmp_name'];
				echo $filePath;
			$fi = finfo_open(FILEINFO_MIME_TYPE);
			$mime = (string) finfo_file($fi, $filePath);
			if (strpos($mime, 'image') === false) 
			{
					$false=false;
					echo "Можно загружать только изображения.";
			}else
			{
				$image = getimagesize($filePath);
				if (filesize($filePath) > (1024*1024*2))
				{
					$flag=false;
				 	echo 'Размер изображения не должен превышать 2 Мбайт.';
				}
				else
				{
					$name = md5_file($filePath);
					$extension = image_type_to_extension($image[2]);
					$format = str_replace('jpeg', 'jpg', $extension);
					if (!move_uploaded_file($filePath, __DIR__ . '/img/' . $name . $format)) {
						$flag=false;
   				 		echo 'При записи изображения на диск произошла ошибка.';
					}
					$name=$name.$format;

				}
			}
			}else
			{
			  $errorMessages = [
       		UPLOAD_ERR_INI_SIZE   => 'Размер файла превысил значение upload_max_filesize в конфигурации PHP.',
       	 	UPLOAD_ERR_FORM_SIZE  => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE в HTML-форме.',
       		 UPLOAD_ERR_PARTIAL    => 'Загружаемый файл был получен только частично.',
        	UPLOAD_ERR_NO_FILE    => 'Файл не был загружен.',
        	UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка.',
        	UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск.',
        	UPLOAD_ERR_EXTENSION  => 'PHP-расширение остановило загрузку файла.',
   	 		];
    	 	$unknownMessage = 'При загрузке файла произошла неизвестная ошибка.';
  		  	$outputMessage = isset($errorMessages[$_FILES['logo']['error']]) ? $errorMessages[$_FILES['logo']['error']] : $unknownMessage;
    		echo $outputMessage;
			$flag=false;
			}
		}else
		{
			$name="";
		}
}
if($flag)
{
echo $name;
$title=htmlspecialchars($_POST['title']);
$date=htmlspecialchars($_POST['date']);
$site=htmlspecialchars($_POST['site']);
$description=htmlspecialchars($_POST['description']);
$query="INSERT into companies SET
            company_name='".$title."',
            site='".$site."',
            year='".$date."',
            logo='".$name."',
            company_description='".$description."'";
            $result=mysqli_query($conn,$query);
if($result)
{
	//header("Location: companies.php?id=".mysqli_insert_id($conn));
}else
{
	echo "Не удалось добавить компанию.";
	echo mysql_error();
}
}else
{


}



}

?>
<!DOCTYPE html>
<html>
<head>
<title>this is main page</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/article.css">
<link rel="stylesheet" type="text/css" href="css/modal.css">
<link rel="stylesheet" type="text/css" href="css/company.css">
</head>
<body>
<?php require_once("menu.php");?>
<form method="POST" id="company_add_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
<input type="file" id="logo" name="logo" multiple="false" accept="image/*" value="Выберите изображение">
<br>Название<br>
<input type="text" id="title" name="title" maxlength="40">
<br>Год создания<br>
<input type="number" id="date" name="date" min="1971" max="<?php echo date('Y'); ?> " value="<?php echo date('Y'); ?> ">
<br>Сайт компании<br>
<input type="text" id="site" name="site" maxlength="40">
<br>Описание<br>
<input type="text" id="description" name="description" maxlength="255"><br>
<input type="submit" value="Добавить" class="button_custom">
</form>
</body>
</html>