<?php
include ("../bd.php");

$query = mysqli_query($link,"SELECT client_id FROM tasks GROUP BY client_id");

echo '
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr><th>Боты</th><th>Время</th><th>Последняя команда</th><th>Статус</th></tr>
    </thead>';

    while($row = mysqli_fetch_array($query,MYSQLI_NUM)){
    $pole1=$row[0];
    $query2 = mysqli_query($link,"select time from timelog where client_id = '".$pole1."' order by time desc");
    $row2 = mysqli_fetch_array($query2,MYSQLI_NUM);
    $time = $row2[0];
    $query3 = mysqli_query($link,"select operation,argument_human,status, id from tasks where client_id = '".$pole1."' order by time desc");
    $row3 = mysqli_fetch_array($query3,MYSQLI_NUM);
    $last_command = $row3[0]." - ".$row3[1];
    $status = $row3[2];
    $id = $row3[3];
    
   echo "<tbody>
    <tr><td><a href='view_user.php?id=$pole1'>$pole1</td><td>$time</td><td>$last_command</td><td><a href='view_detail.php?id=$id&i=$pole1'>$status (click)</a></td></tr>";
}
echo "</tbody></table>";

?>