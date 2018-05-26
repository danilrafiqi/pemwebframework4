<?php
try{
	$koneksi = new PDO('mysql:host=localhost;dbname=db_akademik', 'root', '');
	$koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Berhasil koneksi ke database";
}catch(PDOException $e){
	echo $e->getMessage();
}

if(isset($koneksi)){
	$koneksi = null;
}
?>