<?php
    session_start();
    // $sid = session_id();

    $user = $_SESSION['iduser'];

    include "../lib/koneksi.php";
    include "../lib/config.php";
    
    $id_pro = $_GET['id_produk'];
    $harga = $_GET['harga'];
    $tanggal = date("Y-m-d");

// echo $id_pro;
// echo "<br>";
// echo $harga;
// echo "<br>";
// echo $user;
// echo "<br>";


// // var_dump($id_pro);
// exit();



    if (isset($_GET['minus'])) {

        $sql = mysqli_query($koneksi, "SELECT * FROM keranjang WHERE id_produk ='$id_pro' AND id_user = '$user' ");
        $to = mysqli_fetch_assoc($sql);
        $jml = $to['jumlah'];
        
        if ($jml <= 1) {
            mysqli_query($koneksi, "DELETE FROM keranjang WHERE id_produk ='$id_pro' AND id_user = '$user'  ");
        } else {
            mysqli_query($koneksi, "UPDATE keranjang SET jumlah = jumlah - 1 WHERE id_produk ='$id_pro' AND id_user = '$user'  ");
        }
    } else if (isset($_GET['delete'])) {
        mysqli_query($koneksi, "DELETE FROM keranjang WHERE id_produk ='$id_pro' AND id_user = '$user'  ");
    } else {

    $sql = mysqli_query($koneksi, "select status_keranjang from keranjang where id_produk = '$id_pro' and id_user='$user'");
    $ketemu = mysqli_num_rows($sql);
    $keranjang= $ketemu['status_keranjang'];

    $isi = mysqli_query($koneksi, "select id_produk from keranjang where id_produk = '$id_pro' and id_user='$user'");
    $ker = mysqli_num_rows($isi);
    


    if($ker == 0){
        mysqli_query($koneksi, "insert into keranjang (status_keranjang, id_produk,jumlah,harga,id_user) values ('P', '$id_pro', '1', '$harga', '$user')");
    }else {
        mysqli_query($koneksi, "update keranjang set jumlah = jumlah+1 where id_user='$user' and id_produk='$id_pro'");
    }
}
header('location: ../cart.php'); 
?> 