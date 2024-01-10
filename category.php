<?php
include('koneksi.php'); 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Daftar Category Produk <?php echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>"; ?></h1>
    <table border='1'>
    <h2>CRUD STORE</h2>
	<br/>
	<a href="index.php">Home</a>
    <span>  ||  </span>
	<a href="tambah_category.php">+ TAMBAH Category</a>
	<br/>
<br/>
        <thead>
            <tr>
                <th>ID</th>
                <th>Kategori product</th>
                <th>nama kategori</th>
                <th>Status</th>
                <th>action</th>
            </tr>
        </thead>


    <?php
		$no = 1;
		
		while($cat = mysqli_fetch_array($result1)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $cat['category_products']; ?></td>
				<td><?php echo $cat['nama_category']; ?></td>
				<td><?php echo $cat['status']; ?></td>
				<td>
					<a href="edit.php?id=<?php echo $cat['id']; ?>">EDIT</a> || 
					<a href="hapus.php?id=<?php echo $cat['id']; ?>">HAPUS</a>
				</td>
			</tr>
			<?php 
		}
		


    ?>
</body>
</html>