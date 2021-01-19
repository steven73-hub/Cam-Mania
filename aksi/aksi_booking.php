<?php
include "../lib/config.php";
include "../lib/koneksi.php";

session_start();

// $id_produk = $_POST['produk'];
// $subtotal=$_POST['subtotal'];

$user = $_SESSION['iduser'];
$date = $_POST['datetimes'];
$tahun_awal = substr($date, 6, -13);
$bulan_awal = substr($date, 0, -21);
$tgl_awal = substr($date, 3, -18);
$tahun_akhir = substr($date, 19);
$bulan_akhir = substr($date, 13, -8);
$tgl_akhir = substr($date, 16, -5);
$set_tgl_awal = $tahun_awal . '-' . $bulan_awal . '-' . $tgl_awal;
$set_tgl_akhir = $tahun_akhir . '-' . $bulan_akhir . '-' . $tgl_akhir;
$status="booking";


$tanggal1 = new DateTime($set_tgl_awal);
$tanggal2 = new DateTime($set_tgl_akhir);
 
$durasi = $tanggal2->diff($tanggal1)->format("%a");




$sql_akun = mysqli_query($koneksi, "SELECT * FROM akun WHERE id_user='$user' ");
$u = mysqli_fetch_array($sql_akun);

$id = $u['id_user'];
$nama = $u['nama'];

// echo $user;
// echo "<br>";
// echo $id_produk;
// echo "<br>";
// echo $set_tgl_awal;
// echo "<br>";
// echo $set_tgl_akhir;
// echo "<br>";
// echo $durasi;
// echo "<br>";
// echo $status;


// exit();

$query_keranjang = mysqli_query($koneksi, "SELECT * FROM keranjang WHERE id_user = '$user' and status_keranjang='checkout'");

while ($k = mysqli_fetch_array($query_keranjang)) {
    $id_produk = $k['id_produk'];
    $qty_produk = $k['jumlah'];
    $harga = $k['harga'];
    $total_harga = $qty_produk  * $harga;

    $tes = mysqli_query($koneksi, "SELECT * FROM sewa WHERE id_user='$user' and id_produk='$id_produk'");
    $ketemu = mysqli_num_rows($tes);
    if(empty($ketemu)){
        $query_masuk = mysqli_query($koneksi, "INSERT INTO sewa(id_user,id_produk,tgl_sewa,tgl_kembali,durasi_sewa,total_harga,status_sewa) 
        VALUES ('$user','$id_produk','$set_tgl_awal','$set_tgl_akhir','$durasi','$total_harga','$status')");
        // echo "<br>";
        // echo "<br>";
        // echo "<br>";
        // echo $user;
        // echo "<br>";
        // echo $id_produk;
        // echo "<br>";
        // echo $set_tgl_awal;
        // echo "<br>";
        // echo $set_tgl_akhir;
        // echo "<br>";
        // echo $durasi;
        // echo "<br>";
        // echo $total_harga;
        // echo "<br>";
        // echo $status;
        
            if ($query_masuk) {
                echo    "<script>
                alert('data anda berhasil di inputkan!'); 
                window.location = '$base_url'+'detail_booking.php';
                </script>";
            } else {
                echo    "<script>
                alert('Gagal ditambahkan, silahkan masukkan data dengan benar'); 
                window.location = '$base_url'+'checkout.php';
                </script>";
            }   
    }else{
        $update = mysqli_query($koneksi, "UPDATE sewa SET tgl_sewa = '$set_tgl_awal',tgl_kembali = '$set_tgl_akhir',durasi_sewa='$durasi', total_harga = '$total_harga', status_sewa='$status' WHERE id_produk = '$id_produk' and id_user='$user' ");
    
        if ($update) {
            echo    "<script>
            alert('data anda berhasil diupdate!'); 
            window.location = '$base_url'+'detail_booking.php';
            </script>";
        } else {
            echo    "<script>
            alert('Gagal diupdate, silahkan masukkan data dengan benar'); 
            window.location = '$base_url'+'checkout.php';
            </script>";
        }   
    }   


}





