<?php
/*
$search = 'premia';
$searchg = 'google';
$lines = file('1.txt');
// Store true when the text is found
$found = false;
foreach($lines as $line)
{
  if(strpos($line, $search) !== false OR strpos($line, $searchg) !== false)
  {
    $found = true;
    echo $line."<br>";

    $fp = fopen("find.txt","a+");  
	fwrite($fp, $line);  
	fclose($fp);
  }
  
}
// If the text was not found, show a message
if(!$found)
{
  echo 'No match found';
}
*/

$text = '87.250.224.19 - - [23/May/2017:12:39:44 -0400] "GET /robots/google/id_1/.txt HTTP/1.1" 404 504 "-" "Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots) 87.250.224.19 - - [23/May/2017:12:39:44 -0400] "GET /robots/google/id_2/.txt HTTP/1.1" 404 504 "-" "Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)"';

if(preg_match('/\Sgoogle\/id_\d{1,4}/', $text, $matches)){
	echo $matches[0];
	echo $matches[1];
}




