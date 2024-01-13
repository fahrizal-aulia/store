<?php
include('koneksi.php'); 
session_start();
if (!empty($_POST)) {
    foreach ($_POST['jumlah_brg'] as $id => $jumlah_brg) {
        $_SESSION['keranjang'][$id] = max($jumlah_brg, 1);
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
        <form action="" method="post">
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
                    <th>Total Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $koneksi = mysqli_connect("localhost", "root", "", "store");
            $idProduk = array_keys($_SESSION['keranjang']);
            $query = 'SELECT tbl_products.*, tbl_category_product.nama_category FROM tbl_products INNER JOIN tbl_category_product ON tbl_products.id_category = tbl_category_product.id WHERE tbl_products.id IN (' . implode(',', array_fill(0, count($idProduk), '?')) . ')';
            $queery = $koneksi->prepare($query);
            $queery->bind_param(str_repeat('i', count($idProduk)), ...$idProduk);
            $queery->execute();
            $result = $queery->get_result();
            $total = 0;
            $no = 1;
            while ($produk = $result->fetch_assoc()) {
                        $total += $produk['harga'] * $_SESSION['keranjang'][$produk['id']];
                        
            ?>
                <tr>
                    <td><?php echo ($produk['id']) ?></td>
                    <td><?php echo ($produk['nama_category']) ?></td>
                    <td><?php echo ($produk['product']) ?></td>
                    <td><input type="number" name="jumlah_brg[<?php echo $produk['id'];?>]" value="<?php echo $_SESSION['keranjang'][$produk['id']];?>" class="form-control w-auto"></td>
                    <td><?php echo number_format($produk['harga'],0,',','.'); ?></td>
                    <td><?php echo number_format($produk['harga'] * $_SESSION['keranjang'][$produk['id']] ,0,',','.'); ?></td>
                    
                    <td>
                        <a href="hapus_keranjang.php?id=<?php echo $produk['id']; ?>" onclick="return confirm ('Apakah anda yakin menghapus produk ini ? ')">Hapus</a>
                    </td>
                
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-right">Total</td>
                    <td class="text-right h4 text-success">Rp <?php echo number_format($total,0,',','.'); ?></td>
                </tr>
            </tfoot>
        </table>
        <div class="text-right">
                <button type="submit" class="btn btn-primary">Update</button>
        </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
