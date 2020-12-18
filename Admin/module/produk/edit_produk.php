<?php 

if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
	echo "<center> untuk mengakses modul, anda harus login</br>";
	echo "<ahref=../../index.php?<b>Login</b></a></center>";
} else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- Require meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>Dashboard . Reza Admin</title>

<!-- Social network metas -->
<meta name="author" content="@FikkriReza">
<meta name="description" content="Open source responsive admin template with Bootstrap framework">

<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@FikkriReza">
<meta name="twitter:creator" content="@FikkriReza">

<meta property="fb:app_id" content="801699283982913">
<meta property="og:url" content="https://rezafikkri.github.io/Reza-Admin">
<meta property="og:title" content="Dashboard . Reza Admin">
<meta property="og:description" content="Open source responsive admin template with Bootstrap framework">
<meta property="og:image" content="https://rezafikkri.github.io/Reza-Admin/dist/img/rezaadmin.jpg">

<!-- Bootstrap CSS first -->
<link rel="stylesheet" href="../dist/css/bootstrap.min.css">
<!-- then Font Awesome -->
<link rel="stylesheet" type="text/css" href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css">
<!-- and Reza Admin CSS -->
<link rel="stylesheet" type="text/css" href="../dist/css/reza-admin.min.css">
<!-- Favicon -->
<link rel="icon" href="../dist/img/Reza_Admin.ico">
</head>
<body>		

<main class="main main--ml-sidebar-width">
	<section class="main__box">
	<h4>Tambah Produk</h4>

    <?php
            include "../lib/config.php";
            include "../lib/koneksi.php";

            $idProduk = $_GET['id_produk'];
            $queryEdit = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk='$idProduk'");

            $hasilQuery = mysqli_fetch_array($queryEdit);
            $idProduk = $hasilQuery['id_produk'];
            $idKategori = $hasilQuery['id_kategori'];
            $idMerek = $hasilQuery['id_merek'];
            $namaProduk = $hasilQuery['nama_produk'];
            $gambar = $hasilQuery['gambar'];
            $deskripsi = $hasilQuery['deskripsi'];
            $hargasewa = $hasilQuery['harga_sewa'];
            $stok = $hasilQuery['stok_barang'];
    ?>

	<form action="../Admin/module/produk/aksi_simpan_produk.php" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-sm-3"><!--left col-->
        <img src="upload/<?php echo $gambar;?>" class="avatar img-circle img-thumbnail" alt="avatar" id="box">
        <input type="file" class="text-center center-block file-upload" name="gambar" id="input" style="display: ;">
		<br><br>
		
		<hr>
          <ul class="list-group">
            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
          </ul> 
        </div><!--/col-3-->
    	<div class="col-sm-8">
          <!-- <div class="tab-content"> -->
            <div class="tab-pane active" id="home">
                  
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="first_name"><h6>Nama produk</h6></label>
                              <input type="text" class="form-control" name="nama_produk" placeholder="" value="<?php echo $namaProduk; ?>">
                              <input type="hidden" class="form-control" name="id_produk" placeholder="" value="<?php echo $idProduk; ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h6>Deskripsi</h6></label>
                              <input type="text" class="form-control" name="deskripsi" placeholder="" value="<?php echo $deskripsi; ?>">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h6>Harga Sewa</h6></label>
                              <input type="text" class="form-control" name="harga" placeholder="" value="<?php echo $hargasewa; ?>">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h6>Stok</h6></label>
                              <input type="text" class="form-control" name="stok" placeholder="" value="<?php echo $stok; ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h6>Kategori</h6></label>
							  	<select class="form-control" name="id_kategori">
									<?php
									include "../../../lib/config.php";
									include "../../../lib/koneksi.php";
									$kueriKategori=mysqli_query($koneksi, "SELECT * FROM kategori");
									while ($kat=mysqli_fetch_array($kueriKategori)){
									?>
									<option value ='<?php echo $kat['id_kategori']; ?>'><?php echo $kat['nama_kategori']; ?> </option>
									<?php } ?>
								</select>
						  </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h6>Merek</h6></label>
							  <select class="form-control" name="id_merek">
									<?php
									include "../../../lib/config.php";
									include "../../../lib/koneksi.php";
									$kueriKategori=mysqli_query($koneksi, "SELECT * FROM merek");
									while ($kat=mysqli_fetch_array($kueriKategori)){
									?>
									<option value ='<?php echo $kat['id_merek']; ?>'><?php echo $kat['nama_merek']; ?> </option>
									<?php } ?>
								</select>
                          </div>
                      </div>
                      
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Simpan Produk</button>
                               	<!-- <button class="btn btn-lg btn-success" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button> -->
                            </div>
                      </div>
              	</form>            
              
              </div>
			  </div>
			  </div>
          

        </div><!--/col-9-->
    </div><!--/row-->
				</section>
		</div>


	
</div>
</main>

<!-- footer -->
<footer class="footer footer--ml-sidebar-width">
	<p class="mb-2 mb-sm-0">Copyright &copy; Your Website 2020. All rights reserved</p>
	<p>Version 1.0.2</p>
</footer>

<!-- jQuery first, then Bootstrap JS, and Reza Admin JS-->
<script src="dist/js/jquery-3.5.1.slim.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<script src="dist/js/reza-admin.min.js"></script>

<!-- Optional Javascript -->
<script src="plugins/Chart.js/Chart.min.js"></script>

<script type="text/javascript">
	// visitor charts
	const visitorChart = document.querySelector("#visitor_chart").getContext('2d');
	let configVisitorChart = {
		type: 'line',
		data: {
			labels: ['Sunday, 11','Monday, 12','Tuesday, 13','Wednesday, 14','Thursday, 15','Friday, 16'],
			datasets: [{
				label: 'Visitors',
				data: [10,6,7,5,1,14],
				fill: 'origin',
				backgroundColor: 'rgba(37,151,224,.7)',
				borderColor: '#2597e0'
			}]
		},
		options: {
			maintainAspectRatio: false,
			legend: {
				display: false,
			},
			tooltips: {
				titleFontFamily: 'sans-serif',
				bodyFontFamily: 'sans-serif',
				backgroundColor: '#fff',
				titleFontColor: '#333',
				bodyFontColor: '#333',
				borderColor: '#e2e2e2',
				borderWidth: '1',
			}
		}
	}
	new Chart(visitorChart, configVisitorChart);

	// browser usage
	const browserUsageChart = document.querySelector("#browser_usage_chart").getContext('2d');
	let configBrowserUsageChart = {
		type: 'pie',
		data: {
			labels: ['Chrome','Mozilla','Uc Browser','Opera Mini'],
			datasets: [{
				data: [10,6,7,5],
				backgroundColor: [
					"#1bd741",
					"#2597e0",
					"#f9a022",
					"#dd2525"
				]
			}]
		},
		options: {
			maintainAspectRatio: false,
			legend: {
				display: true
			},
			tooltips: {
				titleFontFamily: 'sans-serif',
				bodyFontFamily: 'sans-serif',
				backgroundColor: '#fff',
				titleFontColor: '#333',
				bodyFontColor: '#333',
				borderColor: '#e2e2e2',
				borderWidth: '1',
			}
		}
	}
	new Chart(browserUsageChart, configBrowserUsageChart);

	// show more btn
	const showMoreBtn = document.querySelector("a.show-more-btn");
	if(showMoreBtn !== null) {
		showMoreBtn.addEventListener('click', function(e) {
			// not aktifkan fungsi default link
			e.preventDefault();

			let targetShowBtnMore = e.target;
			if(!targetShowBtnMore.classList.contains("show-more-btn")) targetShowBtnMore = e.target.parentElement;
			if(targetShowBtnMore.classList.contains("show-more-btn")) {
				targetShowBtnMore.nextElementSibling.classList.remove("d-none");
				setTimeout(function(){
					targetShowBtnMore.nextElementSibling.classList.add("d-none");
				}, 1000);
			}
		});
	}
	
</script>
<script>
inputBox = document.getElementById("input"); // Mengambil elemen tempat Input gambar

inputBox.addEventListener('change',function(input){ // Jika tempat Input Gambar berubah

 var box = document.getElementById("box"); // mengambil elemen box
 var img = input.target.files; // mengambil gambar

 var reader = new FileReader(); // memanggil pembaca file/gambar
 reader.onload = function(e){ // ketika sudah ada
  box.setAttribute('src',e.target.result); // membuat alamat gambar
 }
 reader.readAsDataURL(img[0]); // menampilkan gambar
}
); // manderser.blogspot.com
</script>
	<?php } ?>
</body>
</html>
