<?php
// $sid = session_id();
include "lib/koneksi.php";
// var_dump($user);

?>
<div class="cart-box">
    
    <div class="container">
    <form action="" method="post">
        <div class="row">
                <div class="col-lg-12">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Informasi Data Penyewa</h3>
                        </div>
                        
                            <?php
                                
                                $q = mysqli_query($koneksi, "select * from akun where id_user='$user'");
                                $data = mysqli_fetch_array($q);
                                // $id_kota = $data['id_kota'];

                            ?>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" id="firstName" placeholder="" value="<?php echo $data['nama'];?>" disabled>
                                    <!-- <div class="invalid-feedback"> Valid first name is required. </div> -->
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Email</label>
                                    <input type="email" name="email" class="form-control" id="lastName" placeholder="" value="<?php echo $data['email'];?>" disabled>
                                    <!-- <div class="invalid-feedback"> Valid last name is required. </div> -->
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="username">Alamat</label>
                                <div class="input-group">
                                    <input type="text" name="alamat" class="form-control" id="username" placeholder="<?php echo $data['alamat'];?>" disabled>
                                    <!-- <div class="invalid-feedback" style="width: 100%;"> Your username is required. </div> -->
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">No Telpon</label>
                                <input type="text" name="no_telp" class="form-control" id="email" placeholder="<?php echo $data['no_telp'];?>" disabled>
                                <!-- <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div> -->
                            </div>  
                                   
                    </div>
                </div>
            </div>
        <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Sub Total/Hari</th>
                                    <th>Durasi</th>
                                    <th>Total</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            include "lib/koneksi.php";
                                $sql = mysqli_query($koneksi, "select * from keranjang,produk where keranjang.id_user = '$user' and keranjang.id_produk = produk.id_produk and keranjang.status_keranjang='checkout'");
                                $i=0;
                                $total=0;
                                $a = 0;
                                
                                while($d = mysqli_fetch_array($sql)){
                                    
                                    $subtotal = $d['harga']*$d['jumlah'];
                                    $i++;
                                    
                                    $hargatotal[$i] = $subtotal;

                            ?>
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
									<img class="img-fluid" src="Admin/upload/<?php echo $d['gambar']; ?>" alt="" />
								</a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
                                        <?php echo $d['nama_produk']; ?>
								</a>
                                    </td>
                                    <td class="price-pr">
                                        <p>Rp. <?php echo number_format($d['harga']); ?></p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">
                                            

                                            <input class="cart_quantity_input" type="text" name="quantity" value="  <?= $d['jumlah']; ?>" autocomplete="off" size="2" disabled>

                                            
                                        </div>
                                    </td>
                                    <td class="total-pr">
                                        <p>Rp. <?php echo number_format($subtotal); ?></p>
                                    </td>
                                    
                                    <?php 
                                    $tes = mysqli_query($koneksi, "SELECT * from sewa where id_user ='$user'");
                                    $i=0;
                                    $total1 = 0;
                                    while($tot = mysqli_fetch_array($tes)){
                                        $durasi=$tot['durasi_sewa']+1;
                                        $awal = $tot['tgl_sewa'];
                                        $akhir = $tot['tgl_kembali'];

                                        
                                        $nilai = $durasi* $subtotal;
                                        $i++;
                                    
                                       
                                    ?> 
                                    <?php } ?>
                                    <td class="total-pr">
                                        <p><?php echo number_format($durasi); ?> Hari</p>
                                    </td>
                                    <td class="total-pr">
                                        <p>Rp. <?php echo number_format($nilai); ?></p>
                                    </td>
                                    
                                </tr>
                            </tbody>
                            <?php  $total += $nilai;} ?> 
                        </table>
                        
                    </div>
                    <hr>
                    <h5>Tanggal :  </h5>
                                <h5><?php echo $awal; ?> - <?php echo $akhir; ?></h5>
                    <div class="row">
                        <div class="col-lg-8 col-sm-12"></div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="order-box">
                            <div class="d-flex gr-total">
                                <h5>Total Biaya</h5>
                            <div class="ml-auto h5">
                                Rp.<?php echo number_format($total); ?>
                                
                            </div>
                            
                            </div>
                            
                            <div class="ml-auto h5">
                            
                            </div>
                            <hr>
                            <p class="font-italic">*Note : Tunjukkan Bukti booking ini di toko Cam Mania dan lakukan proses pembayaran saat proses pengambilan sebelum melewati tanggal yang telah di tentukan</p>
                            
                            </div>
                            <div class="ml-auto h5">
                            <hr>
                            </div>
                            </div>
                            </div>
                            <div class="col-12 d-flex shopping-box"><a href="aksi/aksi_cetak.php?iduser=<?php echo $user; ?>"  class="ml-auto btn hvr-hover">Cetak Bukti</a> </div>
                        <hr></div>

            </div>
            
        </div>
    </form>
    </div>
