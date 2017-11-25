<?php

$file_url 	= base64_decode($_GET['adr']) ?? "";
$file_name  = base64_decode($_GET['name']) ?? "";


if(stristr($file_url,".php") || stristr($file_url,"../") || stristr($file_url,basename(__FILE__)) || !stristr($file_url,"://"))
{
	exit("Not Access.");
}

header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary"); 
header("Content-disposition: attachment; filename=\"".$file_name."\""); 
readfile($file_url);



?>