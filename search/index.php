<form action="" method="get">
	<input type="text" name="cari" placeholder="Masukkan NPM"><button>cari</button>
</form>
<?php
include "cari.php";
$koneksi = new KonekDatabase(); // memanggil class

$namatabel = 'mahasiswa';

// if(isset($_GET['edit'])){
// 	$npm = $_GET['edit'];
// 	$datax = $koneksi->CariData($namatabel,$npm);
// 	$koneksi->TampilData($datax);	
// }else{
	if(isset($_GET['cari'])){
		$npm = $_GET['cari'];
	}else{
		$npm = null;
	}
	


	$datax = $koneksi->CariData($namatabel, $npm);
	$koneksi->TampilData($datax);

// }
$koneksi=null; // menutup koneksi dari database
?>
				