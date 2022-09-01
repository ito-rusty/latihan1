<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./style/main.css">
	<title>Kontak</title>
</head>
<body>
	<h1 style="background-color: bisque;">Kontak Page</h1>
	<a href="index.php" style="color: blue; font-size: 30px">Home</a>
	
	<p>Kontak Kami untuk info lebih lanjut</p>
	<form>
		<div class="container">
		<label for="nama">Masukkan Nama Anda</label>
		<input
			type="text"
			name="nama"
			id="nama"
			value=""			>
		<label for="email">Masukkan Email Anda</label>
		<input
			type="text"
			name="email"
			id="email"
			value="">
		</div>
		<button onclick="funcKlik()">Submit</button>
	</form>
	<p id="konfirmasi" style="color:green;"></p>

	<script type="text/javascript">
		
		function funcKlik() {
			let nama = document.getElementById("nama").value;
			let email = document.getElementById("email").value;
			return document.getElementById("konfirmasi").innerHTML = "Terima kasih" + " " + nama + ", " + "info akan kami kirimkan ke" + " " + email;
		}
	</script>

	<p>Untuk Korespondensi</p>
	<ul>
		<li>
			&#127968;
			<a href="https://goo.gl/maps/wxfz9ViK5eWrrioh6" target="_blank">
			Jl. Griya Bekasi Permai</a></li>
		<li>
			&#9743;
			<a href="tel://+628128762483">
			Telp.08128762483</a></li>
		<li>
			&#128231;
			<a href="mailto:itosan82@gmail.com">
			itosan82@gmail.com</a></li>
		<li>
			&#127758;
			<a href="https://google.com" target="_blank">
			alamat website</a></li>			
		</li>

		
	</ul>

		<li>Maps</li>
		<div class="container">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.6259271495896!2d107.09447665086188!3d-6.31277306351293!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6990748b2d21c5%3A0xb0b46656dbf0322!2sYamaha%20Motor%20Electronics%20Indonesia%20Pt.%2C%20Jatiwangi%2C%20Kec.%20Cikarang%20Bar.%2C%20Kabupaten%20Bekasi%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1660027602420!5m2!1sid!2sid" width="70%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>





	
	

</body>
</html>