<?php
$file = file_get_contents('/var/www/.digitalocean_password', true);
preg_match('/"([^"]+)"/', $file, $m); 

$user = 'root';
$password = $m[1];
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
?>
