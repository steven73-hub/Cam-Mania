<?php
include "../lib/koneksi.php";
include "../lib/config.php";

$user = $_GET['iduser'];


$sql = mysqli_query($koneksi, "SELECT * FROM `sewa` WHERE id_user='$user'");
while($d = mysqli_fetch_array($sql)){
    $set_tgl_awal = $d['tgl_sewa'];
    $set_tgl_akhir = $d['tgl_kembali'];
    $produk = $d['id_produk'];
    $durasi_sewa = $d['durasi_sewa'];
    
    $set_tgl_akhir = $d['tgl_kembali'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bukti Booking</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        function printContent(el) {
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
        }
    </script>
    <style>
        .container {
            margin: auto;

        }

        table {
            font-size: 8pt;
        }
    </style>
</head>

<body>

    <div class="container">
        <div>
            <a class="btn btn-primary" style="margin-top:20px;" href="../detail_booking.php">Kembali</a>
            <button class="btn btn-success" style="margin-top:20px; float:right" onclick="printContent('cetak')">Cetak</button>
        </div>

        <div id="cetak">
        <?php
        $sql = mysqli_query($koneksi, "SELECT * FROM akun WHERE id_user='$user'");
        $p = mysqli_fetch_array($sql);

        $nama = $p['nama'];
        $alamat = $p['alamat'];
        $no = $p['no_telp'];
        $email = $p['email'];
        ?>
            <h2>Nota Penyewaan</h2>
            <hr>
            <h5>Nama    : a/n <?php echo $nama; ?></h5>
            <h5>Email   : <?php echo $email; ?></h5>
            <h5>No Telp : <?php echo $no; ?></h5>
            <h5>Alamat  : <?php echo $alamat; ?></h5>
            
            <p>Tanggal Sewa : <?= date('d M Y', strtotime($set_tgl_awal)); ?> s/d <?= date('d M Y', strtotime($set_tgl_akhir)); ?></p>
            <p>Durasi : <?php echo $durasi_sewa+1; ?> Hari</p> 
            <table class="table table-bordered" cellpadding="7">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th style="width: 100px;">Tanggal Pemesanan</th>
                        <th>Nomor Nota</th>
                        <th style="width: 150px;">Nama Produk</th>
                        
                        <th>Harga Sewa</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Durasi</th>
                        
                        <th>Total</th>
                        <!-- <th>Qty</th>
                        <th style="width: 100px;">subTotal</th>
                        <th style="width: 100px;">Total Bayar</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $querys = mysqli_query($koneksi, "select * from keranjang,produk where keranjang.id_user = '$user' and keranjang.id_produk = produk.id_produk and keranjang.status_keranjang='checkout'");
                    $cek = mysqli_num_rows($querys);
                    if (empty($cek)) {
                        echo ' <tr><th colspan="14" height="100px"><center>tidak ada penjualan</center></th></tr> ';
                        $hid = 'hidden';
                    }else{
                        $i=0;
                        $total=0;
                        $a = 0;
                        while($cek = mysqli_fetch_array($querys)){
                           $harga_sewa = $cek['harga_sewa'];
                           $jumlah = $cek['jumlah'];

                          
                    $n = 1;
                    $t = 0;
                  

                    ?>
                        <tr>
                        <?php 
                                    $tes = mysqli_query($koneksi, "SELECT * from sewa where id_user ='$user'");
                                    $i=0;
                                    $total1 = 0;
                                    while($sewa = mysqli_fetch_array($tes)){
                                        $durasi=$sewa['durasi_sewa']+1;
                                        $awal = $sewa['tgl_sewa'];
                                        $akhir = $sewa['tgl_kembali'];
                                        $produk = $sewa['id_produk'];              
                        ?> 
                        <?php } ?>
                        <!--  -->
                            <td><?= $n;
                                    $n++; ?>
                            </td>
                            <td><?php echo $awal; ?></td>
                            <td>#IDP0</td>
                            <td><?php echo $cek['nama_produk']; ?></td>

                            <?php 
                                    $tes = mysqli_query($koneksi, "SELECT * from produk where id_produk ='$produk'");
                                    $i=0;
                                    $total1 = 0;
                                    while($tot = mysqli_fetch_array($tes)){
                                        
                                        $subtotal = $cek['harga']*$cek['jumlah'];
                                        $i++;
                                    
                                    $hargatotal[$i] = $subtotal; 

                                        
                                        $nilai = $subtotal*$durasi;
                                        
                                        $i++;
                                    
                                       
                            ?> 
                        <?php } ?>   
                            <td>Rp. <?php echo $harga_sewa; ?></td>
                            
                            <td><?php echo number_format($jumlah); ?> pcs</td>
                            <td>
                            Rp. <?php echo number_format($subtotal); ?> 
                            </td>
                            <td>
                            <?php echo $durasi; ?> Hari
                            </td>
                            <td>
                            Rp. <?php echo number_format($nilai);?> 
                            </td>

                            
                            <?php $total += $nilai;} ?>
                        </tr>
                        <?php } ?>       
                    <?php

                        
                        $t++;
                    
                    ?>
                    <?php
                    if (!empty($hid)) {
                    } else {
                    ?>
                        <tr>
                            <th colspan="8">Total : </th>
                            <td>Rp. <?php echo number_format($total); ?></td> 
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>