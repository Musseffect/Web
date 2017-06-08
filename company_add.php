<?php
session_start();?>









<?php
require_once "dbconnection.php";
if(!isset($_SESSION['role']))
{
	echo "У вас нет прав на совершение этого действия.";
	return;
}else if($_SESSION['role']!=0)//not admin
{
	echo "У вас нет прав на совершение этого действия.";
	return;
}
$flag=true;

if(isset($_POST['title']))
{
	if()


}else
{


}
if(isset($_POST['date']))
{
	if()


}else
{
	$flag=false;
}
if(isset($_POST['site']))
{
	$site=htmlspecialchars($_POST['site']);
}else
{
	$flag=false;
}
<form method="POST" id="company_add_form" action="company_add.php" enctype="multipart/form-data">
<input type="file" id="logo" name="logo" multiple="false" accept="image/*" value="Выберите изображение">
<br>Название<br>
<input type="text" id="title" maxlength="40">
<br>Год создания<br>
<input type="number" id="date" min="1971" max="<?php echo date('Y'); ?>">
<br>Сайт компании<br>
<input type="text" id="site" maxlength="40">
<br>Описание<br>
<input type="text" id="description" maxlength="255"><br>











		if((!empty($_FILES['logo'])))
		{
			if(($_FILES['logo']['error']==0))
			{
				$filePath=basename($_FILES['logo']['temp_name']);
			$ext=substr();
			$fi = finfo_open(FILEINFO_MIME_TYPE);
			$mime = (string) finfo_file($fi, $filePath);
			if (strpos($mime, 'image') === false) 
				{
					$false=false;
					echo "Можно загружать только изображения.";
			}else
			{
				if (filesize($filePath) > (1024*1024*2)))
				{
					$flag=false;
				 echo 'Размер изображения не должен превышать 2 Мбайт.';
				}
				else
				{
				$name = md5_file($filePath);
				$extension = image_type_to_extension($image[2]);
				$format = str_replace('jpeg', 'jpg', $extension);
				if (!move_uploaded_file($filepath, __DIR__ . '/img/' . $name . $format)) {
					$flag=false;
   				 	echo 'При записи изображения на диск произошла ошибка.';
					}

				}
			}
			}else($_FILES['logo']['error']!==UPLOAD_ERR_OK)
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
  		  	$outputMessage = isset($errorMessages[$errorCode]) ? $errorMessages[$errorCode] : $unknownMessage;
    		echo $outputMessage;
			$flag=false;
			}
		}else
		{
			$name="";
		}


if($flag)
{
$query='';
}else
{


}
?>