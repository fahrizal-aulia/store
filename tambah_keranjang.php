<?php 
include('koneksi.php'); 
session_start();
if (!isset($_GET['id']) || empty($_GET['id']) ){
    header ("location: keranjang.php");
    exit;
}

$jumlah_brg = 1;
if (isset($_POST['jumlah_brg'])){
    $jumlah_brg = max($_POST['jumlah_brg'],1);
}

if (!isset($_SESSION['keranjang'])){
    $_SESSION['keranjang']=[];
}
$id= $_GET['id'];
if (!isset($_SESSION['keranjang'][$id])){
    $_SESSION['keranjang'][$id]=$jumlah_brg;
}else{
    $_SESSION['keranjang'][$id] += $jumlah_brg;
}
header ("location: keranjang.php");
exit;
?>