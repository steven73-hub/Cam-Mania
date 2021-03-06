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
	<header class="main__header col-md-12 mb-2">
			<div class="main__title">
				<h4>Dashboard <?php echo $username ?></h4>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Home</a></li>
					<li class="breadcrumb-item active">Kategori</li>
				</ul>
			</div>				
		</header>
	<div class="row">
	

			<div class="mb-3 col-md-6 col-lg-4">
				<section class="info-box info-box--green">
				<?php
                    $sql = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM akun where level='3' and status_akun='aktif' ");
                    $member = mysqli_fetch_assoc($sql);
                ?>

					<div class="info-box__icon"><span class="fa fa-users"></span></div>
					<div class="info-box__description">
						<h2>Members</h2>
						<h1><?= $member['total'] ?></h1>
						
					</div>
					<a class="info-box__btn-detail" href="adminweb.php?module=member"><span class="fa fa-arrow-right"></span></a>
				</section>
			</div>
			<div class="mb-3 col-md-6 col-lg-4">
				<section class="info-box info-box--orange">
				<?php
                    $sql = mysqli_query($koneksi, "SELECT COUNT(*) AS booking FROM sewa where status_sewa='booking' ");
                    $booking = mysqli_fetch_assoc($sql);
                ?>


					<div class="info-box__icon"><span class="fa fa-shopping-cart"></span></div>
					<div class="info-box__description">
						<h2>Booking</h2>
						<h1><?= $booking['booking'] ?></h1>
						
					</div>
					<a class="info-box__btn-detail" href=""><span class="fa fa-arrow-right"></span></a>
				</section>
			</div>
			<div class="mb-3 col-md-6 col-lg-4">
				<section class="info-box info-box--red">
				<?php
                    $sql = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM sewa where status_sewa='disewa' ");
                    $sewa = mysqli_fetch_assoc($sql);
                ?>
					<div class="info-box__icon"><span class="fa fa-shopping-cart"></span></div>
					<div class="info-box__description">
						<h2>Di Sewa</h2>
						<h1><?= $sewa['total'] ?></h1>
						
					</div>
					<a class="info-box__btn-detail" href=""><span class="fa fa-arrow-right"></span></a>
				</section>
			</div>
			

	<div class="col-12 mb-4">
				<section class="main__box">
				
					<h5>Data Penyewa</h5>
					<hr>
					<table class="table table--blue mb-3">
						<thead>
							<tr>
								<th colspan="2">Action</th>
								<th>Nama</th>
								<th>Tanggal Sewa</th>
								<th>Tanggal Pengembalian</th>
								<th>Durasi Sewa</th>
								<th>Detail</th>
							</tr>
						</thead>
						<tbody>
						<?php
                            
                            $kueri_sewa = mysqli_query($koneksi, "SELECT DISTINCT id_user, tgl_sewa,tgl_kembali, durasi_sewa from sewa");
                            while ($pro = mysqli_fetch_array($kueri_sewa)) {
							$user_id = $pro['id_user'];
                        ?>   
							<tr>
								<td width="10"><a href="" class="text-hover-red"><span class="fa fa-trash"></span></a></td>
								<td width="10"><a href=""><span class="fa fa-edit"></span></a></td>
						
                            <?php
                            $kueri = mysqli_query($koneksi, "SELECT DISTINCT nama FROM `akun` WHERE id_user='$user_id'");
                            while ($akun = mysqli_fetch_array($kueri)) {
                            ?>
								<td><?= $akun['nama'] ?></td>
							<?php } ?>
								<td><?= $pro['tgl_sewa'] ?></td>
								<td><?= $pro['tgl_kembali'] ?></td>
								<td><?= $pro['durasi_sewa'] ?></td>
								<td width="30"><a href="<?php ?>" class="btn btn--red">Detail</a></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
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
	<?php } ?>
</body>
</html>
