<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Для отчета</title>

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
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script type="text/javascript" src="../js/xlsx.core.min.js"></script>
    <script type="text/javascript" src="../js/Blob.js"></script>
    <script type="text/javascript" src="../js/FileSaver.js"></script>
    <script type="text/javascript" src="../js/Export2Excel.js"></script>
    <script>
    function doit() { export_table_to_excel('table'); }
    function doit1() { export_table_to_excel('table1'); }
    </script>
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
                    <li>
                        <a href="../hta/"><i class="fa fa-bug"></i> HTA</a>
                    </li>
                     <li>
                        <a href="../phishing/"><i class="fa fa-certificate"></i> Фишинг </a>
                    </li>
                     <li>
                        <a href="../makros/"><i class="glyphicon glyphicon-play-circle"></i> Макросы</a>
                    </li>
                    <li>
                        <a href="../usb/"><i class="fa fa-flag"></i> USB</a>
                    </li>
                    <li>
                        <a><i class="glyphicon glyphicon-list-alt"></i> Шаблоны </a>
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
                    <li class="active">
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
                    <h1 class="page-header">Для отчета
                    </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i> <a href="../">Статистика</a>
                                        </li>
                                        <li class="active">
                                            <i class="fa fa-file"></i> Для отчета
                                        </li>
                        </ol>

                <?php
                include ("../bd.php");
                mysqli_set_charset($link, "utf8");
                $query = mysqli_query($link,"SELECT * FROM `logs_common`");


                echo "


                    <div id='showmenu'><h3> Статистика по пользователям <small>(показать/скрыть)</small></h3></div><br>
                    <div class='menu'><table class='table table-bordered table-hover table-striped' id='table'>";
                echo '<button style="background:white;border:1px solid #DDDDDD;text-decoration: none"><a href="../delete.php?id=5" style="color:#333333" onclick="return confirmDelete();">Очистить таблицу</a></button>
                    <thead>
                        <tr><td><b>ID</b></td><td><b>Логин</b></td><td width="15%"><b>Атака</b></td><td><b>Перешел на фишинговый сайт?</b></td><td><b>Ввел учетные данные/Запустил макросы</b></td></th</tr>
                    </thead>';

                while($row = mysqli_fetch_array($query,MYSQLI_NUM)) {
                $id=$row[0];
                $id= htmlspecialchars($id);
                $id= substr($id, 0,30);     // id
                $login=$row[1];
                $login= htmlspecialchars($login);
                $login= substr($login, 0,30);
                $attack=$row[2];
                $attack= htmlspecialchars($attack);
                $attack= substr($attack, 0,50);     // login
                $first_stage = $row[3];                   //ip
                $second_stage = $row[4];
                $third_stage = $row[5];

                echo "<tbody>
                    <tr><td>$id</td><td>$login</td><td>$attack</td><td>$first_stage</td><td>$second_stage</td></tr>";
                }
                echo "</tbody></table><div align='right'><input type='submit' style='background:#439467;border:0;color:white' value='Export to Excel!' onclick='doit();'></div></div>";
                ?>



                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->


    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#showmenu').click(function() {
                $('.menu').slideToggle("fast");
                    });

        $('#showmenu2').click(function() {
                $('.menu1').slideToggle("fast");
            });
    });
</script>

<!-- Очистка таблицы-->
<script>
function confirmDelete() {
  if (confirm("Вы подтверждаете удаление?")) {
    return true;
  } else {
    return false;
  }
}
</script>
</body>
</html>
