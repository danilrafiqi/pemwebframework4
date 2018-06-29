<?php
// Class Untuk Membuka Koneksi & Memilih Database Di MySQL 
class KonekDatabase
{
 // Fungsi Untuk Membuka Koneksi Ke Database
 protected function ConnectMysql()
 {

  $host = "localhost";
  $username = "root";
  $passwd = "";  
  
	try{
	$conn = new PDO("mysql:host=$host;dbname=db_akademik", $username, $passwd);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
	echo "Gagal: " . $e->getMessage();
	}  
   return $conn;  
 }

 
 // Fungsi Membuka Koneksi Dan Memilih Database
 function OpenLink()
 {
  $this->ConnectMysql();
  echo ' Membuka Koneksi, <br>';
 }

 function ReadData($namatabel)
 {
    $conn = $this->ConnectMysql();
	$sql = "SELECT * FROM $namatabel";
	$q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);	
	while($row = $q->fetch()): 
	   $data[] = $row;
	endwhile;
    return $data;
 }

 function CariData($namatabel, $npm='')
 {
    $conn = $this->ConnectMysql();
	$sql = "SELECT * FROM $namatabel";
	if(!empty($npm)){
		$sql .= " WHERE npm like '$npm%'";
	}

	$q = $conn->query($sql);
	if($q->rowCount($q)>=1){		
	    $q->setFetchMode(PDO::FETCH_ASSOC);	
		while($row = $q->fetch()): 
		   $data[] = $row;
		endwhile;
	    return $data;
	}else{
		die('NPM : '.$npm.' tidak ditemukan');
	}
 }
 
 function TampilData($namadata){
	echo "<table border='1'>";
	echo "<tr><td>NPM</td><td>Nama</td><td colspan='2'>Action</td></tr>";
	foreach($namadata as $datay) {
		echo "<tr>";
		echo "<td>".$datay['npm'].'</td><td>'.$datay['nama'].'</td>';
		echo "<td><a href='form.php?edit=".$datay['npm']."'>Edit</a></td>";
		echo "<td><a href='?delete=".$datay['npm']."'>Delete</a></td>";
		echo "</tr>";
	}
	echo "</table>"; 	
 }
 
 function insertData($namatabel, $datas)
 {
 	$kunci = implode(", ",array_keys($datas));

 	$i = 0;
 	foreach ($datas as $key => $value) {
 		$nilaiArray[$i] = "'".$value."'";
 		$i++;
 	}

 	$nilai = implode(", ", $nilaiArray);

    $conn = $this->ConnectMysql();
    $sql = "INSERT INTO $namatabel ($kunci) VALUES ($nilai);";
	$q = $conn->query($sql);
	if($q){
		header("Refresh:0");
	}
 }

 function hapusData($namatabel, $npm)
 {
    $conn = $this->ConnectMysql();
    $sql = "DELETE FROM $namatabel WHERE `mahasiswa`.`npm` = $npm";
	$q = $conn->query($sql);
	if($q){
		header("Location:index.php");
	}
 }

 function tampilDetail($namatabel, $npm)
 {
    $conn = $this->ConnectMysql();
	$sql = "SELECT * FROM $namatabel WHERE npm = $npm";
	$q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);	
	while($row = $q->fetch()): 
	   $data[] = $row;
	endwhile;
    return $data;
 }



 function updateData($namatabel, $datas, $npm)
 {
 	
 	$i = 0;
 	foreach ($datas as $key => $value) {
 		$nilaiArray[$i] = "'".$value."'";
 		$i++;
 	}

 	// $nilai = $nilaiArray;
 	// $kunci = array_keys($datas);
 	// $finalValue = array(
 	// 	$kunci => $nilai, 
 	// );
 	$nama = $datas['nama'];
 	$sex = $datas['sex'];
 	$thn_masuk = $datas['thn_masuk'];
 	$idprodi = $datas['idprodi'];
 	$idstatusaka = $datas['idstatusaka'];

    $conn = $this->ConnectMysql();
    $sql = "UPDATE $namatabel SET nama = '$nama', sex = '$sex', thn_masuk = $thn_masuk, idprodi = $idprodi, idstatusaka = $idstatusaka WHERE npm = $npm";
	$q = $conn->query($sql);
	if($q){
		header("Refresh:0");
	}
 }

 function tampil($namatabel){
    $conn = $this->ConnectMysql();
	$sql = "SELECT * FROM $namatabel";
	$q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);	
	while($row = $q->fetch()): 
	   $data[] = $row;
	endwhile;
    return $data; 	
 }


}



 
?>


