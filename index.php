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
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"></head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tambah.php">Tambah Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="category.php">Category</a>
                    </li>
                </ul>
				<a class="navbar-brand ml-auto" href="keranjang.php"><i class="bi bi-cart"></i> Keranjang</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Daftar Produk</h1>
        <table class="table table-bordered mt-3">
            <h2>CRUD STORE</h2>
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Kategori</th>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th class="text-center">keranjang</th>
                    <th>Action</th>
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
                    <td><?php echo $d['jumlah']; ?></td>
                    <td><?php echo $d['harga']; ?></td>
                    <td><?php echo $d['status']; ?></td>
                    <td style="width: 32%;">
                        <form method="POST" action="tambah_keranjang.php?id=<?php echo $d['id']; ?>">
                            <div class="row">
                                <div class="col-4">
                                    <input type="number" value="1" name="jumlah_brg" class="form-control">
                                </div>
                                <div class="col-8" style="margin-right: -5px;">
                                    <button class="btn btn-primary" type="submit"><i class="bi bi-cart"></i> Tambah ke Keranjang</button>
                                </div>
                            </div>
                        </form>
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="edit.php?id=<?php echo $d['id']; ?>" class="btn btn-warning mr-2">EDIT</a>
                            <a href="hapus.php?id=<?php echo $d['id']; ?>" class="btn btn-danger">HAPUS</a>
                        </div>
                    </td>
                </tr>
                <?php 
            }
            ?>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
