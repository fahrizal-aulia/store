<?php
// koneksi database
include ('koneksi.php'); 
 
// menangkap data yang di kirim dari form
$id_category = $_POST['id_category'];
$product = $_POST['product'];
$status = $_POST['status'];


$query = "INSERT INTO tbl_products (id_category, product, status) VALUES ( '$id_category','$product', '$status')";


if (mysqli_query($koneksi, $query)) {
    header("location:product.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}


?>
