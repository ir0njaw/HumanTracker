<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>USB</title>

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
                    <li>
                        <a href="../hta/"><i class="fa fa-bug"></i> HTA</a>
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
                    <li>
                        <a><i class="glyphicon glyphicon-file"></i> Создание отчета</a>
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
                            USB
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../">Статистика</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-flag"></i> Развернутые шаблоны</a>
                            </li>
                        </ol>

                    </div> <!--/top -->
                </div>
                    <div class="row">

 <!-- Таблица -->     <div class="col-lg-12">

                        <div class="table-responsive">
                           <div class="footer"></div>
                            <h3>Развернутые шаблоны</h3>
                                <?php
                include('../bd.php');
                mysqli_set_charset($link, "utf8");



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

                if($_POST['attack'] == "Kerio"){
                    $query = mysqli_query($link,"SELECT * FROM deployed WHERE attack_name = 'Kerio' ");
                    while($row = mysqli_fetch_array($query,MYSQLI_NUM)){
                        $dir = $row[1];
                        $delete_template = $dir.'/webmail';
                        exec ("rm -rf $delete_template");
                        mysqli_query($link,"DELETE FROM deployed WHERE attack_name = 'Kerio' ");
                        mysqli_query($link,"DELETE FROM attacks_stats WHERE attack_name = 'Kerio' ");
                    }
                }

                if($_POST['attack'] == "Jira"){
                    $query = mysqli_query($link,"SELECT * FROM deployed WHERE attack_name = 'Jira' ");
                    while($row = mysqli_fetch_array($query,MYSQLI_NUM)){
                        $dir = $row[1];
                        $delete_template = $dir.'/jira';
                        exec ("rm -rf $delete_template");
                        mysqli_query($link,"DELETE FROM deployed WHERE attack_name = 'Jira' ");
                        mysqli_query($link,"DELETE FROM attacks_stats WHERE attack_name = 'Jira' ");
                    }
                }

                if($_POST['attack'] == "checkpass"){
                    $query = mysqli_query($link,"SELECT * FROM deployed WHERE attack_name = 'Проверка пароля' ");
                    while($row = mysqli_fetch_array($query,MYSQLI_NUM)){
                        $dir = $row[1];
                        $delete_template = $dir.'/check';
                        exec ("rm -rf $delete_template");
                        mysqli_query($link,"DELETE FROM deployed WHERE attack_name = 'Проверка пароля' ");
                        mysqli_query($link,"DELETE FROM attacks_stats WHERE attack_name = 'Проверка пароля' ");
                    }
                }

                if($_POST['attack'] == "webinar"){
                    $query = mysqli_query($link,"SELECT * FROM deployed WHERE attack_name = 'Вебинар' ");
                    while($row = mysqli_fetch_array($query,MYSQLI_NUM)){
                        $dir = $row[1];
                        $delete_template = $dir.'/event';
                        exec ("rm -rf $delete_template");
                        mysqli_query($link,"DELETE FROM deployed WHERE attack_name = 'Вебинар' ");
                        mysqli_query($link,"DELETE FROM attacks_stats WHERE attack_name = 'Вебинар' ");
                    }
                }

                if($_POST['attack'] == "vpn"){
                    $query = mysqli_query($link,"SELECT * FROM deployed WHERE attack_name = 'Обновление VPN' ");
                    while($row = mysqli_fetch_array($query,MYSQLI_NUM)){
                        $dir = $row[1];
                        $delete_template = $dir.'/openvpn';
                        exec ("rm -rf $delete_template");
                        mysqli_query($link,"DELETE FROM deployed WHERE attack_name = 'Обновление VPN' ");
                        mysqli_query($link,"DELETE FROM attacks_stats WHERE attack_name = 'Обновление VPN' ");
                    }
                }

                if($_POST['attack'] == "LinkedIn"){
                    $query = mysqli_query($link,"SELECT * FROM deployed WHERE attack_name = 'LinkedIn' ");
                    while($row = mysqli_fetch_array($query,MYSQLI_NUM)){
                        $dir = $row[1];
                        $delete_template = $dir.'/vacancy';
                        exec ("rm -rf $delete_template");
                        mysqli_query($link,"DELETE FROM deployed WHERE attack_name = 'LinkedIn' ");
                        mysqli_query($link,"DELETE FROM attacks_stats WHERE attack_name = 'LinkedIn' ");
                    }
                }


                if($_POST['attack'] == "antivirus"){
                    $query = mysqli_query($link,"SELECT * FROM deployed WHERE attack_name = 'Установка антивируса' ");
                    while($row = mysqli_fetch_array($query,MYSQLI_NUM)){
                        $dir = $row[1];
                        $delete_template = $dir.'/avast';
                        exec ("rm -rf $delete_template");
                        mysqli_query($link,"DELETE FROM deployed WHERE attack_name = 'Установка антивируса' ");
                        mysqli_query($link,"DELETE FROM attacks_stats WHERE attack_name = 'Установка антивируса' ");
                    }
                }

                if($_POST['attack'] == "pereraschet"){
                    $query = mysqli_query($link,"SELECT * FROM deployed WHERE attack_name = 'Перерасчет ЗП' ");
                    while($row = mysqli_fetch_array($query,MYSQLI_NUM)){
                        $dir = $row[1];
                        $delete_template = $dir.'/pereraschet';
                        exec ("rm -rf $delete_template");
                        mysqli_query($link,"DELETE FROM deployed WHERE attack_name = 'Перерасчет ЗП' ");
                        mysqli_query($link,"DELETE FROM attacks_stats WHERE attack_name = 'Перерасчет ЗП' ");
                    }
                }

                if($_POST['attack'] == "recalculation"){
                    $query = mysqli_query($link,"SELECT * FROM deployed WHERE attack_name = 'Перерасчет ЗП (фишинг)' ");
                    while($row = mysqli_fetch_array($query,MYSQLI_NUM)){
                        $dir = $row[1];
                        $delete_template = $dir.'/recalculation';
                        exec ("rm -rf $delete_template");
                        mysqli_query($link,"DELETE FROM deployed WHERE attack_name = 'Перерасчет ЗП (фишинг)' ");
                        mysqli_query($link,"DELETE FROM attacks_stats WHERE attack_name = 'Перерасчет ЗП (фишинг)' ");
                    }
                }

                $query = mysqli_query($link,"SELECT * FROM deployed");
                while($row = mysqli_fetch_array($query,MYSQLI_NUM)){
                    $attack_name = $row[0];
                    $dir = $row[1];
                    echo '<div class="col-lg-1 text-center" style="border:1px solid #ccc;width:400px;margin:0 30px 30px 0;padding:30px ">';

                    if($attack_name == "Kerio"){echo "<p><a href=//$_SERVER[HTTP_HOST]/webmail/login/index.php target='_blank'>Перейти к шаблону $attack_name</a></p>";}
                    if($attack_name == "Outlook"){echo "<p><a href=//$_SERVER[HTTP_HOST]/owa target='_blank'>$attack_name</a></p>";}
                    if($attack_name == "Jira"){echo "<p><a href=//$_SERVER[HTTP_HOST]//jira target='_blank'>$attack_name</a></p>";}
                    if($attack_name == "Проверка пароля"){echo "<p><a href='//$_SERVER[HTTP_HOST]/check/ target='_blank'>$attack_name</a></p>";$attack_name = "checkpass";}
                    if($attack_name == "Вебинар"){echo "<p><a href=//$_SERVER[HTTP_HOST]/event/ target='_blank'>$attack_name</a></p>";$attack_name = "webinar";}
                    if($attack_name == "Обновление VPN"){echo "<p><a href=//$_SERVER[HTTP_HOST]/openvpn/ target='_blank'>$attack_name</a></p>";;$attack_name = "vpn";}
                    if($attack_name == "LinkedIn"){echo "<p><a href=//$_SERVER[HTTP_HOST]/vacancy/ target='_blank'>$attack_name</a></p>";$attack_name = "LinkedIn";}
                    if($attack_name == "Установка антивируса"){echo "<p><a href=//$_SERVER[HTTP_HOST]/avast/ target='_blank'>$attack_name</a></p>";$attack_name = "antivirus";}
                    if($attack_name == "Перерасчет ЗП"){echo "<p><a href=//$_SERVER[HTTP_HOST]/pereraschet/ target='_blank'>$attack_name</a></p>";$attack_name = "pereraschet";}
                    if($attack_name == "Перерасчет ЗП (фишинг)"){echo "<p><a href=//$_SERVER[HTTP_HOST]/recalculation/ target='_blank'>$attack_name</a></p>";$attack_name = "recalculation";}
                    echo '
                            <a href="edit.php?template='.$attack_name.'_sendlist"><button class="btn btn-default">sendlist.txt</button></a>
                            <a href="edit.php?template='.$attack_name.'_user"><button class="btn btn-default">user.txt</button></a><br>
                            <a href="edit.php?template='.$attack_name.'"><button class="btn btn-default">Изменить письмо</button></a><br>
                            <button id="but_'.$attack_name.'" value="'.$attack_name.'" class="btn btn-default" name="but1">Отправить</button>
                            <br><br>
                            <span style="color:green;">Отправленные письма:</span><br>
                            <span style="color:grey;">дата &nbsp;| &nbsp; время &nbsp; | &nbsp; id &nbsp; | &nbsp; email </span>
                            <div id="log_'.$attack_name.'"></div>
                            <br>
                            <form action="deployed.php" method="POST">
                                    <input class="btn btn-default" type="submit" id="submit-btn" name="delete" value="Удалить">
                                    <input type="hidden" name="attack" value="'.$attack_name.'">
                                </form>
                           </div>
                        ';
                }


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

<script type="text/javascript">
    $("#but_Outlook, #but_Kerio, #but_Outlook, #but_checkpass,#but_Jira, #but_webinar, #but_vpn, #but_antivirus, #but_LinkedIn, #but_pereraschet, #but_recalculation").click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "send.php",
            data: {
                send: $(this).val()
            },
        });
    });

</script>

<script>
$(document).ready(function(){
      refreshOutlook(),
      refreshPereraschet(),
      refreshRecalculation(),
      refreshKerio(),
      refreshCheckpass(),
      refreshWebinar(),
      refreshVpn(),
      refreshaAntivirus(),
      refreshaLinkedIn();
    });

    function refreshOutlook(){
        $("#log_Outlook").load("../../../owa/auth/sender/send_log.txt", function(){
           setTimeout(refreshOutlook, 2000);
        });
    }
    function refreshJira(){
        $("#log_Jira").load("../../../jira/sender/send_log.txt", function(){
           setTimeout(refreshJira, 2000);
        });
    }
    function refreshPereraschet(){
        $("#log_pereraschet").load("../../../pereraschet/sender/send_log.txt", function(){
           setTimeout(refreshPereraschet, 2000);
        });
    }
    function refreshRecalculation(){
        $("#log_recalculation").load("../../../recalculation/sender/send_log.txt", function(){
           setTimeout(refreshRecalculation, 2000);
        });
    }
    function refreshKerio(){
        $("#log_Kerio").load("../../../webmail/login/sender/send_log.txt", function(){
           setTimeout(refreshKerio, 2000);
        });
    }
    function refreshCheckpass(){
        $("#log_checkpass").load("../../../check/sender/send_log.txt", function(){
           setTimeout(refreshCheckpass, 2000);
        });
    }
    function refreshWebinar(){
        $("#log_webinar").load("../../../event/6f3249aa304055d6/sender/send_log.txt", function(){
           setTimeout(refreshWebinar, 2000);
        });
    }
    function refreshVpn(){
        $("#log_vpn").load("../../../openvpn/sender/send_log.txt", function(){
           setTimeout(refreshVpn, 2000);
        });
    }
    function refreshaAntivirus(){
        $("#log_Antivirus").load("../../../avast/sender/send_log.txt", function(){
           setTimeout(refreshaAntivirus, 2000);
        });
    }
    function refreshaLinkedIn(){
        $("#log_LinkedIn").load("../../../vacancy/sender/send_log.txt", function(){
           setTimeout(refreshaLinkedIn, 2000);
        });
    }

</script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
