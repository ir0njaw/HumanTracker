<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Шаблоны.Удаление развернутых шаблонов</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!--Galery -->
    <link rel="stylesheet" type="text/css" href="../css/default.css" />
    <link rel="stylesheet" type="text/css" href="../css/component.css" />
    <script src="../js/modernizr.custom.js"></script>
    <!--/Galery -->
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
                        <a href="../"><i class="fa fa-fw fa-dashboard"></i> Статистика</a>
                    </li>
                    <li>
                        <a href="../hta/"><i class="fa fa-fw fa-bug"></i> HTA</a>
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
                    <li class="active">
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="glyphicon glyphicon-list-alt"></i> Шаблоны <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="../template/">Готовые</a>
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
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="glyphicon glyphicon-file"></i> Создание отчета <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse">
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
                            Шаблоны
                            <small>(удаление)</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../">Статистика</a>
                            </li>
                            <li>
                                <i class="glyphicon glyphicon-list-alt"></i><a href="../template/"> Шаблоны</a>
                            </li>
                            <li class="active">
                                <i class="glyphicon glyphicon-list-alt"></i> Удалить</a>
                            </li>
                        </ol>
         
                    </div> <!--/top -->
                    </div>
                    <div class="row">
                
 <!-- Таблица -->     <div class="col-lg-12">


                            <h3>Удалить развернутые шаблоны</h3>
                            <div class="container"> 
            <!-- Codrops top bar -->
                                <div class="main">
                                
            <?php
                include('../bd.php');
                mysqli_set_charset($link, "utf8");
                
                if($_POST['attack'] == "Яндекс.Диск"){
                    $query = mysqli_query($link,"SELECT * FROM deployed WHERE attack_name = 'Яндекс.Диск' ");
                    while($row = mysqli_fetch_array($query,MYSQLI_NUM)){
                        $dir = $row[1];
                        $delete_sender = $dir.'/sender';
                        exec ("rm -rf $delete_sender");
                        $delete_report = $dir.'/report';
                        exec ("rm -rf $delete_report");
                        $delete_files = $dir.'/files';
                        exec ("rm -rf $delete_files");
                        $delete_auth = $dir.'/auth.php';
                        exec ("rm $delete_auth");
                        $delete_example = $dir.'/example.jpg';
                        exec ("rm $delete_example");
                        $delete_config = $dir.'/config.php';
                        exec ("rm $delete_config");
                        $delete_index = $dir.'/index.php';
                        exec ("rm $delete_index");
                        $delete_visited = $dir.'/visited.php';
                        exec ("rm $delete_visited");

                        mysqli_query($link,"DELETE FROM deployed WHERE attack_name = 'Яндекс.Диск' ");
                        mysqli_query($link,"DELETE FROM attacks_stats WHERE attack_name = 'Яндекс.Диск' ");
                    }
                }
                
                if($_POST['attack'] == "Яндекс.Паспорт"){
                    $query = mysqli_query($link,"SELECT * FROM deployed WHERE attack_name = 'Яндекс.Паспорт' ");
                    while($row = mysqli_fetch_array($query,MYSQLI_NUM)){
                        $dir = $row[1];
                        $delete_sender = $dir.'/sender';
                        exec ("rm -rf $delete_sender");
                        $delete_report = $dir.'/report';
                        exec ("rm -rf $delete_report");
                        $delete_files = $dir.'/files';
                        exec ("rm -rf $delete_files");
                        $delete_auth = $dir.'/auth.php';
                        exec ("rm $delete_auth");
                        $delete_example = $dir.'/example.jpg';
                        exec ("rm $delete_example");
                        $delete_config = $dir.'/config.php';
                        exec ("rm $delete_config");
                        $delete_index = $dir.'/index.php';
                        exec ("rm $delete_index");
                        $delete_visited = $dir.'/visited.php';
                        exec ("rm $delete_visited");

                        mysqli_query($link,"DELETE FROM deployed WHERE attack_name = 'Яндекс.Паспорт' ");
                        mysqli_query($link,"DELETE FROM attacks_stats WHERE attack_name = 'Яндекс.Паспорт' ");
                    }
                }

                if($_POST['attack'] == "Outlook"){
                    $query = mysqli_query($link,"SELECT * FROM deployed WHERE attack_name = 'Outlook' ");
                    while($row = mysqli_fetch_array($query,MYSQLI_NUM)){
                        $dir = $row[1];
                        $delete_template = $dir.'/owa';
                        exec ("rm -rf $delete_template");
                        mysqli_query($link,"DELETE FROM deployed WHERE attack_name = 'Outlook' ");
                        mysqli_query($link,"DELETE FROM attacks_stats WHERE attack_name = 'Outlook' ");
                    }
                }

                if($_POST['attack'] == "Проверка пароля"){
                    $query = mysqli_query($link,"SELECT * FROM deployed WHERE attack_name = 'Проверка пароля' ");
                    while($row = mysqli_fetch_array($query,MYSQLI_NUM)){
                        $dir = $row[1];
                        $delete_template = $dir.'/check';
                        exec ("rm -rf $delete_template");
                        mysqli_query($link,"DELETE FROM deployed WHERE attack_name = 'Проверка пароля' ");
                        mysqli_query($link,"DELETE FROM attacks_stats WHERE attack_name = 'Проверка пароля' ");
                    }
                }

                if($_POST['attack'] == "Вебинар"){
                    $query = mysqli_query($link,"SELECT * FROM deployed WHERE attack_name = 'Вебинар' ");
                    while($row = mysqli_fetch_array($query,MYSQLI_NUM)){
                        $dir = $row[1];
                        $delete_template = $dir.'/event';
                        exec ("rm -rf $delete_template");
                        mysqli_query($link,"DELETE FROM deployed WHERE attack_name = 'Вебинар' ");
                        mysqli_query($link,"DELETE FROM attacks_stats WHERE attack_name = 'Вебинар' ");
                    }
                }

                if($_POST['attack'] == "Обновление VPN"){
                    $query = mysqli_query($link,"SELECT * FROM deployed WHERE attack_name = 'Обновление VPN' ");
                    while($row = mysqli_fetch_array($query,MYSQLI_NUM)){
                        $dir = $row[1];
                        $delete_template = $dir.'/openvpn';
                        exec ("rm -rf $delete_template");
                        mysqli_query($link,"DELETE FROM deployed WHERE attack_name = 'Обновление VPN' ");
                        mysqli_query($link,"DELETE FROM attacks_stats WHERE attack_name = 'Обновление VPN' ");
                    }
                }


                if($_POST['attack'] == "Установка антивируса"){
                    $query = mysqli_query($link,"SELECT * FROM deployed WHERE attack_name = 'Установка антивируса' ");
                    while($row = mysqli_fetch_array($query,MYSQLI_NUM)){
                        $dir = $row[1];
                        $delete_template = $dir.'/avast';
                        exec ("rm -rf $delete_template");
                        mysqli_query($link,"DELETE FROM deployed WHERE attack_name = 'Установка антивируса' ");
                        mysqli_query($link,"DELETE FROM attacks_stats WHERE attack_name = 'Установка антивируса' ");
                    }
                }

                if($_POST['attack'] == "Премия"){
                    $query = mysqli_query($link,"SELECT * FROM deployed WHERE attack_name = 'Премия' ");
                    while($row = mysqli_fetch_array($query,MYSQLI_NUM)){
                        $dir = $row[1];
                        $delete_template = $dir.'/premia';
                        exec ("rm -rf $delete_template");
                        mysqli_query($link,"DELETE FROM deployed WHERE attack_name = 'Премия' ");
                        mysqli_query($link,"DELETE FROM attacks_stats WHERE attack_name = 'Премия' ");
                    }
                }

                if($_POST['attack'] == "Перерасчет ЗП"){
                    $query = mysqli_query($link,"SELECT * FROM deployed WHERE attack_name = 'Перерасчет ЗП' ");
                    while($row = mysqli_fetch_array($query,MYSQLI_NUM)){
                        $dir = $row[1];
                        $delete_template = $dir.'/pereraschet';
                        exec ("rm -rf $delete_template");
                        mysqli_query($link,"DELETE FROM deployed WHERE attack_name = 'Перерасчет ЗП' ");
                        mysqli_query($link,"DELETE FROM attacks_stats WHERE attack_name = 'Перерасчет ЗП' ");
                    }
                }

                $query = mysqli_query($link,"SELECT * FROM deployed");
                while($row = mysqli_fetch_array($query,MYSQLI_NUM)){
                    $attack_name = $row[0];
                    $dir = $row[1];
                    echo '<div class="col-lg-1 text-center" style="border:1px solid #ccc;width:400px;margin:0 30px 30px 0;padding:30px ">
                             <p>'.$attack_name.'</p>
                                <form action="deployed.php" method="POST">
                                    <input class="btn btn-default" type="submit" id="submit-btn" name="delete" value="Удалить">
                                    <input type="hidden" name="attack" value="'.$attack_name.'"> 
                                </form>
                           </div>
                        ';
                }
                   

            ?>
                    
                        </div>
                    </div>
                    </div>
                    </div>
                <!-- /.row -->
            </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
    </div>
    </div>


    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/grid.js"></script>
    <script>
            $(function() {
                Grid.init();
            });
        </script>

</body>

</html>
