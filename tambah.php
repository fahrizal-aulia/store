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
	<a href="tambah.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>FORM TAMBAH BARANG</h3>
	<form method="POST" action="tambah_aksi.php">
		<table>
            <tr>
                <td>id_category</td>
                <td><input type="number" name="id_category"></td>
            </tr>
			<tr>			
				<td>product</td>
				<td><input type="text" name="product"></td>
			</tr>
			<tr>
				<td>status</td>
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
