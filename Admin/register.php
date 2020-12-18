<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Require meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Register Page . Reza Admin</title>

    <!-- Social network metas -->
    <meta name="author" content="@FikkriReza">
    <meta name="description" content="Open source responsive admin template with Bootstrap framework">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@FikkriReza">
    <meta name="twitter:creator" content="@FikkriReza">

    <meta property="fb:app_id" content="801699283982913">
    <meta property="og:url" content="https://rezafikkri.github.io/Reza-Admin">
    <meta property="og:title" content="Register Page . Reza Admin">
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

	<div class="container-fluid">
		<div class="register">
			<div class="register__content mt-3">
				<div class="register__head">
					<a href=""><img src="dist/img/Reza_Admin.svg"></a>
					<h5 class="mt-3">Create an Account</h5>
				</div>
				<div class="register__form">
					<form action="page/aksi_daftar.php" method="post">
					
                    <form>
                        <div class="form-row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" name="username" placeholder="Username ..." class="form form--focus-blue mt-0">
                            </div>
                            <div class="col-sm-6">
                                <input type="password" name="password" placeholder="Password ..." class="form form--focus-blue mt-0">
                            </div>
                        </div>
						<input type="text" name="nama" placeholder="Nama Lengkap ..." class="form form--focus-blue">
                        <input type="email" name="email" placeholder="Email ..." class="form form--focus-blue">

                        <div class="form-group">
                            <input type="text" name="alamat" placeholder="Alamat ..." class="form form--focus-blue">
                            <!-- <small id="input-help" class="form-text text-muted">Masukkan kombinasi dari paling sedikit 8 karakter dan angka</small> -->
                        </div>

                        <input type="text" name="telpon" placeholder="No Telepon ..." class="form form--focus-blue">

                        <div class="register__form-action mt-3">
						<div class="form-check mb-2 mb-sm-0">
                                <input type="checkbox" name="input_check" id="input_check" class="form form--focus-blue">
                                <label for="input_check" class="label--check">Saya setuju dengan syarat-syarat</a></label>
                            </div> 
                            <button type="submit" class="btn btn--blue">Daftar</button>
                        </div>
                    </form>
                </div>	
			</div>
			<a href="index.php" class="btn btn--link mb-3">Already have account? Login!</a>
		</div>
	</div>

</body>
</html>