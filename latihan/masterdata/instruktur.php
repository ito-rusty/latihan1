<?php 	
//koneksi ke database
require('../data/functions.php');
$instruktur = query("SELECT * FROM instruktur ORDER BY id ASC");

//tombol cari ditekan
if(isset($_POST["cari"])) {
	$instruktur = cari ($_POST["keyword"]);

}

 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Master Data | Instruktur</title>

		<link rel="stylesheet" type="text/css" href="../style/bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
		<script type="text/javascript" src="../style/bootstrap-5.2.0-beta1-dist/js/bootstrap.bundle.min.js"></script>		

	</head>

	<body>
		<?php include '../shared/header.php'; ?>

		<h4>Master data | Instruktur</h4>
		<a href="instruktur_add.php">Buat Data Instruktur Baru</a>
		<!-- <form action="" method="post">
		<input type="text" name="keyword" size="40" autofocus placeholder="masukkan kata pencarian">
		<button type="submit" name="cari">Cari</button>		
		</form> -->

		<table class="table table-striped">			
			<tr>
				<td>No Urut</td>
				<td>Nama Instruktur</td>
				<td>Tanggal Lahir</td>
				<!-- <td>Jenis Kelamin</td> -->
				<td>Usia</td>
				<td>Email</td>
				<td>Gambar</td>
				<td>Data Editor</td>
			</tr>
			<?php $i=1;	 ?>
			<?php foreach ($instruktur as $row) : ?>
			<tr>
				<td><?php echo $i; ?></td>
				<!-- <td><?= $row["id"]; ?></td>				 -->
				<td><?= $row["nama"]; ?></td>
				<td><?= $row["tanggalLahir"]; ?></td>
				<!-- <td><?= $row["kelamin"]; ?></td> -->
				<!-- <td><?php echo ($kelamin == 1) ? "Pria" : "Wanita"; ?> </td> -->
				<!-- <td><?php echo $kelamin; ?></td> -->
				<td><?= $row["usia"]; ?></td>
				
				<!-- <td><?php 
				$status = ( isset($_POST['status'])) ? "Menikah" : "Lajang";
				echo "$status"; ?></td> -->
				<td><?= $row["email"]; ?></td>
				<td><img src="../img/<?= $row["gambar"]; ?>" width="50"></td>
				<td>
				<a href="instruktur_edit.php?id=<?= $row["id"]; ?>">ubah</a>  |
				<a href="instruktur_hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin mau hapus ?');">hapus</a>
				</td>
			</tr>
			<?php $i++; ?>
			<?php endforeach; ?>

			
		</table>

		<a href="..">Kembali ke Beranda</a>

		<?php include '../shared/footer.php'; ?>
	</body>
</html>