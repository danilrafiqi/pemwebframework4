<?php
$host = "localhost";
$username = "root";
$passwd = "";
 
try{
$conn = new PDO("mysql:host=$host;dbname=akademik", $username, $passwd);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Koneksi Sukses";
}
catch(PDOException $e){
echo "Connection failed: " . $e->getMessage();
}
?>