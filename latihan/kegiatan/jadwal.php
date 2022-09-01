<?php 	
//koneksi ke database
require('../data/functions.php');
$jadwal = query("SELECT * FROM jadwal ORDER BY id ASC");

//tombol cari ditekan
if(isset($_POST["cari"])) {
	$jadwal = cari ($_POST["keyword"]);

}

 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Master Data | Jadwal Pelatihan</title>

		<link rel="stylesheet" type="text/css" href="../style/bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
		<script type="text/javascript" src="../style/bootstrap-5.2.0-beta1-dist/js/bootstrap.bundle.min.js"></script>		

	</head>

	<body>
		<?php include '../shared/header.php'; ?>

		<h4>Kegiatan | Jadwal</h4>
		<a href="jadwal_add.php">Buat Jadwal Baru</a>
		<!-- <form action="" method="post">
		<input type="text" name="keyword" size="40" autofocus placeholder="masukkan kata pencarian">
		<button type="submit" name="cari">Cari</button>		
		</form> -->

		<table class="table table-striped">			
			<tr>
				<td>No Urut</td>
				<td>Materi</td>
				<td>Instruktur</td>
				<td>Tanggal Pelatihan</td>
				<td>Lokasi Pelatihan</td>
				<td>Waktu Pelatihan</td>
				
			</tr>
			<?php $i=1;	 ?>
			<?php foreach ($jadwal as $row) : ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?= $row["materi"]; ?></td>
				<td><?= $row["instruktur"]; ?></td>
				<td><?= $row["tanggal"]; ?></td>
				<td><?= $row["lokasi"]; ?></td>
				<td><?= $row["waktu"]; ?></td>
				
			</tr>
			<?php $i++; ?>
			<?php endforeach; ?>

			
		</table>

		<a href="..">Kembali ke Beranda</a>

		<?php include '../shared/footer.php'; ?>
	</body>
</html>