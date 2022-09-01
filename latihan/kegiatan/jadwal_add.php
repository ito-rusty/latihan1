<?php

error_reporting(E_ALL);

//include_once 'koneksi.php';
$conn = mysqli_connect("localhost", "root","","latihan");
if (isset($_POST['submit']))

{

    $materi = $_POST['materi'];

    $instruktur = $_POST['instruktur'];

    $tanggal = $_POST['tanggal'];

    $lokasi = $_POST['lokasi'];

    $waktu = $_POST['waktu'];

            $strQuery = " 

            INSERT INTO jadwal(
                    materi,
                    instruktur,                    
                    tanggal,
                    lokasi,
                    waktu
                  
                ) VALUES(
                    '$materi',
                    '$instruktur',                    
                    '$tanggal',
                    '$lokasi',
                    '$waktu'                    
                );
            ";

        // Proses Query
        $query = mysqli_query($conn, $strQuery) or die(mysqli_error($conn));
        if ($query) {
            // Berhasil...
            echo "Berhasil Tersimpan <meta http-equiv='refresh' content='1, url=jadwal.php'>";
        }else{
            // Gagal...
            echo "Gagal menyimpan <meta http-equiv='refresh' content='1, url=jadwal.php'>";
        }}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../style/main.css">
	<style type="text/css">
			form input[type="submit"] {
			border: 1px solid #197a43;
			background-color: #197a43;
			color: #ffffff;
			font-weight: bold;
			padding: 5px 15px;
		}
	</style>
	<title>Tambah Jadwal</title>
</head>
<body>

	<h1>Tambah Jadwal </h1>
	<a href="jadwal.php" style="color: blue; font-size: 30px;" >Kembali ke Jadwal</a>

	<form name="frmJadwal" action="jadwal_add.php" method="post">
		<table>
			<tr>
				<td><label>Materi</label></td>
				<td><input type="text" name="materi"></td>
			</tr>
			<tr>
				<td><label>Instruktur</label></td>
				<td><input type="text" name="instruktur"></td>
			</tr>
			<tr>
				<td><label>Tanggal</label></td>
				<td><input type="date" name="tanggal"></td>
			</tr>
			<tr>
				<td><label>Lokasi</label></td>
				<td><input type="text" name="lokasi"></td>
			</tr>
			<tr>
				<td><label>Waktu</label></td>
				<td><input type="time" name="waktu"></td>
			</tr>
			<
		</table>

		<input type="submit" name="submit" value="Submit">
	</form>

</body>
</html>

<?php include '../shared/footer.php'; ?>
