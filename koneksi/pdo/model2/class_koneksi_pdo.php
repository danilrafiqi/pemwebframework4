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
 
 function CloseLink()
 {
  $tutup = $this->ConnectMysql(null);
  echo 'Menutup Koneksi Sukses..!<br>';
  return $tutup;

 }
 
 
}
 
?>