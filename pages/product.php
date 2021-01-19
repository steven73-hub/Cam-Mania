
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                
                                </div>
                                <p>Showing all Product</p>
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                    <?php
                                    include "lib/koneksi.php";
                                        $q = mysqli_query($koneksi, "select * from produk order by id_produk desc limit 6");
                                        while($r=mysqli_fetch_array($q))
                                        {
                                    ?>
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="new">Stok: <?php echo $r['stok_barang'] ?></p>
                                                    </div>
                                                    <img src="Admin/upload/<?php echo $r['gambar'] ?>" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                            
                                                        </ul>
                                                        <a class="cart" href="aksi/aksi_keranjang.php?id_produk=<?php echo $r['id_produk']; ?>&harga=<?php echo $r['harga_sewa'] ?>">Tambahkan</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4><center><?php echo $r['nama_produk'] ?></center></h4>
                                                    <h5> Rp. <?php echo number_format($r['harga_sewa'])?></h5>

                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>

                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="list-view">
                                    <div class="list-view-box">
                                        <div class="row">       
                                        <?php
                                            include "lib/koneksi.php";
                                                $q = mysqli_query($koneksi, "select * from produk order by id_produk desc limit 6");
                                                while($r=mysqli_fetch_array($q))
                                                {
                                        ?>
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <div class="type-lb">
                                                            <p class="new">Stok : <?php echo $r['stok_barang'] ?></p>
                                                        </div>
                                                        <img src="admin/upload/<?php echo $r['gambar'] ?>" class="img-fluid" alt="Image">
                                                        <div class="mask-icon">
                                                            <ul>
                                                                <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                               
                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                <div class="why-text full-width">
                                                    <h4><?php echo $r['nama_produk'] ?></h4>
                                                    <h5>Rp. <?php echo number_format($r['harga_sewa'])?></h5>
                                                    <!-- <h5> <del>$ 60.00</del> $40.79</h5> -->
                                                    <p><?php echo $r['deskripsi'] ?></p>
                                                    <a class="btn hvr-hover" href="aksi/aksi_keranjang.php?id_produk=<?php echo $r['id_produk']; ?>&harga=<?php echo $r['harga_sewa'] ?>">Tambahkan</a>
                                                </div>
                                            </div>
                                            
                                            <?php } ?>
                                        
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->

