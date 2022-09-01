<?php 	
//koneksi ke database
require('../data/functions.php');
$instruktur = query("SELECT * FROM instruktur ORDER BY id ASC");

//tombol cari ditekan
if(isset($_POST["cari"])) {
	$instruktur = cari ($_POST["keyword"]);

}
?>

<?php require('header.php');

include("koneksi.php");

$strQuery = " SELECT * FROM instruktur; ";

$query = mysqli_query($conn, $strQuery) or die(mysqli_error());

?>

<h1>Daftar Instruktur</h1>
   <tr>

        <a href="pengajar_add.php?id=">Tambah Instrutur</a>

    </tr>

<table class="table">
	<tr>
		<td>ID Instruktur</td>
		<td>Nama</td>
		<td>Tanggal Lahir</td>
		<td>Usia</td>
		<td>Kelamin</td>
	</tr>

	<?php 
	
		while ($data = mysqli_fetch_array($query)) {
			// code...
			$id = $data["id"];
			$nama = $data["nama"];
			$tanggalLahir = $data["tanggalLahir"];
			$usia = $data["usia"];
			$kelamin = $data["kelamin"]; 
	?>
	<tr>
			<td><?php echo $id; ?></td>
			<td><?php echo $nama; ?></td>
			<td><?php echo $tanggalLahir; ?></td>
			<td><?php echo $usia; ?></td>
			<td><?php echo $kelamin; ?></td>
		</tr>
		<?php } ?>

</table>

<?php require('footer.php');