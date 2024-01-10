<?php 
//koneksi line
$koneksi = mysqli_connect("localhost","root","","store");

if ($koneksi->connect_error) {
    die("koneksi Ke database Gagal: " . $koneksi->connect_error);

}else {
    // echo "Koneksi database berhasil! <br><br>";
    // $query = "SELECT * FROM tbl_products";
    // $query = "SELECT product, status, nama_category FROM tbl_products INNER JOIN tbl_category_product ON tbl_products.id_category = tbl_category_product.id;";
    $query = "SELECT tbl_products.product, tbl_products.status, tbl_category_product.nama_category FROM tbl_products INNER JOIN tbl_category_product ON tbl_products.id_category = tbl_category_product.id;";

    $query1 = "SELECT * FROM tbl_category_product";
    $result = $koneksi->query($query);
    $result1 = $koneksi->query($query1);
}


?>