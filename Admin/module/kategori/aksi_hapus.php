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

    $idkategori = $_GET['id_kategori'];
    $queryHapus = mysqli_query($koneksi, 
        "DELETE FROM kategori WHERE id_kategori ='$idkategori'");

    if ($queryHapus) {
        echo "
            <script> 
                window.location = '$admin_url'+'adminweb.php?module=kategori';
            </script>";
    } else {
        echo "
        <script> 
            window.location = '../../../Admin/gagal.php?gagal=hapuskategori';
        </script>";
    }
}

?>