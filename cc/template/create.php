<?php

$user = 'root';
$password = 'root';
$db = 'dbcc';
$host = 'localhost';
$port = 3306;

$link = mysqli_init();

$success = mysqli_real_connect(
   $link, 
   $host, 
   $user, 
   $password, 
   $db,
   $port
);

$template_name = htmlspecialchars($_POST['name']);
$filename = htmlspecialchars($_POST['name'].".jpg");
$filename_logo = htmlspecialchars($_POST['name']."_logo.jpg");
$filename_zip = htmlspecialchars($template_name.".zip");
$uploaddir = htmlspecialchars($_POST['name']."/");
$description = htmlspecialchars($_POST['description']);

$destination_preview = $uploaddir . basename($filename_logo);
$destination_img = $uploaddir . basename($filename);
$destination_zip  = $uploaddir . basename($filename_zip);

if(is_dir($_POST['name']) ==true){
	echo 'Шаблон с таким именем уже есть';
}
else{
	mkdir($uploaddir, 0700);
	if(move_uploaded_file($_FILES['preview']['tmp_name'], $destination_preview) && move_uploaded_file($_FILES['img']['tmp_name'], $destination_img) && move_uploaded_file($_FILES['zip']['tmp_name'], $destination_zip)){
	

	mysqli_query($link, "INSERT INTO template(filename,filename_logo,zip,dir,description) VALUES ('$filename','$filename_logo','$filename_zip','$uploaddir','$description')") or die(mysqli_error($link));
	header('Location: index.php');
}

}



?>