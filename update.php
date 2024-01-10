<?php
// koneksi database
include ('koneksi.php'); 
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$id_category = $_POST['id_category'];
$product = $_POST['product'];
$status = $_POST['status'];


$query = "update tbl_products set id_category='$id_category',product='$product',status='$status' where id='$id'";


if (mysqli_query($koneksi, $query)) {
    header("location:product.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}


?>
