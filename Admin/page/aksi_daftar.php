<?php
    include "../../lib/koneksi.php";
    include "../../lib/config.php";


    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama= $_POST['nama'];
    $email= $_POST['email'];
    $alamat= $_POST['alamat'];
    $telpon= $_POST['telpon'];
    $level = "2";
    $status = "aktif";


    $querydaftar = mysqli_query($koneksi, "INSERT INTO `akun` (
                                                        -- `id_user`,
                                                        `username`, 
                                                        `password`, 
                                                        `nama`, 
                                                        `email`,
                                                        `alamat`, 
                                                        `no_telp`, 
                                                        `level`, 
                                                        `status_akun`) 
                                            VALUES (
                                                
                                                '$username', 
                                                '$password', 
                                                '$nama', 
                                                '$email',
                                                '$alamat', 
                                                '$telpon', 
                                                '$level', 
                                                '$status');");

    if($querydaftar){
        echo "<script> alert('data registrasi berhasil masuk'); window.location = '$admin_url'+'index.php';</script>";
    } else {
        echo "<script> alert('data registrasi gagal masuk'); window.location = '$admin_url'+'register.php';</script>";
    }
?>