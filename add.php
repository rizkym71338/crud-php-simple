<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

	<title>Tambah Data</title>
</head>

<body>

	<div class="container mt-5 justify-content-center">
		<?php
		//including the database connection file
		include_once("config.php");

		if (isset($_POST['Submit'])) {
			$nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
			$nim = mysqli_real_escape_string($mysqli, $_POST['nim']);
			$alamat = mysqli_real_escape_string($mysqli, $_POST['alamat']);

			// checking empty fields
			if (empty($nama) || empty($nim) || empty($alamat)) {

				echo "<div class='container alert alert-danger' align='center'>";
				if (empty($nama)) {
					echo "<font>Kolom Nama Kosong.</font>";
				}

				if (empty($nim)) {
					echo "<font>Kolom Nim Kosong.</font>";
				}

				if (empty($alamat)) {
					echo "<font>Kolom Alamat Kosong.</font>";
				}
				echo "</div>";
			} else {
				// if all the fields are filled (not empty) 

				//insert data to database	
				$result = mysqli_query($mysqli, "INSERT INTO users(nama,nim,alamat) VALUES('$nama','$nim','$alamat')");

				//display success message
				echo "<div class='container alert alert-success' align='center'>";
				echo "<font>Data Berhasil Ditambah.";
				echo "</div>";
			}
		} ?>
	</div>

	<div class="container col-lg-8 mt-3">
		<a href="index.php" class="btn btn-primary">Kembali</a>
	</div>

	<div class="container mt-3 form-signin col-lg-8">
		<form action="add.php" method="post" name="form1">
			<div class="form-floating">
				<input type="text" name="nama" class="form-control" id="floatingInput" placeholder="Nama Anda">
				<label for="floatingInput">Nama Lengkap</label>
			</div><br>
			<div class="form-floating">
				<input type="text" name="nim" class="form-control" id="floatingInput" placeholder="Nim Anda">
				<label for="floatingInput">Nomor Induk Mahasiswa</label>
			</div><br>
			<div class="form-floating">
				<input type="text" name="alamat" class="form-control" id="floatingInput" placeholder="Alamat Anda">
				<label for="floatingInput">Alamat</label>
			</div><br>
			<button type="submit" name="Submit" value="Tambah Data" class="w-100 btn btn-lg btn-primary">Tambah Data</button>
		</form>
	</div>

	<!-- Optional JavaScript; choose one of the two! -->

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
</body>

</html>