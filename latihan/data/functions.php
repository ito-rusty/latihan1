<?php 
//koneksi ke database
$conn = mysqli_connect("localhost", "root","","latihan");




function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data) {
	global $conn;
	//ambil data dari setiap form
	$nama = htmlspecialchars($data['txtNamaPeserta']);	
	$tanggalLahir = $_POST['dtpTglLahir'];
	$kelamin = ($_POST['opgKelamin'] == "Pria") ? "Pria" : "Wanita";
	$status = (isset($_POST['chkStatus'])) ? TRUE : FALSE ;
	$email = htmlspecialchars($data["txtEmail"]);
	$gambar = upload();
	if (!$gambar) {
		return false;
	};
	$materi = htmlspecialchars($data["txtMateri"]);
	//$materi = htmlspecialchars($data["cboIDMateri"]);
	$instruktur = htmlspecialchars($data['txtInstruktur']);
	


	//query insert data
	$query = "INSERT INTO peserta VALUES ('','$nama','$tanggalLahir','$kelamin', '$status','$email','$gambar', '$materi','$instruktur')";

	mysqli_query($conn, $query);

	return mysqli_affected_rows ($conn);

}

function upload() {
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	//cek apakah tidak ada gambar yg diupload

	if( $error === 4){
		echo "<script>
				alert('Pilih gambar terlebih dahulu!');
			</script>";
		return false;
	}
	// cek apkah yg diupload adalah gambar
	$ektensiGambarValid = ['jpg','jpeg','png'];
	$ektensiGambar = explode('.', $namaFile);
	$ektensiGambar = strtolower(end($ektensiGambar));
	if(!in_array($ektensiGambar,$ektensiGambarValid)) {
		echo "<script>
				alert('Yang anda upload bukan gambar!');
			</script>";
		return false;
	}
	//cek jika ukurannya terlalu besar
	if($ukuranFile > 2000000) {
		echo "<script>
				alert('Ukuran gambar terlalu besar! (maks 1MB)');
			</script>";
		return false;
	}
	//Jika sudah lolos cek , gambar siap di upload
	//generate nama gambar baru untuk mencegah jika ada nama file gambar sama bisa jadi akan mereplace gambar oarng lain sebelumnya
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ektensiGambar;


	move_uploaded_file($tmpName, '../img/' . $namaFileBaru);
	return $namaFileBaru;



}


function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM peserta WHERE id = $id" );
	return mysqli_affected_rows ($conn);
}

function instrukturHapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM instruktur WHERE id = $id" );
	return mysqli_affected_rows ($conn);
}

function ubah($data) {
	global $conn;
	//ambil data dari setiap form
	$id = $data["id"];
	$nama = htmlspecialchars($data['nama']);
	$tanggalLahir = htmlspecialchars($data['dtpTglLahir']);
	$email = htmlspecialchars($data["email"]);
	$materi = htmlspecialchars($data["materi"]);
	$instruktur = htmlspecialchars($data['instruktur']);
	$gambarLama = htmlspecialchars($data["gambarLama"]);

	//cek apakah user pilih gambar baru atau tidak --> == 4 artinya error tidak ada file gambar
	if( $_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}


	//$gambar = htmlspecialchars($data["gambar"]);

	//query insert data
	$query = "UPDATE peserta SET 
				nama = '$nama',
				tanggalLahir = '$tanggalLahir',
				email = '$email',
				materi = '$materi',
				instruktur = '$instruktur',
				gambar = '$gambar'
				WHERE id = $id
				";

	mysqli_query($conn, $query);

	return mysqli_affected_rows ($conn);
}

function instrukturUbah($data) {
	global $conn;
	//ambil data dari setiap form
	$id = $data["id"];
	$nama = htmlspecialchars($data['nama']);
	$tanggalLahir = htmlspecialchars($data['tanggalLahir']);
	$usia = htmlspecialchars($data['usia']);
	$email = htmlspecialchars($data["email"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);

	//cek apakah user pilih gambar baru atau tidak --> == 4 artinya error tidak ada file gambar
	if( $_FILES['gambar']['error'] === 4 ) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}


	//$gambar = htmlspecialchars($data["gambar"]);

	//query insert data
	$query = "UPDATE instruktur SET 
				nama = '$nama',
				tanggalLahir = '$tanggalLahir',
				usia = '$usia',
				email = '$email',			
				gambar = '$gambar'
				WHERE id = $id
				";

	mysqli_query($conn, $query);

	return mysqli_affected_rows ($conn);
}

 function cari($keyword) {
 	$query = "SELECT * FROM peserta
 				WHERE nama LIKE '%$keyword%' OR 
 					email LIKE '%$keyword%' OR
 					usia LIKE '%$keyword%' OR
 					status LIKE '%$keyword%' OR
 					
 				"; // Like untuk masukkan sebagian karakter, % di depan dan belakang keyword untuk deteksi kata 
 	return query($query);
 }

function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	//cek username sudah ada di database atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
	if (mysqli_fetch_assoc($result)) {
		// code...
		echo "<script>
				alert('Username sudah terdaftar!');
			</script>";
		return false;

	//cek konfirmasi password
	if ($password !== $password2) {
		// code...
		echo "<script>
				alert('Konfirmasi password tidak sesuai!');
			</script>";
		return false;
	}

	//enkripsi password

	$password = password_hash($password, PASSWORD_DEFAULT);

	//tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password')");
	return mysqli_affected_rows($conn);




}
}

?>