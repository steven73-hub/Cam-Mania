<?php
session_start();

if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo " 
    <script> 
        window.location = '../../../admin/gagal.php?gagal=akses';
    </script>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idKategori = $_GET['kategori'];

    // echo $idkategori;
    // exit();
    $queryHapus = mysqli_query($koneksi, 
        "DELETE FROM kategori WHERE id_kategori ='$idKategori'");

    if ($queryHapus) {
        echo "
            <script> 
                window.location = '$admin_url'+'adminweb.php?module=kategori';
            </script>";
    } else {
        echo "
        <script> 
            window.location = '$admin_url'+'adminweb.php?module=kategori';
        </script>";
    }
}

?>