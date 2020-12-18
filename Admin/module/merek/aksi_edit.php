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

    $idmerek = $_POST['id_merek'];
    $namamerek = $_POST['merek'];
    $queryEdit = mysqli_query($koneksi, 
        "UPDATE merek 
            SET nama_merek   ='$namamerek'
        WHERE id_merek       ='$idmerek' 
    ");

    if ($queryEdit) {
        echo "
            <script>  
                window.location ='$admin_url'+'adminweb.php?module=merek';
            </script>";
    } else {
        echo "
        <script> 
            alert('Data Kategori Gagal diubah!');
            window.location = '$admin_url'+'adminweb.php?module=edit_merek&id_merek='+'$idmerek';
        </script>";
    }
}

?>a