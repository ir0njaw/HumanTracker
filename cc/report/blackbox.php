<?php
include '../bd.php';
require_once 'vendor/autoload.php';

if(isset($_POST['company'])){$company = $_POST['company'];}
if(isset($_POST['date_start'])){$date_start = $_POST['date_start'];}
if(isset($_POST['date_end'])){$date_end = $_POST['date_end'];}
if(isset($_POST['manager'])){$manager = $_POST['manager'];}
if(isset($_POST['contract'])){$contract = $_POST['contract'];}
if(isset($_POST['date_contract'])){$date_contract = $_POST['date_contract'];}
if(isset($_POST['mark'])){$mark = $_POST['mark'];}


$description = '';
$query = mysqli_query($link,"SELECT * FROM `attacks_stats`");
  while($row = mysqli_fetch_array($query,MYSQLI_NUM)) {

$description.=$row[3];
}

$phpWord = new  \PhpOffice\PhpWord\PhpWord();
$template = new \PhpOffice\PhpWord\TemplateProcessor('new.docx');  
$template->setValue('company', $company);
$template->setValue('date_start', $date_start);
$template->setValue('date_end', $date_end);
$template->setValue('manager', $manager);
$template->setValue('contract', $contract);
$template->setValue('date_contract', $date_contract);
$template->setValue('mark', $mark);
$template->setValue('description', $description);
$template->saveAs('report.docx'); 

header("Location:../report/");
?>