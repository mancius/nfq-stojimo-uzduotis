<?php
require_once("config.php");

class zmogus {
	
	public $ID;
	public $vardas;
	public $bukle;
	
	public function Set ($ID, $vardas, $bukle) {
		$this->ID = $ID;
		$this->vardas = $vardas;
		$this->bukle = $bukle;
	}
}

class zmones {

	public $kiekis = 0;
	public $zmones = array();

	public function Prideti (zmogus $zmogus) {
		
		$this->zmones[$this->kiekis] = $zmogus;
		$this->kiekis++;
	}

	public function GautiIndex($index) {
		return $this->zmones[$index];
	}
	
	public function Aptarnaujama() {
		$grazinti = false;
		$index = 0;
		
		foreach ($this->zmones as $aptarnaujamas) {
			if($aptarnaujamas->bukle == 1) $grazinti = $index;
			$index++;
		}
		
		return $grazinti;
	}
}

function prideti($con, $vardas) {
	$con->query("INSERT INTO `eile` (vardas) VALUES ('".$vardas."')");
}
function istrinti($con, $ID) {
	$con->query("DELETE FROM `eile` WHERE ID = ".$ID." LIMIT 1");
}
function aptarnauti($con) {
	$con->query("UPDATE `eile` SET bukle = '1' ORDER BY ID ASC LIMIT 1");
}
function atnaujintiDuomenis($con){
	
	$zmones = new zmones;
	$query = $con->query("SELECT * FROM `eile` ORDER BY ID ASC");
	while($row = $query->fetch_assoc()){

		$zmogus = new zmogus;
		
		$zmogus->Set(
			$row["ID"], 
			$row["vardas"],
			$row["bukle"]
		);

		$zmones->Prideti($zmogus);
	}
	
	return $zmones;
}

$zmones = atnaujintiDuomenis($con);


