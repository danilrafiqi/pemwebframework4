<a href="form.php">Insert</a>
<form action="" method="get">
	<input type="text" name="cari" placeholder="Masukkan NPM"><button>cari</button>
</form>


<?php
include "insert.php";
$koneksi = new KonekDatabase(); // memanggil class

$namatabel = 'mahasiswa';

	if(isset($_GET['cari'])){
		$npm = $_GET['cari'];
	}else{
		$npm = null;
	}

	$datax = $koneksi->CariData($namatabel, $npm);
	$koneksi->TampilData($datax);


	if(isset($_POST['insert'])){
		$data = array(
			'npm' => $_POST['npm'],
			'nama' => $_POST['nama'],
			'sex' => $_POST['sex'],
			'thn_masuk' => $_POST['thn_masuk'],
			'idprodi' => $_POST['idprodi'],
			'idstatusaka' => $_POST['idstatusaka'],
		);

		$koneksi->insertData($namatabel, $data);
		// header("Location : index.php");
	}

	if(isset($_POST['update'])){
		$data = array(
			'npm' => $_POST['npm'],
			'nama' => $_POST['nama'],
			'sex' => $_POST['sex'],
			'thn_masuk' => $_POST['thn_masuk'],
			'idprodi' => $_POST['idprodi'],
			'idstatusaka' => $_POST['idstatusaka'],
		);
		$npm = $_POST['npm'];
		$koneksi->updateData($namatabel, $data, $npm);
		// header("Location : index.php");
	}


	if(isset($_GET['delete'])){
		$npm = $_GET['delete'];
		$koneksi->hapusData($namatabel, $npm);
	}	


$koneksi=null; // menutup koneksi dari database
?>
				