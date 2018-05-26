<?php
include "class_koneksi_pdo.php";
$koneksi = new KonekDatabase(); // memanggil class

$namatabel = 'mahasiswa';

if(isset($_GET['edit'])){
	$npm = $_GET['edit'];
	$datax = $koneksi->CariData($namatabel,$npm);
	$koneksi->TampilData($datax);	
}else{
	$npm = 12132;
	$datax = $koneksi->CariData($namatabel);
	$koneksi->TampilData($datax);

}

 
$koneksi=null; // menutup koneksi dari database
?>