<?php

include "../lib/koneksi.php";
include "../lib/config.php";

$username = $_POST['username'];
$password = $_POST['password'];

$querylogin = mysqli_query($koneksi, "select * from akun where username = '$username' and password = '$password'");
$resultquery = mysqli_num_rows($querylogin);

$result = mysqli_fetch_array($querylogin);

// echo $username;
// echo $password;

if($resultquery>0){
    $level = $result['level'];
    $status = $result['status_akun'];

	if ($level == '3' && $status == 'aktif') {
            session_start();
            $_SESSION['iduser'] = $result['id_user'];
            header("location: ../index.php");
    }else{
        echo "
        <script> 
		    alert('maaf akun anda tidak dapat di akses atau sedang di blokir. Silahkan menghubungi Admin, Terima Kasih'); 
			window.location = '../login.php';
        </script>";
    }
}else {
	echo "
		<script> 
		    alert('username atau password tidak benar'); 
			window.location = '../login.php';
        </script>";
}

?>