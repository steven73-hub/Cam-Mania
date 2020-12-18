<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=$admin_url><b>LOGIN</b></a></center>";
}
else {

include "../../../lib/config.php";
include "../../../lib/koneksi.php";

$idProduk = $_POST['id_produk'];

$nama_file = $_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];

$idKategori = $_POST['id_kategori'];
$idMerek = $_POST['id_merek'];
$namaProduk = $_POST['nama_produk'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];


// echo $nama_file;
// echo "<br>";
// echo $idKategori;
// echo "<br>";
// echo $idMerek;
// echo "<br>";
// echo $namaProduk;
// echo "<br>";
// echo $deskripsi;
// echo "<br>";
// echo $harga;
// echo "<br>";
// echo $stok;
// echo "<br>";


$path = "../../upload/".$nama_file;
if ($tipe_file == "image/jpeg" || $tipe_file == "image/png") {
	if ($ukuran_file <= 100000000) {
		if (move_uploaded_file($tmp_file, $path)) {
			$queryEdit = mysqli_query($koneksi, "UPDATE produk SET 
							nama_produk = '$namaProduk',
							deskripsi = '$deskripsi',
							gambar = '$nama_file',
                            harga_sewa = '$harga',
                            stok_barang = '$stok',
                            id_kategori = '$idKategori',
							id_merek = '$idMerek'
							WHERE id_produk = '$idProduk'");
			if ($queryEdit) {
				echo "<script> alert('Data Produk Berhasil Diubah'); window.location = '$admin_url'+'adminweb.php?module=produk';</script>";
			}
			else {
				echo "<script> alert('Data Produk tidak lengkap atau Gagal Diubah'); window.location = '$admin_url'+'adminweb.php?module=edit_produk&id_produk='+'$idProduk';</script>";
			}
		}
		else {
			echo "<script> alert('Data Gambar Gagal Diubah'); window.location = '$admin_url'+'adminweb.php?module=edit_produk&id_produk='+'$idProduk';</script>";
		}
	}
	else {
		echo "<script> alert('Data Gambar Gagal Diubah Karena Ukuran File Melebihi 1MB'); window.location = '$admin_url'+'adminweb.php?module=edit_produk&id_produk='+'$idProduk';</script>";
	}
}
else {
	echo "<script> alert('Data Gambar Gagal Diubah'); window.location = '$admin_url'+'adminweb.php?module=edit_produk&id_produk='+'$idProduk';</script>";
}
}



?>