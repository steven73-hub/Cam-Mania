<?php

    include "../lib/koneksi.php";
    include "../lib/config.php";
    $user = $_GET['user'];

    // var_dump($user);
    // exit();

    $queryEdit = mysqli_query($koneksi, "UPDATE keranjang SET status_keranjang='checkout' WHERE id_user='$user'");
  
    if($queryEdit){
        echo "<script> alert('data keranjang berhasil diubah'); 
        window.location = '$base_url'+'checkout.php';</script>";
       
    } else {
        echo "<script> alert('data keranjang gagal diubah'); 
        window.location = '$base_url'+'cart.php';</script>";

    }

?>