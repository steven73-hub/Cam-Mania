<?php 
// session_start();
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
		<div class="row">
			<header class="main__header col-md-12 mb-2">
				<div class="main__title">
					<h4>Dashboard <?php echo $username ?></h4>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html">Home</a></li>
						<li class="breadcrumb-item active">Kategori</li>
					</ul>
				</div>				
			</header>
		</div><!-- row -->

		<div class="col-12 mb-4">
        <form class="form-horizontal" action="../Admin/module/merek/aksi_tambah.php" method="POST">
				<section class="main__box">
					<h5>Tambah Merek</h5>
					<hr>
					<table class="table table--gray">
						
						<tbody>
							<tr>
                            <label></label>
                                <input type="text" name="merek" placeholder="Nama merek" class="form form--focus-blue">
								
							</tr>

						</tbody>
						
					</table>
					<br><br>
					<div class = "box-footer">
						<a href="">
						<button class="btn btn-primary">Tambahkan</button>
					</div>
                </section>
        </form>
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
