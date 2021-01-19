<?php
session_start();

if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo " 
    <script> 
        window.location = '../../../Admin/gagal.php?gagal=akses';
    </script>";
} else {

    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";

    $idmerek = $_GET['id_merek'];
    $queryHapus = mysqli_query($koneksi, 
        "DELETE FROM merek WHERE id_merek ='$idmerek'");

    if ($queryHapus) {
        echo "
            <script> 
                window.location = '$admin_url'+'adminweb.php?module=merek';
            </script>";
    } else {
        echo "
        <script> 
            window.location = '$admin_url'+'adminweb.php?module=merek';
        </script>";
    }
}

?>