<?php
// koneksi database
include ('koneksi.php'); 
 
// menangkap data yang di kirim dari form
$category_products = $_POST['category_products'];
$nama_category = $_POST['nama_category'];
$status = $_POST['status'];


$query = "INSERT INTO tbl_category_product (category_products, nama_category, status) VALUES ( '$category_products','$nama_category', '$status')";


if (mysqli_query($koneksi, $query)) {
    header("location:category.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}


?>
