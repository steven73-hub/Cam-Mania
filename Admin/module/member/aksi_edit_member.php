<?php
session_start();
if (empty($_SESSION['username'])AND empty ($_SESSION['passuser'])) {
    echo"<center > untuk mengakses modul ini andha harus login<br>";
    echo"<a href =../../index.php><b>LOGIN</b></a></center>";
} else { 
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";


    $id_user = trim($_POST['id_user']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $member = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $alamat = trim($_POST['alamat']);
    $no = trim($_POST['no_telp']);
    $status = trim($_POST['status']);
    
    
    // $nama = trim($_POST['nama']);
    
    // $kota = trim($_POST['kota']);
    // $no_hp = trim($_POST['no_hp']);


    $queryEdit = mysqli_query(
        $koneksi,
        "UPDATE `akun` SET 
                        
                        `status_akun` = '$status' WHERE `akun`.`id_user` = $id_user; ");

    if ($queryEdit) {
        echo    "<script>
                        window.location = '$admin_url'+'adminweb.php?module=member&idm='+$id_user;
                </script>";
    }
}
?>