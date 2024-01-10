<?php
include('koneksi.php'); 

session_start();
$_SESSION["favcolor"] = "green";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Products</title>
</head>
<body>
    <h1>Daftar Produk</h1>
    <table border='1'>
    <h2>CRUD STORE</h2>
	<br/>
	<a href="tambah.php">+ TAMBAH BARANG</a>
	<span>  ||  </span>
	<a href="category.php">+ Category</a>
	<br/>
	<br/>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Produk</th>
                <th>Status</th>
                <th>action</th>
            </tr>
        </thead>


    <?php
		$no = 1;
		
		while($d = mysqli_fetch_array($result)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['nama_category']; ?></td>
				<td><?php echo $d['product']; ?></td>
				<td><?php echo $d['status']; ?></td>
				<td>
					<a href="edit.php?id=<?php echo $d['id']; ?>">EDIT</a> || 
					<a href="hapus.php?id=<?php echo $d['id']; ?>">HAPUS</a>
				</td>
			</tr>
			<?php 
		}
	?>
	

</body>
</html>
