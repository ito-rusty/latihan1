<?php 
//hubungkan dengan file function
require ('../data/functions.php'); 
//abil data di url
$id = $_GET["id"];

//query data berdasar id;
$mhs = query ("SELECT * FROM peserta WHERE id = $id")[0];



//cek apakah tombol submit sudah pernah di tekan atau belum
if(isset($_POST["submit"])){
	
	//cek apakah data berhasil di ubah
	

	if(ubah ($_POST) > 0 ) {
		
		echo "
			<script>
			alert('Data berhasil di ubah!');
			document.location.href = 'peserta.php';
			</script>
		";
	} else {
		//echo "Data gagal di ubah!";
			echo "
			<script>
			alert('Data gagal di ubah!');
			document.location.href = 'peserta.php';
			</script>
		";

	}

}





 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ubah data peserta</title>
</head>
<body>
	<h1>Ubah data peserta</h1>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $mhs["id"];?>">
		<input type="hidden" name="gambarLama" value="<?= $mhs["gambar"];?>">
		<ul>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" required value="<?= $mhs["nama"];?>">
			</li>
			<li>
				<label for="dtpTglLahir">Tanggal Lahir : </label>
				<input type="date" name="dtpTglLahir" id="dtpTglLahir" required value="<?= $mhs["tanggalLahir"];?>">
			</li>
			
			<li>
				<label for="email">Email : </label>
				<input type="text" name="email" id="email" required value="<?= $mhs["email"];?>">
			</li>
			<li>
				<label for="materi">Materi : </label>
				<input type="text" name="materi" id="materi" required value="<?= $mhs["materi"];?>">
			</li>
			<li>
				<label for="instruktur">Instruktur : </label>
				<input type="text" name="instruktur" id="instruktur" required value="<?= $mhs["instruktur"];?>">
			</li>
			<li>
				<label for="gambar">Gambar : </label> <br>
				<img src="img/<?= $mhs['gambar']; ?>" width="40"> <br>
				<input type="file" name="gambar" id="gambar" >
			</li>
			<li>
				<button type="submit" name="submit">Ubah Data!</button>
			</li>

		</ul>
		




	</form>

</body>
</html>