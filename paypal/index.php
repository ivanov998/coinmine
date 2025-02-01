<?php
$mysqli = new mysqli("mysql.ktmwebhosting.com", "user", "password","u765197492_db");
if(!$mysqli)
    echo "err";

$ch = curl_init('https://www.howsmyssl.com/a/check');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSLVERSION,CURL_SSLVERSION_TLSv1_2);
$data = curl_exec($ch);
curl_close($ch);

$json = json_decode($data);
echo $json->tls_version;
?>