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
 
<?php
	
	$id = $_GET['id'];
	$data = mysqli_query($koneksi,"SELECT * FROM tbl_products where id='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
		<form method="post" action="update.php">
			<table>
            <tr>
                <td>id_category</td>
                <td>
                    <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                    <input type="number" name="id_category" value="<?php echo $d['id_category']; ?>">
                </td>
                
            </tr>
			<tr>			
				<td>product</td>
				<td><input type="text" name="product" value="<?php echo $d['product']; ?>"></td>
			</tr>
			<tr>
				<td>status</td>
				<td><input type="text" name="status" value="<?php echo $d['status']; ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="SIMPAN"></td>
			</tr>				
			</table>
		</form>
		<?php 
	}
	?>
</body>
</html>
