<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Instruktur | Baru</title>

		<link rel="stylesheet" type="text/css" href="../style/bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">
		<script type="text/javascript" src="../style/bootstrap-5.2.0-beta1-dist/js/bootstrap.bundle.min.js"></script>		
	</head>
	
	<body>
		<?php require('../data/functions.php'); 
		//cek apakah tombol submit sudah pernah di tekan atau belum
		if(isset($_POST['submit'])){
			//cek apakah data berhasil ditambahkan
			if(tambah ($_POST) > 0 ) {
				echo "
					<script>
					alert('Data berhasil ditambahkan!');
					document.location.href = 'instruktur.php';
					</script>
				";
			} else {
				//echo "Data gagal ditambahkan!";
					echo "
					<script>
					alert('Data gagal ditambahkan!');
					document.location.href = 'instruktur.php';
					</script>
				";
			}
		} ?>
		<?php include '../shared/header.php'; ?>

		<!-- Form input data Peserta -->
		<form class=".form-control" action="" method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td colspan="3"><h3>Form Input Instruktur</h3></td>
				</tr>
				<tr>
					<td>Nama Instruktur</td>
					<td> :</td>
					<td><input type="text" name="txtNamaInstruktur"></td>
				</tr>

				<tr>
					<td>Tanggal Lahir</td>
					<td> :</td>
					<td><input type="date" name="dtpTglLahir"></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td> :</td>
					<td>
						<input type="radio" name="opgKelamin" value="Pria" checked>Pria
						<input type="radio" name="opgKelamin" value="Wanita">Wanita </td>
				</tr>

				<tr>
					<td>Status Menikah</td>
					<td> :</td>
					<td><input type="checkbox" name="chkStatus" checked="true"> </td>
					<!-- <td><input type="text" name="txtStatus"></td> -->
				</tr>
				<tr>
					<td>Email</td>
					<td> :</td>
					<td><input type="text" name="txtEmail"></td>
				</tr>
				<tr>
					<td>Gambar</td>
					<td>:</td>
					<td>
					<input type="file" name="gambar" id="gambar">
					</td>
				</tr>
				
					<td colspan="3">
						<button type="submit" name="submit">Tambah Data!</button>
						
					</td>
				</tr>				
			</table>			
		</form>


		<a href="instruktur.php">Kembali ke Instruktur</a>

		<?php include '../shared/footer.php'; ?>

	</body>
</html>