<?php
// koneksi database
include ('koneksi.php'); 
 
// menangkap data yang di kirim dari form
$id = $_GET['id'];



$query = "delete from tbl_products where id='$id'";


if (mysqli_query($koneksi, $query)) {
    header("location:product.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}


?>
