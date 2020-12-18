<?php

date_default_timezone_set('Asia/Jakarta');

$server = "localhost";
$username = "root";
$password = "";
$database = "cam_mania";

$koneksi = mysqli_connect($server,$username,$password,$database);

if (mysqli_connect_errno()){
	echo "failed to connect to mysql".mysqli_connect_errno();
	exit();
}


?>