<?php 
	// Informasi server
	$server = "localhost";
	$userName = "root";
	$password = "";
	$database = "latihan";

	// Koneksi ke MySQL
	$conLatihan = mysqli_connect(
		$server,
		$userName,
		$password,
		$database
	);

 ?>