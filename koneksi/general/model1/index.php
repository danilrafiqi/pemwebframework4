<?php
class database{
 
	var $host = "localhost";
	var $uname = "root";
	var $pass = "";
	var $db = "akademik";
 
	function __construct(){
		$koneksi = mysql_connect($this->host, $this->uname, $this->pass);
		mysql_select_db($this->db);
 
		if($koneksi){
			echo "Koneksi database mysql dan php berhasil.";
		}else{
			echo "Koneksi database mysql dan php GAGAL !";
		}
	}
} 
 
$dbk1 = new database();
 
?>