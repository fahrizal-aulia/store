<?php
include('koneksi.php'); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Products</title>
</head>
<body>
 
	<h2>CRUD STORE</h2>
	<br/>
	<a href="category.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>FORM TAMBAH CATEGORY</h3>
	<form method="POST" action="tambah_cat_aksi.php">
		<table>
            <tr>			
				<td> Category Products </td>
				<td><input type="number" name="category_products"></td>
			</tr>
            <tr>			
				<td> Nama Category </td>
				<td><input type="text" name="nama_category"></td>
			</tr>
			<tr>
				<td> status </td>
				<td><input type="text" name="status"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="SIMPAN"></td>
			</tr>		
		</table>
	</form>
</body>
</html>
