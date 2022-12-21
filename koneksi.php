<?php
$host='localhost';
$user='root';
$pass='';
$db='db_bengkel';
$ok=mysql_connect($host,$user,$pass) or die ('Gagal Koneksi ke Database'.mysql_error());
mysql_select_db($db,$ok);

//format uang
//$jumlah_desimal = "0";
//$pemisah_desimal = ",";
//$pemisah_ribuan = ".";
?>