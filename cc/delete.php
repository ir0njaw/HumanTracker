<?php
include ('bd.php');
mysqli_set_charset($link, "utf8");
if(isset($_GET['id'])){$id = $_GET['id'];}
if(isset($_GET['user'])){$client_id = $_GET['user'];}

if($id =='hta'){
        $query = mysqli_query ($link, "TRUNCATE replies");
        $query = mysqli_query ($link, "TRUNCATE tasks");
        $query = mysqli_query ($link, "TRUNCATE timelog");
        $query = mysqli_query ($link, "UPDATE attacks_stats SET count='0' WHERE attack_name='Вебинар'");
        header('Location: hta/');
}
elseif($id =='2'){
        $query = mysqli_query($link, "TRUNCATE logs_visited");
        header('Location: phishing/');
}
elseif($id =='3'){
        $query = mysqli_query ($link, "TRUNCATE logs_phishing");
        $query = mysqli_query ($link, "UPDATE attacks_stats SET count='0' WHERE (attack_name='Outlook' OR attack_name='Проверка пароля' OR attack_name='Kerio')");
        header('Location: phishing/');
}
elseif($id =='4'){
        $query = mysqli_query ($link, "TRUNCATE logs_makros");
        $query = mysqli_query ($link, "UPDATE attacks_stats SET count='0' WHERE attack_name='Перерасчет ЗП'");
        header('Location: makros/');
}

elseif($id =='5'){
        $query = mysqli_query ($link, "TRUNCATE logs_common");
        header('Location: report/statistic.php');
}
?>
