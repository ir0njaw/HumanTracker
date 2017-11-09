<?php
include ('../bd.php');
if(isset($_GET['id'])){$id = $_GET['id'];}

if($id =='1'){	
	$query = mysqli_query($link, "TRUNCATE logs_visited");
	header('Location: http://localhost/admin/phishing/');
}
elseif($id =='2'){
	$query1 = mysqli_query ($link, "TRUNCATE logs_phishing");
	header('Location: http://localhost/admin/phishing/');
}
?>