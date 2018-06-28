<?php 
include "insert.php";
$koneksi = new KonekDatabase(); // memanggil class

$namatabel = 'mahasiswa';
if(isset($_GET['edit'])){
	$npm = $_GET['edit'];
	$datas = $koneksi->tampilDetail($namatabel, $npm);
}else{
	$datas = array(null);
}
foreach ($datas as $data) {
?>


<!DOCTYPE html>
<html>
<head>
	<title>Insert Data</title>
</head>
<body>
<form action="index.php" method="POST">
	<label>NPM </label><input type="text" name="npm" value="<?php echo $data['npm']; ?>"><br>
	<label>Nama </label><input type="text" name="nama" value="<?php echo $data['nama']; ?>"><br>

	<label>Sex </label>
	<select name="sex">
		<option value="L">L</option>
		<option value="P">P</option>		
	</select>
	<br>

	<label>Tahun Masuk </label><input type="text" name="thn_masuk" value="<?php echo $data['thn_masuk']; ?>"><br>

	<label>Prodi</label>
	<select name="idprodi">
		<option value="4" >Akuntansi Paja </option>
		<option value="9" >Minyak</option>
		<option value="10" >Perminyakan</option>
	</select>	
	<br>

	<select name="idstatusaka">
		<option value="1" >
		 Aktif 
		</option>
		<option value="2" >
		 Drop Out 
		</option>
		<option value="3" >
		 Alumni 
		</option>
		<option value="4" >
		 Cuti 
		</option>
		<option value="6" >
		 Mau wisuda 
		</option>
		<option value="12" >
		 Bentar Lagi Wisuda 
		</option>
	</select>
	<br>
<?php
}
$koneksi=null; // menutup koneksi dari database
?>


<?php 
	if(isset($_GET['edit'])){
?>
	<input type="submit" name="update" value="Simpan" >
<?php 
	}else{
?>
	<input type="submit" name="insert" value="Simpan" >
<?php 
	}
?>
</form>
</body>
</html>


