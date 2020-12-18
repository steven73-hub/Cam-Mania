<?php
session_start();

if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo " 
    <script> 
        window.location = '../../../Admin/gagal.php?gagal=akses';
    </script>";
} else {
//aksi untuk menyimpan kategori baru ke database
    include "../../../lib/config.php";
    include "../../../lib/koneksi.php";


    echo $namamerek = trim($_POST['merek']);

    $namamerek = trim($_POST['merek']);

    if($namamerek == ""){
        echo    "<script>alert
        alert('Nama Kategori Harus di Isi'); 
        window.location = '../../adminweb.php?module=tambah_merek';
        </script>";
    }else{

    // query untuk menympan ke tabel tbl_kategori
        $querySimpan = mysqli_query($koneksi, "INSERT INTO merek (nama_merek) VALUES ('$namamerek')");

    // Jika query berhasil maka akan tampil alrt dan halaman akan kembali ke daftar kategori
        if ($querySimpan){
            echo    "<script> 
                    window.location = '../../adminweb.php?module=merek';
                    </script>";
    //jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
        }else{
            echo "
            <script> 
                window.location = '../../../Admin/gagal.php?gagal=simpanmerek';
            </script>";
        }
    
}
}
?>