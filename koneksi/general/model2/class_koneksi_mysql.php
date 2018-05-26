<?php
// Class Untuk Membuka Koneksi & Memilih Database Di MySQL 
class KonekDatabase
{
 // Fungsi Untuk Membuka Koneksi Ke Database
 protected function ConnectMysql()
 {
  $server = "localhost"; //server database mysql
  $username = "root"; // username mysql
  $password = ""; // password mysql
  $connection = mysql_connect($server,$username,$password) or die ("Warning, Lost Connection !");
  return $connection;
 }
 // Fungsi Untuk Memilih Database Yang Akan Di gunakan
 private function DataBase()
 {
  $db = "akademik"; // nama database mysql
  $connectdb = mysql_select_db($db) or die (" Database tidak ditemukan! ");
  return $connectdb;
 }
 // Fungsi Untuk Menutup Koneksi Dari Database
 function CloseLink()
 {
  $tutup = mysql_close($this->ConnectMysql()) or die (" gagal menutup koneksi ");
  echo 'Menutup Koneksi Sukses..!<br>';
  return $tutup;
 }
 // Fungsi Membuka Koneksi Dan Memilih Database
 function OpenLink()
 {
  $this->ConnectMysql();
  $this->DataBase();
  echo 'Membuka Koneksi Sukses..!<br>';
 }
}
 
?>