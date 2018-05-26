<?php
class db_connect{
	protected $dns   = "mysql:host=localhost;dbname=db_akademik";
	protected $db_user  = "root";
	protected $db_pass  = "";
	protected $konek  = "";
	public function __construct(){}
	public function getConnect(){	
		try{
			$db = new PDO($this->dns,$this->db_user,$this->db_pass);
			if($db===FALSE){
				throw new Exception("Koneksi Gagal");
			}else{
				$this->konek = $db;
			}
		}catch(Exception $e){
			echo "Error : ".$e->getMessage();
		}

		return $this->konek;
	}

	public function closeConnect(){
		$this->konek = NULL; //diskonek Koneksi
	}
}
?>