<?php
session_start();
$user = $_SESSION['iduser'];

// var_dump($user);
if(!empty($_SESSION['iduser'])){
    // echo
    include "template/header.php";
    include "pages/checkout.php";
    include "template/footer.php";
}else{
    header("location:login.php");
}

?>