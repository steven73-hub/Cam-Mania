<div class="cart-box-main">
        <div class="container">
        <form action="aksi/aksi_booking.php" method="post">
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
                                    <th>Total</th>
                                    <th>Hapus</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            include "lib/koneksi.php";
                                $sql = mysqli_query($koneksi, "select * from keranjang,produk where keranjang.id_user = '$user' and keranjang.id_produk = produk.id_produk and keranjang.status_keranjang='checkout'");
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
                                            <input class="cart_quantity_input" type="text" name="quantity" value="  <?= $d['jumlah']; ?>" autocomplete="off" size="2" disabled> 
                                            <!-- <input type="text" name="produk" value="  <?= $d['id_produk']; ?>">  -->
                                        </div>
                                    </td>
                                    <td class="total-pr">
                                        <p>Rp. <?php echo number_format($subtotal); ?></p>
                                        <!-- <input type="text" name="subtotal" value="  <?= $subtotal; ?>">  -->
                                    </td>
                                    <td class="remove-pr">
                                        <a href="aksi/aksi_hapus_checkout.php?id_produk= <?php echo $d['id_produk'];?>">
									<i class="fas fa-times"></i>
								</a>
                                    </td>
                                    
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
                
            </div>
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

                            <div class="row">
                                <div class="col-sm-6">
                                    <lebel>Date Range :</lebel>
                                    <input type="text" class="form-control" name="datetimes" placeholder="" required>
                                </div>
                                <div class="col-sm-6">
                                    <lebel></lebel><br>
                                    <button type="submit" class="btn btn-info" name="submit" a href="">pilih tanggal</button>
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>