<?php
include "class_koneksi_mysql.php";
$koneksi = new KonekDatabase(); // memanggil class
$koneksi->OpenLink(); // memanggil fungsi untuk koneksi ke database
 
//isi kode - kode ente di sini !
 
$koneksi->CloseLink(); // memanggil fungsi untuk menutup koneksi dari database
?>