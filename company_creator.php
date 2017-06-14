<?php session_start();
require_once "dbconnection.php";

if(!isset($_SESSION['companies_perms']))
{
	header("location: companies.php");
	return;
}else if($_SESSION['companies_perms']!=1)//not admin
{
	header("location: companies.php");
	return;
}
$title_error="";
$date_error="";
$description_error="";
$logo_error="";
$title="";
$date=date('Y');
$site="";
$description="";
$error="";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
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
	$title_error="Введите название компании";
	$flag=false;
}
if(empty($date))
{
	$date_error="Введите дату";
	$flag=false;
}else if($date>date('Y'))
{
	$date_error="Тайм тревел недопустим!";
	$flag=false;
}
if(empty($description))
{
	$description_error="Введите описание";
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
					$logo_error="Можно загружать только изображения";
			}else
			{
				$image = getimagesize($filePath);
				if (filesize($filePath) > (1024*1024*2))
				{
					$flag=false;
				 	$logo_error='Размер изображения не должен превышать 2 Мбайт';
				}
				else
				{
					$name = md5_file($filePath);
					$extension = image_type_to_extension($image[2]);
					$format = str_replace('jpeg', 'jpg', $extension);
					if (!move_uploaded_file($filePath, __DIR__ . '/img/' . $name . $format)) {
						$flag=false;
   				 		$error='При записи изображения на диск произошла ошибка';
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
    		$error=$outputMessage;
			$flag=false;
			}
		}else
		{
			$name="";
		}
}
if($flag)
{
/*$title=htmlspecialchars($_POST['title']);
$date=htmlspecialchars($_POST['date']);
$site=htmlspecialchars($_POST['site']);
$description=htmlspecialchars($_POST['description']);*/
$query="INSERT into companies SET
            company_name='".$title."',
            site='".$site."',
            year='".$date."',
            logo='".$name."',
            company_description='".$description."'";
            $result=mysqli_query($conn,$query);
if($result)
{
	header("Location: companies.php?id=".mysqli_insert_id($conn));
}else
{
	$error='Не удалось добавить компанию.'.mysql_error();
}
}else
{


}



}

?>
<!DOCTYPE html>
<html>
<head>
<title>Добавление компании</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/article.css">
<link rel="stylesheet" type="text/css" href="css/modal.css">
<link rel="stylesheet" type="text/css" href="css/company.css">
</head>
<body>
<?php require_once("menu.php");?>

<form method="POST" id="company_add_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
<h3 class="page_info">Добавление компании</h3>
Название<br>
<input type="text" id="company_add_title" name="title" value="<?php echo $title;?>" maxlength="40"><span class="form_error"><?php echo $title_error;?></span>
<br>Год создания<br>
<input type="number" id="date" name="date" min="1971" max="<?php echo date('Y'); ?>" value="<?php echo $date;?>">
<br>Сайт компании<br>
<input type="text" id="site" name="site" value="<?php echo $site;?>" maxlength="40">
<br>Описание<br>
<input type="text" id="description" name="description"  value="<?php echo $description;?>" maxlength="255"><span class="form_error"><?php echo $description_error;?></span><br>
Логотип<br>
<input type="file" id="logo" name="logo" multiple="false" accept="image/*" value="Выберите изображение"><span class="form_error"><?php echo $logo_error;?></span><br>
<input type="submit" id="company_create_button" value="Добавить" class="button">
<span class="error"><?php echo $error;?></span>
</form>
</body>
</html>