<?php
include "lib/koneksi.php";
?>
<div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total Harga Sewa/hari</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            include "lib/koneksi.php";
                                $sql = mysqli_query($koneksi, "select * from keranjang,produk where keranjang.id_user = '$user' and keranjang.id_produk = produk.id_produk and keranjang.status_keranjang='P'");
                                $i=0;
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
                                            <a class="cart_quantity_up" href="aksi/aksi_keranjang.php?id_produk=<?= $d['id_produk']; ?>&harga=<?= $d['harga']; ?>"> + </a>

                                            <input class="cart_quantity_input" type="text" name="quantity" value="  <?= $d['jumlah']; ?>" autocomplete="off" size="2" disabled>

                                            <a class="cart_quantity_down" href="aksi/aksi_keranjang.php?id_produk=<?= $d['id_produk']; ?>&harga=<?= $d['harga']; ?>&minus"> - </a>
                                        </div>
                                    </td>
                                    <td class="total-pr">
                                        <p>Rp. <?php echo number_format($subtotal); ?></p>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="aksi/aksi_hapus_keranjang.php?id_produk= <?php echo $d['id_produk'];?>">
									<i class="fas fa-times"></i>
								</a>
                                    </td>
                                </tr>
                                
                                <?php } ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Total Harga</h5>
                            
                        <?php 
                         $cek = mysqli_query($koneksi, "select * from keranjang where id_user='$user'");
                            if(!empty($hargatotal)){ 
                        ?>    
                        <div class="ml-auto h5">
                            Rp. <?php echo number_format(array_sum($hargatotal), 0, '', '.'); ?>
                        </div>
                        <?php }else{ ?>
                            <div class="ml-auto h5">
                                Rp. 0
                            </div>
                        <?php } ?>
                        </div>
                        <hr> </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="aksi/aksi_checkout.php?user=<?php echo $user; ?>" onclick="return  confirm('apa kamu yakin?')" class="ml-auto btn hvr-hover">Checkout</a> </div>
            </div>
            
        </div>
    </div>