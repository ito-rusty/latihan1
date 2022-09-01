<?php 	
//require 'functions.php';
require ('../data/functions.php'); 

$id = $_GET['id'];


if(instrukturHapus($id) > 0 ) {
	echo "
			<script>
			alert('Data berhasil dihapus!');
			document.location.href = 'instruktur.php';
			</script>
		";
	} else {
		//echo "Data gagal dihapus!";
			echo "
			<script>
			alert('Data gagal dihapus!');
			document.location.href = 'instruktur.php';
			</script>
		";

}




 ?>