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
foreach ($datas as $data):
?>


<!DOCTYPE html>
<html>
<head>
	<title>Insert Data</title>
</head>
<body>
<form action="index.php" method="POST">
	<table width="100%">
		<tr>
			<td>				
				<label>NPM </label>
			</td>
			<td>
				<input type="text" name="npm" value="<?php echo $data['npm']; ?>" <?php if(isset($_GET['edit'])){ echo "readonly";} ?> >
			</td>
		</tr>
		
		<tr>
			<td>
				<label>Nama </label>
			</td>
			<td>				
				<input type="text" name="nama" value="<?php echo $data['nama']; ?>">
			</td>
		</tr>

		<tr>
			<td>
				<label>Tahun Masuk </label>
			</td>
			<td>
				<input type="text" name="thn_masuk" value="<?php echo $data['thn_masuk']; ?>">
			</td>
		</tr>

		<tr>
			<td>
				<label>Sex </label>		
			</td>
			<td>
				<select name="sex">
					<option value="L">L</option>
					<option value="P">P</option>		
				</select>				
			</td>
		</tr>
		
		<tr>
			<td>
				<label>Prodi</label>		
			</td>
			<td>
				<select name="idprodi">
					<?php
						$datax = $koneksi->tampil('prodi');						
						foreach ($datax as $datay):
							if($data['idprodi'] == $datay['idprodi']){
								$pilih = 'selected';
							}else{
								$pilih = '';
							}
					?>

					<option value="<?php echo $datay['idprodi']; ?>" <?php echo $pilih; ?> >
					 <?php echo $datay['nmprodi']; ?> 
					</option>
					<?php 
						endforeach
					?>
				</select>				
			</td>
		</tr>
		
		<tr>
			<td>
				<label>Status Akademik</label>				
			</td>
			<td>
				<select name="idstatusaka">
					<?php
						$datax = $koneksi->tampil('status_akademik');						
						foreach ($datax as $datay):
							if($data['idstatusaka'] == $datay['idstatusaka']){
								$pilih = 'selected';
							}else{
								$pilih = '';
							}
					?>

					<option value="<?php echo $datay['idstatusaka']; ?>" <?php echo $pilih; ?> >
					 <?php echo $datay['nmstatusaka']; ?> 
					</option>
					<?php 
						endforeach
					?>
				</select>				
			</td>
		</tr>

		<tr>
			<td>
				<?php
				endforeach;
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
			</td>
		</tr>	
	</table>
</form>
</body>
</html>


