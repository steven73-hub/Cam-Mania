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
	

	<div class="col-12 mb-4">
				<section class="main__box">
					<h5>List Member</h5>
					<hr>
					<table class="table table--blue mb-3">
						<thead>
							<tr>
								
								<th>username</th>
								<th>password</th>
								<th>Nama Lengkap</th>
								<th>alamat</th>
								<th>No Telepon</th>
								<th>Status</th>
								<th colspan="2"><center>Action</center></th>
								
							</tr>
						</thead>
						<tbody>
						<?php
                            include "../lib/config.php";
                            include "../lib/koneksi.php";
                            $kueri_member = mysqli_query($koneksi, "SELECT * FROM akun where level='3'");
                            while ($mem = mysqli_fetch_array($kueri_member)) {
                        ?>
							<tr>
								<td><?php echo $mem['username']; ?></td>
								<td><?php echo $mem['password']; ?></td>
								<td><?php echo $mem['nama']; ?></td>
								<td><?php echo $mem['alamat']; ?></td>
								<td><?php echo $mem['no_telp']; ?></td>
								<td><?php echo $mem['status_akun']; ?></td>
								
								<!-- <td width="10"><a href="" class="text-hover-red"><span class="fa fa-trash"></span></a></td> -->
								<!-- <td width="30"><a href="<?php $admin_url; ?>adminweb.php?module=detail_member&idm=<?php echo $mem['id_user']; ?>" class="btn btn--red">Hapus</a></td> -->
								<!-- <td width="10"><a href=""><span class="fa fa-power-off"></span></a></td> -->
								<td width="30"><a href="<?php $admin_url; ?>adminweb.php?module=detail_member&idm=<?php echo $mem['id_user']; ?>" class="btn btn--blue">Detail</a></td>
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
