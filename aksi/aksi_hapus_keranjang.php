<?php
include "../lib/config.php";
include "../lib/koneksi.php";

$idpro = $_GET ['id_produk'];

$queryHapus = mysqli_query($koneksi, "DELETE FROM keranjang WHERE id_produk='$idpro'");


if ($queryHapus){
    echo "<script> alert('data berhasil di hapus'); window.location='$base_url'+'cart.php';</script>";
}else {
    echo "<script> alert('data gagal di hapus'); window.location='$base_url'+'cart.php';</script>";
}

?>