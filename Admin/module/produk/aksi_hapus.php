<?php
session_start();
if (empty($_SESSION['username'])AND empty ($_SESSION['passuser'])) {
    echo"<center > untuk mengakses modul ini andha harus login<br>";
    echo"<a href =../../index.php><b>LOGIN</b></a></center>";
} else {
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idproduk = $_GET ['id_produk'];
  
    $queryHapus = mysqli_query($koneksi, "DELETE FROM produk  WHERE id_produk='$idproduk'");
 

    if ($queryHapus){
        echo "<script> alert ('Data Produk Berhasil dihapus'); window.location ='$admin_url'+ 'adminweb.php?module=produk';</script>";
    }else {
        echo "<script> alert ('Data Produk gagal dihapus'); window.location ='$admin_url'+ 'adminweb.php?module=produk';</script>";
    }
}
    ?>