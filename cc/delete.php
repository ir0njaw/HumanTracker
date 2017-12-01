<?php
include ('bd.php');
if(isset($_GET['id'])){$id = $_GET['id'];}
if(isset($_GET['user'])){$client_id = $_GET['user'];}

if($id =='1'){
        $query = mysqli_query($link, "DELETE FROM tasks WHERE client_id=$client_id");
        header('Location: hta/');
}
elseif($id =='2'){
        $query = mysqli_query($link, "TRUNCATE logs_visited");
        header('Location: phishing/');
}
elseif($id =='3'){
        $query = mysqli_query ($link, "TRUNCATE logs_phishing");
        header('Location: phishing/');
}
elseif($id =='4'){
        $query = mysqli_query ($link, "TRUNCATE logs_makros");
        header('Location: makros/');
}

elseif($id =='5'){
        $query = mysqli_query ($link, "TRUNCATE logs_common");
        header('Location: report/statistic.php');
}

?>
