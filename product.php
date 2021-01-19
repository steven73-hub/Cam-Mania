<?php

session_start();
// $user = $_SESSION['iduser'];
include "lib/koneksi.php";
// include "../lib/config.php";


include "template/header.php";
include "template/side_kiri.php";
include "pages/product.php";

include "template/footer.php";


?>