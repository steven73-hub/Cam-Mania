<?php
session_start();
include "lib/koneksi.php";
// $user = $_SESSION['iduser'];

// var_dump($user);

include "template/header.php";
include "pages/main.php";
include "template/footer.php";

?>