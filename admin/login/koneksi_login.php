<?php
date_default_timezone_set('Asia/Jakarta');
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'db_pariwisata';
$connect = mysqli_connect($host, $user, $pass, $dbname );
$tanggal=date("Y-m-d H:i:s");
