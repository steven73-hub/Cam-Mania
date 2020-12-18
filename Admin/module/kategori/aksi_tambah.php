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

//  untuk menangkap variable 'nama Kategori' yang dikirm okeh form_tambah.php
    $namaKategori = trim($_POST['kategori']);

    if($namaKategori == ""){
        echo    "<script>alert
        alert('Nama Katogori Harus di Isi'); 
        window.location = '../../adminweb.php?module=tambah_kategori';
        </script>";
    }else{

    // query untuk menympan ke tabel tbl_kategori
        $querySimpan = mysqli_query($koneksi, "INSERT INTO kategori (nama_kategori) VALUES ('$namaKategori')");

    // Jika query berhasil maka akan tampil alrt dan halaman akan kembali ke daftar kategori
        if ($querySimpan){
            echo    "<script> 
                    window.location = '../../adminweb.php?module=kategori';
                    </script>";
    //jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
        }else{
            echo "
            <script> 
                window.location = '../../../Admin/gagal.php?gagal=simpankategori';
            </script>";
        }
    }
};
?>