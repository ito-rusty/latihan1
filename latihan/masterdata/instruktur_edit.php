<?php 
//hubungkan dengan file function
require ('../data/functions.php'); 
//abil data di url
$id = $_GET["id"];

//query data berdasar id;
$ins = query ("SELECT * FROM instruktur WHERE id = $id")[0];



//cek apakah tombol submit sudah pernah di tekan atau belum
if(isset($_POST["submit"])){
	
	//cek apakah data berhasil di ubah
	

	if(instrukturUbah ($_POST) > 0 ) {
		
		echo "
			<script>
			alert('Data berhasil di ubah!');
			document.location.href = 'instruktur.php';
			</script>
		";
	} else {
		//echo "Data gagal di ubah!";
			echo "
			<script>
			alert('Data gagal di ubah!');
			document.location.href = 'instruktur.php';
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
	<title>ubah data instruktur</title>
</head>
<body>
	<h1>Ubah data instruktur</h1>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $ins["id"];?>">
		<input type="hidden" name="gambarLama" value="<?= $ins["gambar"];?>">
		<ul>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" required value="<?= $ins["nama"];?>">
			</li>
			<li>
				<label for="tanggalLahir">Tanggal Lahir : </label>
				<input type="date" name="tanggalLahir" id="tanggalLahir" required value="<?= $ins["tanggalLahir"];?>">
			</li>
			
			<li>
				<label for="usia">Usia : </label>
				<input type="text" name="usia" id="usia" required value="<?= $ins["usia"];?>">
			</li>
			<li>
				<label for="email">Email : </label>
				<input type="text" name="email" id="email" required value="<?= $ins["email"];?>">
			</li>
			<li>
				<label for="gambar">Gambar : </label> <br>
				<img src="img/<?= $ins['gambar']; ?>" width="40"> <br>
				<input type="file" name="gambar" id="gambar" >
			</li>
			<li>
				<button type="submit" name="submit">Ubah Data!</button>
			</li>

		</ul>
		




	</form>

</body>
</html>