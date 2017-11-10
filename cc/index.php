<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Статистика</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
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
                <div style="margin:-10px 0 0 10px"><a class="navbar-brand" href="index.php"><img src="css/logo1.png" width="100px"></a></div>
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
                    <li class="active">
                        <a href=""><i class="fa fa-fw fa-dashboard"></i> Статистика</a>
                    </li>
                    <li>
                        <a href="hta/"><i class="fa fa-fw fa-bug"></i> HTA</a>
                    </li>
                     <li>
                        <a href="phishing/"><i class="fa fa-certificate"></i> Фишинг</a>
                    </li>
                     <li>
                        <a href="makros/"><i class="glyphicon glyphicon-play-circle"></i> Макросы</a>
                    </li>
                    <li>
                        <a href="usb/"><i class="fa fa-flag"></i> USB</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="glyphicon glyphicon-list-alt"></i> Шаблоны <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="template/">Готовые</a>
                            </li>
                            <li>
                                <a href="template/new.php">Загрузить новый</a>
                            </li>
                            <li>
                                <a href="template/delete.php">Удалить</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="glyphicon glyphicon-file"></i> Создание отчета <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse">
                            <li>
                                <a href="report/">Создать отчет</a>
                            </li>
                            <li>
                                <a href="report/statistic.php">Статистика</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="guides/"><i class="glyphicon glyphicon-film "></i> Гайды по настройке</a>
                    </li>
                    <li>
                        <a href="wiki/"><i class="glyphicon glyphicon-info-sign"></i> Вики</a>
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
                            Статистика
                            
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="">Статистика</a>
                            </li>
                        </ol>
         
                    </div> <!--/top -->
                </div>
                    


                    <div class="row">
 <!-- Таблица -->       <div class="col-lg-12">

                            <div class="table-responsive">
                              
                                <h3>Описание</h3>
                                    <div id="tableHolder">
                                   <?php
                                   include ('statistic.php');
                                   ?>
                                   </div>                            
                            </div>
<!-- /Таблица -->       </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div id="brouser" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                        </div>
                        <div class="col-lg-6">
                           <div id="ataki" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->



<?php
include ('bd.php');
mysqli_set_charset($link, "utf8");
/* Браузеры */
/* Chrome */
$query = mysqli_query($link, "SELECT COUNT(*) FROM logs_visited WHERE ip IS NOT NULL AND ip <> '' AND login IS NOT NULL AND login <> '' AND user_agent IS NOT NULL AND user_agent <> '' AND referer IS NOT NULL AND referer <> '' AND time AND user_agent='Chrome'");
while ($row = mysqli_fetch_array($query, MYSQLI_NUM)){$chrome = $row[0];}

/* Mozilla */
$query1 = mysqli_query($link, "SELECT COUNT(*) FROM logs_visited WHERE ip IS NOT NULL AND ip <> '' AND login IS NOT NULL AND login <> '' AND user_agent IS NOT NULL AND user_agent <> '' AND referer IS NOT NULL AND referer <> '' AND time AND user_agent='Firefox'");
while ($row = mysqli_fetch_array($query1, MYSQLI_NUM)){$firefox = $row[0];}

/* Opera */
$query2 = mysqli_query($link, "SELECT COUNT(*) FROM logs_visited WHERE ip IS NOT NULL AND ip <> '' AND login IS NOT NULL AND login <> '' AND user_agent IS NOT NULL AND user_agent <> '' AND referer IS NOT NULL AND referer <> '' AND time AND user_agent='Opera'");
while ($row = mysqli_fetch_array($query2, MYSQLI_NUM)){$opera = $row[0];}

/* IE */
$query3 = mysqli_query($link, "SELECT COUNT(*) FROM logs_visited WHERE ip IS NOT NULL AND ip <> '' AND login IS NOT NULL AND login <> '' AND user_agent IS NOT NULL AND user_agent <> '' AND referer IS NOT NULL AND referer <> '' AND time AND user_agent='Internet Explorer'");
while ($row = mysqli_fetch_array($query3, MYSQLI_NUM)){$ie = $row[0];}

/* SAFARI */
$query4 = mysqli_query($link, "SELECT COUNT(*) FROM logs_visited WHERE ip IS NOT NULL AND ip <> '' AND login IS NOT NULL AND login <> '' AND user_agent IS NOT NULL AND user_agent <> '' AND referer IS NOT NULL AND referer <> '' AND time AND user_agent='Safari'");
while ($row = mysqli_fetch_array($query4, MYSQLI_NUM)){$safari = $row[0];}
/* /Браузеры */


/* Количество успешных атак в сценариях */
/* Outlook */
$query5 = mysqli_query($link, "SELECT COUNT(*) FROM logs_phishing WHERE ip IS NOT NULL AND ip <> '' AND id IS NOT NULL AND id <> '' AND login IS NOT NULL AND login <> '' AND password IS NOT NULL AND password <> '' AND user_agent IS NOT NULL AND user_agent <> '' AND referer IS NOT NULL AND referer <> '' AND time AND referer LIKE '%outlook%'");
while ($row = mysqli_fetch_array($query5, MYSQLI_NUM)){$outlook = $row[0];}

/* HTA */
$query6 = mysqli_query($link, "SELECT COUNT(DISTINCT client_id) FROM tasks");
while ($row = mysqli_fetch_array($query6, MYSQLI_NUM)){$hta = $row[0];}




?>


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    
    <!-- Flot Charts JavaScript -->
    <!--[if lte IE 8]><script src="js/excanvas.min.js"></script><![endif]-->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/flot-data.js"></script>
    <!-- Bootstrap Core JavaScript -->
  
     <script type="text/javascript">
    $(document).ready(function(){
      refresh();
    });

    function refresh(){
        $('#tableHolder').load('statistic.php', function(){
           setTimeout(refresh, 1000);
        });
    }
</script>   
 
<script type="text/javascript">
Highcharts.chart('brouser', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Статистика по браузерам'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Microsoft IE',
            y: <?php echo $ie; ?>
        }, {
            name: 'Chrome',
            y: <?php echo $chrome; ?>
        }, {
            name: 'Firefox',
            y: <?php echo $firefox; ?>
        }, {
            name: 'Safari',
            y: <?php echo $safari; ?>
        }, {
            name: 'Opera',
            y: <?php echo $opera; ?>
        }]
    }]
});    
</script>

<script type="text/javascript">
Highcharts.chart('ataki', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Статистика по атакам'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.y:.0f}',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{


            <?php
            $result = mysqli_query($link, "SELECT * FROM attacks_stats");
            $numResults = mysqli_num_rows($result);
            $counter = 0;
                    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
                        $name = $row[0];
                        $count = $row[1];
                        
                        if (++$counter == $numResults) {
                            echo "name: '$name',
                                   y: $count";

                        } else {
                        echo   "name: '$name',
                                y: $count
                                }, {";
                        }
                    }
            ?>
            }]
            }]
});
         
</script>

</body>

</html>
