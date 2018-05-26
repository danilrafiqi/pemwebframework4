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
	foreach($namadata as $datay) {
		echo $datay['npm'].'-'.$datay['nama'].'<br>';
	} 	
 }
 
}
 
?>


