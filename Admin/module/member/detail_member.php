<?php 

if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
	echo "<center> untuk mengakses modul, anda harus login</br>";
	echo "<ahref=../../index.php?<b>Login</b></a></center>";
} else{
    include "../lib/koneksi.php";
    include "../lib/config.php";

    $idm = $_GET['idm'];


    $queryEdit = mysqli_query($koneksi, "SELECT * FROM akun where id_user='$idm' ");
    $mem = mysqli_fetch_array($queryEdit);
        // $id_kota = $pro['id_kota'];
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
                
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Detail Member</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="module/member/aksi_edit_member.php" method="POST">
                    <input type="hidden" name="id_user" value="<?= $mem['id_user']; ?>">
                    <div class="box-body">
                        <div class="row">
					<div class="col-sm-3">	
					<div class="form-control" style="border: 0px solid black;">#ID0<?php echo $mem['id_user']; ?></div>
					<div class="text-center">
						<img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
						<h6>Upload a different photo...</h6>
						
					</div></hr><br>


					<ul class="list-group">
						<li class="list-group-item text-muted">Status <span class=" text-danger">(<?= $mem['status_akun']; ?>)</span></li>
						<li class="list-group-item text-right"><span class="pull-left">
							<input type="radio" name="status" class="minimal-red" <?php if ($mem['status_akun'] == 'Aktif') echo 'checked'; ?> value="aktif"> Aktif </span>
							<input type="radio" name="status" class="minimal-red" <?php if ($mem['status_akun'] == 'tidak aktif') echo 'checked'; ?> value="Tidak Aktif"> tidak aktif </span>
						</li>
          			</ul> 
               
          
						</div><!--/col-3-->
						<div class="col-sm-9">
					<div class="tab-content">
						<div class="tab-pane active" id="home">
							<hr>
							<form class="form" action="##" method="post" id="registrationForm">
								<div class="form-group">
					
                        <div class="col-xs-6">
                              <label for="first_name"><h6>Username</h6></label>
                              <input type="text" class="form-control" name="username" id="Username" placeholder="" value="<?php echo $mem['username']; ?>" disabled>
                          </div>
						</div>
						
						<div class="form-group">
                          
                    <div class="col-xs-6">
                            <label for="last_name"><h6>Password</h6></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="" value="<?php echo $mem['password']; ?>" disabled>
                          </div>
                	</div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h6>Nama Lengkap</h6></label>
                              <input type="nama" class="form-control" name="nama" id="nama" placeholder="" value="<?php echo $mem['nama']; ?>" disabled>
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h6>Email</h6></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="" value="<?php echo $mem['email']; ?>" disabled>
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="alamat"><h6>Alamat</h6></label>
                              <input type="text" name="alamat" class="form-control" id="location" placeholder="" value="<?php echo $mem['alamat']; ?>" disabled>
                          </div>
                      </div>
                      <div class="form-group">
                          
                          
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label><h6>No telpon</h6></label>
                              <input type="text" class="form-control" name="no_telp" id="telpon" placeholder="" value="<?php echo $mem['no_telp']; ?>" disabled>
                          </div>
                      </div>
                      
              	</form>
              
              <hr>
              </div><!--/tab-pane-->
          	
			
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <a href="adminweb.php?module=member" class="btn btn-default" type="cancel">Back</a>
                        <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                    </div>
                </form>
            </div><!-- /.box -->
       
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
