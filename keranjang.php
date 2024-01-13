<?php
include('koneksi.php'); 
session_start();
if (!empty($_POST)) {
    foreach ($_POST['qty'] as $id => $jumlah) {
        $_SESSION['keranjang'][$id] = max($jumlah, 1);
    }

    header('Location: keranjang.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Products</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tambah.php">Tambah Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="category.php">Category</a>
                    </li>
                </ul>
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
                    <th>keranjang</th>
                    <th>Action</th>
                </tr>
            </thead>

            <?php 
            $koneksi = mysqli_connect("localhost", "root", "", "store");
            $query = 'SELECT * FROM tbl_products WHERE id IN (';
            $idProduk = array_keys($_SESSION['keranjang']);
            $query .= implode(',', array_fill(0, count($idProduk), '?'));
            $query .= ')';
            
            $queery = $koneksi->prepare($query);
            $types = str_repeat('i', count($idProduk));
            $queery->bind_param($types, ...$idProduk);
            $queery->execute();

            $result = $queery->get_result();

            if (!$result) {
                die('Error fetching results: ' . $koneksi->error);
            }

            $total = 0;
            $jumlah = 0;
            while ($produk = $result->fetch_assoc()) {
            ?>

                <tr>
                    <td><?php echo htmlentities($produk['id']) ?></td>
                    <td><input type="number" value="<?php echo $_SESSION['keranjang'][$produk['id']];?>" class="form-control w-auto"></td>
                    <td><?php echo number_format($produk['harga'],0,',','.'); ?></td>
                    <td><?php echo number_format($produk['harga'] * $_SESSION['keranjang'][$produk['id']] ,0,',','.'); ?></td>
                    
                    <td>
                        <a href="#">Hapus</a>
                    </td>
                
                </tr>
            <?php } ?>
        
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
