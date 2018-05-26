<!DOCTYPE html>
<html>
<head>
	<title>Insert Data</title>
</head>
<body>
<form action="index.php" method="POST">
	<label>NPM </label><input type="text" name="npm"><br>
	<label>Nama </label><input type="text" name="nama"><br>

	<label>Sex </label>
	<select name="sex">
		<option value="L">L</option>
		<option value="P">P</option>		
	</select>
	<br>

	<label>Tahun Masuk </label><input type="text" name="thn_masuk"><br>

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

	<input type="submit" name="insert" value="Simpan" >
</form>
</body>
</html>


