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

    $idkategori = $_POST['id_kategori'];
    $namakategori = $_POST['kategori'];
    $queryEdit = mysqli_query($koneksi, 
        "UPDATE kategori 
            SET nama_kategori   ='$namakategori'
        WHERE id_kategori       ='$idkategori' 
    ");

    if ($queryEdit) {
        echo "
            <script>  
                window.location ='$admin_url'+'adminweb.php?module=kategori';
            </script>";
    } else {
        echo "
        <script> 
            alert('Data Kategori Gagal diubah!');
            window.location = '$admin_url'+'adminweb.php?module=edit_kategori&id_kategori='+'$idkategori';
        </script>";
    }
}

?>