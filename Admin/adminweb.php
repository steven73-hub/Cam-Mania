<?php
session_start();

include "../lib/config.php";
  include "../lib/koneksi.php";

if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login </br>";
    echo "<a href=$admin_url><b>LOGIN</b></a></center>";
} else {
  

  $r['username'] = $_SESSION['namauser'];
  $user = $r['username'];

  $queryAdmin = mysqli_query($koneksi, "SELECT * FROM akun WHERE username ='$user' ");
  
  $hasilQuery = mysqli_fetch_array($queryAdmin);
      $username    = $hasilQuery['username'];
	  $nama_admin  = $hasilQuery['nama']; 
	  $level 	   = $hasilQuery['level'];

	//   var_dump($_SESSION);
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
	<link rel="stylesheet" href="dist/css/bootstrap.min.css">
	<!-- then Font Awesome -->
	<link rel="stylesheet" type="text/css" href="plugins/font-awesome-4.7.0/css/font-awesome.min.css">
	<!-- and Reza Admin CSS -->
	<link rel="stylesheet" type="text/css" href="dist/css/reza-admin.min.css">
	<!-- Favicon -->
	<link rel="icon" href="dist/img/Reza_Admin.ico">
</head>
<body>		
	<!-- navbar -->
	<nav class="navbar navbar-expand-sm navbar--white">
		<a class="navbar__sidebar-toggler" href="#"><span class="fa fa-bars"></span></a>
		<a class="navbar-brand ml-3" href="index.html"><img src="dist/img/Reza_Admin.svg" width="120" alt="logo reza"></a>
		<button class="navbar-toggler" data-target="#navbarNav" data-toggle="collapse" type="button">
		    <span class="fa fa-navicon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item navbar__notification">
					<a class="nav-link" href="#">
						<span class="fa fa-bookmark"></span>
						<span class="navbar__notification-number navbar__notification-number--blue">2</span>
					</a>
				</li>
				<li class="nav-item navbar__notification">
					<a class="nav-link " href="#">
						<span class="fa fa-bell"></span>
						<span class="navbar__notification-number navbar__notification-number--orange">2</span>
					</a>
				</li>
				<li class="nav-item navbar__avatar dropdown">
					<a class="nav-link " href="#" data-toggle="dropdown">
						<img src="dist/img/reza.jpg" alt="avatar image">
						
						
						<span><?php echo $nama_admin?> (<?php echo $username ?>)</span>
					</a>
					
				</li>
			</ul>
		</div>
	</nav>

	<!-- sidebar -->
	<aside class="sidebar">
		<ul class="sidebar__nav">
			<li class="sidebar__item "><a class="nav-link" href="adminweb.php?module=home"><span class="fa fa-home"></span> Home</a></li>
			<li class="sidebar__item"><a href="adminweb.php?module=kategori"><span class="fa fa-th-list"></span> Kategori</a></li>
			<li class="sidebar__item"><a href="adminweb.php?module=merek"><span class="fa fa-server"></span> Merek</a></li>
			<li class="sidebar__item"><a href="adminweb.php?module=penyewa"><span class="fa fa-user-circle-o"></span> List Penyewa</a></li>
			<li class="sidebar__item"><a href="adminweb.php?module=member"><span class="fa fa-vcard-o"></span> Member</a></li>
			<li class="sidebar__item"><a href="adminweb.php?module=produk"><span class="fa fa-th-large"></span> Produk</a></li>
			
			<?php 
			if($level=="1"){ 
			
			?>
				<li class="sidebar__item sidebar__item--header mt-3">Important for read</li>
				<li class="sidebar__item"><a href="docs/"><span class="fa fa-book"></span> Cetak Laporan</a></li>
			<?php } ?>
			<li class="sidebar__item"><a href="index.php"><span class="fa fa-power-off"></span> Logout</a></li>
			
		</ul>
	</aside>

	<!-- main -->
	<?php    
            if ($_GET['module'] == 'home') {
                include "module/home/home.php";
//profil
            } elseif ($_GET['module'] == 'profil') {
              include "profil/profil.php";              
//KATEGORI                
            } elseif ($_GET['module'] == 'kategori') {
                include "module/kategori/kategori.php";
            } elseif ($_GET['module'] == 'tambah_kategori') {
                include "module/kategori/form_tambah.php";
            } elseif ($_GET['module'] == 'edit_kategori') {
                include "module/kategori/edit_kategori.php";

//MEREK
            } elseif ($_GET['module'] == 'merek') {
                include "module/merek/merek.php";
            } elseif ($_GET['module'] == 'tambah_merek') {
                include "module/merek/tambah_merek.php";
            } elseif ($_GET['module'] == 'edit_merek') {
                include "module/merek/edit_merek.php";
//PRODUK
            } elseif ($_GET['module'] == 'produk') {
              include "module/produk/produk.php";
            } elseif ($_GET['module'] == 'tambah_produk') {
              include "module/produk/form_tambah_produk.php";
            } elseif ($_GET['module'] == 'edit_produk') {
              include "module/produk/edit_produk.php";
            
//penyewa
            } elseif ($_GET['module'] == 'penyewa') {
              include "module/penyewa/list_penyewa.php";
            } elseif ($_GET['module'] == 'tambah_kota') {
              include "module/penyewa/form_tambah_kota.php";
            } elseif ($_GET['module'] == 'edit_kota') {
              include "module/penyewa/form_edit_kota.php";
            
  //member
            } elseif ($_GET['module'] == 'member') {
              include "module/member/member.php";
            } elseif ($_GET['module'] == 'detail_member') {
            include "module/member/detail_member.php";

 //profil

            } elseif ($_GET['module'] == 'profil') {
            include "module/home/home.php";
            } elseif ($_GET['module'] == 'editprofil') {
            include "profil/edit_profil.php";
//pemesanan
          } elseif ($_GET['module'] == 'pemesanan') {
            include "module/pemesanan/list_pemesanan.php";
          } elseif ($_GET['module'] == 'detail_pemesanan') {
            include "module/pemesanan/detail_pemesanan.php";

          

//BIAYA KIRIM
            } elseif ($_GET['module'] == 'biaya') {
            include "module/biaya/list_biaya_kirim.php";
            } elseif ($_GET['module'] == 'tambah_biaya') {
            include "module/biaya/form_tambah_biaya.php";
            } elseif ($_GET['module'] == 'edit_biaya') {
            include "module/biaya/form_edit_biaya.php";
            } else {
            include "module/home/home.php";
            }



          
        ?>

	<!-- footer -->
	<footer class="footer footer--ml-sidebar-width">
		<p class="mb-2 mb-sm-0">Copyright &copy; Your Website 2020. All rights reserved</p>
		<p>Version 1.0.2</p>
	</footer>
	<?php } ?>
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

</body>
</html>
