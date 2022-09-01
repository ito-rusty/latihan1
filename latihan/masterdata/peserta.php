<?php 	
//koneksi ke database
require('../data/functions.php');
$peserta = query("SELECT * FROM peserta ORDER BY id ASC");

//tombol cari ditekan
if(isset($_POST["cari"])) {
	$peserta = cari ($_POST["keyword"]);

}

 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Master Data | Peserta</title>

		<link rel="stylesheet" type="text/css" href="../style/bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
		<script type="text/javascript" src="../style/bootstrap-5.2.0-beta1-dist/js/bootstrap.bundle.min.js"></script>		

	</head>

	<body>
		<?php include '../shared/header.php'; ?>

		<h4>Master data | Peserta</h4>
		<a href="peserta_baru.php">Buat Data Peserta Baru</a>
		
		<form action="" method="post" style="text-align: right;">
		<input type="text" name="keyword" size="40" autofocus placeholder="masukkan kata pencarian" style="text-align: center;">
		<button type="submit" name="cari">Cari</button>		
		</form><br>

		<table class="table table-striped">			
			<tr>
				<td>No Urut</td>
				<td>ID Peserta</td>
				<td>Nama Peserta</td>
				<td>Tanggal Lahir</td>
				<td>Jenis Kelamin</td>
				<td>Status</td>
				<td>Email</td>
				<td>Gambar</td>
				<td>Materi</td>
				<td>Instruktur</td>
				<td>Data Editor</td>
			</tr>
			<?php $i=1;	 ?>
			<?php foreach ($peserta as $row) : ?>

			<tr>
				<td><?php echo $i; ?></td>
				<td><?= $row["id"]; ?></td>				
				<td><?= $row["nama"]; ?></td>
				<td><?= $row["tanggalLahir"]; ?></td>
				<td><?= $row["kelamin"]; ?></td>

				<td><?php $status = (isset($_POST['chkStatus'])) ? TRUE : FALSE ; ?>
				<?php echo ($status == TRUE) ? "Menikah" : "Lajang"; ?></td>
				<!-- <td><?php
				$status = ( isset($_POST['status'])) ? "Menikah" : "Lajang";
				echo "$status"; ?></td> -->
				<td><?= $row["email"]; ?></td>
				<td><img src="../img/<?= $row["gambar"]; ?>" width="50"></td>
				<td><?= $row["materi"]; ?></td>
				<td><?= $row["instruktur"]; ?></td>
				<td>
				<a href="peserta_edit.php?id=<?= $row["id"]; ?>">ubah</a>  |
				<a href="peserta_hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin mau hapus ?');">hapus</a>
				</td>
			</tr>
			<?php $i++; ?>
			<?php endforeach; ?>

			
		</table>

		<a href="..">Kembali ke Beranda</a>

		<?php include '../shared/footer.php'; ?>
	</body>
</html>