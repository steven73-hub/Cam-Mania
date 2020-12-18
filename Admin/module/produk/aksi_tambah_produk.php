<?php
session_start();
if (empty($_SESSION['username'])AND empty ($_SESSION['passuser'])) {
    echo"<center > untuk mengakses modul ini andha harus login<br>";
    echo"<a href =../../index.php><b>LOGIN</b></a></center>";
} else { 
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $nama_file = $_FILES['gambar'] ['name'];
    $ukuran_file = $_FILES['gambar'] ['size'];
    $tipe_file = $_FILES ['gambar'] ['type'];
    $tmp_file = $_FILES ['gambar'] ['tmp_name'];

    
    $idKategori = $_POST ['id_kategori'];
    $idMerek = $_POST ['id_merek'];
    $nama = $_POST ['nama_produk'];
    $deskripsi = $_POST ['deskripsi'];
    $harga = $_POST ['harga'];
    $stok = $_POST ['stok'];
    
    // echo $idKategori;
    // echo $idMerek;
    // echo $nama;
    // echo $deskripsi;
    // echo $harga;

    // var_dump($nama_file);

    $path = "../../upload/". $nama_file;
               if ($tipe_file == "image/jpeg" || $tipe_file == "img/png"){
                    if ($ukuran_file <=1000000){
                        if (move_uploaded_file($tmp_file, $path)){
        
                            $querySimpan = mysqli_query ($koneksi, "INSERT INTO produk ( nama_produk, deskripsi, gambar, harga_sewa, stok_barang, id_kategori, id_merek) VALUES ('$nama','$deskripsi','$nama_file','$harga','$stok','$idKategori','$idMerek')");
                            if ($querySimpan) {
                                echo "<script> alert ('Data Produk Berhasil Masuk'); window.location ='$admin_url'+ 'adminweb.php?module=produk';</script>";
                            }else {
                                echo "<script> alert ('Data Produk gagal Masuk'); window.location ='$admin_url'+ 'adminweb.php?module=tambah_produk';</script>";
                            }
                        } else{
                            echo "<script> alert ('Data Gambar Produk gagal Masuk'); window.location ='$admin_url'+ 'adminweb.php?module=tambah_produk';</script>";
                        }
                    } else {
                        echo "<script> alert ('Data Gambar Produk gagal Masuk karena ukuran lebih dari 1 mb'); window.location ='$admin_url'+'adminweb.php?module=tambah_produk';</script>";
                    }
                } else {
                    echo "<script> alert ('Data Gambar Produk gagal Masuk karena format foto salah'); window.location ='$admin_url'+ 'adminweb.php?module=tambah_produk'; </script>";
                }
        }  

?>