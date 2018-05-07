<?php
include ('cc/bd.php');
$id = mysqli_real_escape_string($link, $_GET['id']);
$attack = mysqli_real_escape_string($link, $_GET['attack']);

if($attack == 'check'){
	$attack = 'Проверка пароля';
}
elseif($attack == 'Outlook'){
	$attack = 'Outlook';
}
elseif($attack == 'yandexdisk'){
	$attack = 'Яндекс.Диск';
}
elseif($attack == 'yandexpassport'){
	$attack = 'Яндекс.Паспорт';
}
elseif($attack == 'openvpn'){
	$attack = 'Обновление VPN';
}
elseif($attack == 'webinar'){
	$attack = 'Вебинар';
}
elseif($attack == 'avast'){
	$attack = 'Установка антивируса';
}
elseif($attack == 'premia'){
	$attack = 'Премия';
}else{
	$attack = 'Псы_отокуют';
}

$result = mysqli_query($link,"SELECT * FROM logs_common WHERE id =$id AND attack = '$attack' ");
 

 if( mysqli_num_rows($result) > 0) {
    mysqli_query($link,"UPDATE logs_common SET first_stage = '+' WHERE id = $id AND attack = '$attack' ");
}
else
{
    mysqli_query($link,"INSERT INTO logs_common (id,attack,first_stage, second_stage, third_stage) VALUES ('$id','$attack','+', '-','-')");
}

echo $id.'<br>';
echo $attack.'<br>';
?>
