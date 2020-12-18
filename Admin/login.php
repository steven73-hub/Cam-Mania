<?php

include "../lib/koneksi.php";

session_start();

$username = $_POST['username'];
$pass = $_POST['password'];

if (!ctype_alnum($username) OR !ctype_alnum($pass)) {
	echo "<center>Login gagal<br>
	username atau password anda tidak benar.<br>
	atau account anda sedang di blokir.<br>";

	echo "<a href=index.php><b>Ulangi lagi</b></a></center>";

} else{
	$login = mysqli_query($koneksi,"SELECT * FROM akun WHERE username ='$username' AND password = '$pass' ");
	$ketemu = mysqli_num_rows($login);
	$r = mysqli_fetch_array($login);
	var_dump($r);

if ($ketemu > 0){
	
	if($r['level']=="1"){
	$_SESSION['namauser'] = $r['username'];
	$_SESSION['passuser'] = $r['password'];

	header ("location:adminweb.php?module=home$idadmin=$r[username]");

	}else if($r['level']=="2"){
		// buat session login dan username
		$_SESSION['namauser'] = $r['username'];
		$_SESSION['passuser'] = $r['password'];
		
		header("location:adminweb.php?module=kategori$idadmin=$r[username]");
	}

} else{
	echo "<center>LOGIN GAGAL <br>
	username atau password anda tidak benar. <br>
	atau account anda sedang di blokir.<br>";
	echo "<a href = index.php><b>Ulangi lagi</b></a></center>";
}

}

?>