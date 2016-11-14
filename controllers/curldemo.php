<?php


$date=  array("name"=>"guarav");
$u=http_build_query($date);

$ch = curl_init("http://localhost/play-pro1/controllers/temp.php");

curl_setopt($ch,CURLOPT_POST, true);

curl_setopt($ch,CURLOPT_POSTFIELDS,"postvar1=value1");
curl_setopt($ch,CURLOPT_HEADER,0);

curl_setopt($ch, CURLOPT_RETURNTRANSFER,false );
$resp = curl_exec($ch);
curl_close($ch);
?>