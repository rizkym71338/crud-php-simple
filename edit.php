<?php
// including the database connection file
include_once("config.php");

if (isset($_POST['update'])) {

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);

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
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users SET nama='$nama',nim='$nim',alamat='$alamat' WHERE id=$id");

		//redirectig to the display page. In our case, it is index.php
		echo "
			<script>
			alert('Data Berhasil Diubah');
			location.replace('edit.php?id=$id');
			</script>
		";
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while ($res = mysqli_fetch_array($result)) {
	$nama = $res['nama'];
	$nim = $res['nim'];
	$alamat = $res['alamat'];
}
?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

	<title>Edit Data</title>
</head>

<body>

	<div class="container col-lg-8 mt-5">
		<a href="index.php" class="btn btn-primary">Kembali</a>
	</div>

	<div class="container mt-3 form-signin col-lg-8">
		<form action="edit.php" method="post" name="form1">
			<div class="form-floating">
				<input type="text" name="nama" class="form-control" id="floatingInput" placeholder="Nama Anda" value="<?php echo $nama; ?>">
				<label for="floatingInput">Nama Lengkap</label>
			</div><br>
			<div class="form-floating">
				<input type="text" name="nim" class="form-control" id="floatingInput" placeholder="Nim Anda" value="<?php echo $nim; ?>">
				<label for="floatingInput">Nomor Induk Mahasiswa</label>
			</div><br>
			<div class="form-floating">
				<input type="text" name="alamat" class="form-control" id="floatingInput" placeholder="Alamat Anda" value="<?php echo $alamat; ?>">
				<label for="floatingInput">Alamat</label>
			</div><br>
			<input type="hidden" name="id" value=<?php echo $id; ?>>
			<button type="submit" name="update" value="Tambah Data" class="w-100 btn btn-lg btn-primary">Ubah Data</button>
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