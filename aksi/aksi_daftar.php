<?php
    include "../lib/koneksi.php";
    include "../lib/config.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $nohp = $_POST['no_telp'];
    $level = "3";
    $status = "aktif";
    $gambar = "";

    // echo $username;
    // echo "<br>";
    // echo $password;
    // echo "<br>";
    // echo $nama;
    // echo "<br>";
    // echo $alamat;
    // echo "<br>";
    // echo $email;
    // echo "<br>";
    // echo $nohp;
    // echo "<br>";
    // echo $level;
    // echo "<br>";
    // echo $status;

    $querydaftar = mysqli_query($koneksi, "insert into akun (username, password, nama, email, alamat, no_telp, level, status_akun, gambar) values ('$username','$password','$nama','$email','$alamat','$nohp','$level','$status','$gambar')");

    if($querydaftar){
        echo "<script> alert('data registrasi berhasil masuk'); window.location = '$base_url'+'login.php';</script>";
    } else {
        echo "<script> alert('data registrasi gagal masuk'); window.location = '$base_url'+'register.php';</script>";
    }
?>