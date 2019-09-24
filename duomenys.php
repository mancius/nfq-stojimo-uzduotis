<?php
require_once("config.php");

class zmogus {
	
	public $ID;
	public $vardas;
	public $bukle;
	public $priemimo_laikas;
	public $atleidimo_laikas;
	public $kodas;
	public $indexas;
	
	public function Set ($ID, $vardas, $bukle, $priemimo_laikas, $atleidimo_laikas, $kodas, $indexas) {
		$this->ID = $ID;
		$this->vardas = $vardas;
		$this->bukle = $bukle;
		$this->priemimo_laikas = $priemimo_laikas;
		$this->atleidimo_laikas = $atleidimo_laikas;
		$this->kodas = $kodas;
		$this->indexas = $indexas;
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
	
	public function eileje(){
		$grazinti = 0;
		foreach ($this->zmones as $zmogus) {
			if($zmogus->bukle == 0) $grazinti++;
		}
		
		return $grazinti;
	}
	
	public function apsilankymoVidurkis(){
		$vidurkis = 0;
		$pabaigti = 0;
		foreach ($this->zmones as $zmogus) {
			if($zmogus->bukle == 2) {
				$pabaigti++;
				$vidurkis += $zmogus->atleidimo_laikas - $zmogus->priemimo_laikas;
			}
		}
		$vidurkis /= $pabaigti;
		return round($vidurkis);
	}
	
	public function tikrintiKoda($kodas){
		$grazinti = false;
		$index = 0;
		
		foreach ($this->zmones as $zmogus){
			if($zmogus->bukle == 0 && $zmogus->kodas == $kodas) $grazinti = $index;
			$index++;
		}
		return $grazinti;
	}
	public function kelintasEilej($ID) {
		$kelintas = false;
		$index = 0;
		
		foreach ($this->zmones as $zmogus){
			if($zmogus->bukle == 0) {
				$index++;
				if($zmogus->ID == $ID) $kelintas = $index;
			}
		}
		
		return $kelintas;
	}
}

function prideti($con, $vardas, $kodas) {
	$con->query("INSERT INTO `eile` (vardas, kodas) VALUES ('".$vardas."', '".$kodas."')");
}
function atleisti($con, $ID) {
	$con->query("UPDATE `eile` SET atleidimo_laikas = ".time().", bukle = 2 WHERE ID = ".$ID." LIMIT 1");
}
function aptarnauti($con) {
	$con->query("UPDATE `eile` SET bukle = 1, priemimo_laikas = ".time()." WHERE bukle = 0 ORDER BY ID ASC LIMIT 1");
}
function generuotiKoda(){
	return rand(1000000000, 9999999999);
}
function likoLaukti($vidutinis, $kelintas, $aptarnaujamas){
	$grazinti = $vidutinis * $kelintas;
	
	if($aptarnaujamas===false) $grazinti -= $vidutinis;
	
	return $grazinti;
}
function likoRealiai($priimtas, $liko){
	if($priimtas !== false) {
		$grazinti = $priimtas->priemimo_laikas + $liko - time();
	
		if($grazinti < 0) $grazinti = 0;
	}
	else {
		$grazinti = $liko;
	}
	return $grazinti;
}
function atnaujintiDuomenis($con){
	
	$zmones = new zmones;
	$query = $con->query("SELECT * FROM `eile` ORDER BY ID ASC");
	$kiekis = 0;
	while($row = $query->fetch_assoc()){

		$zmogus = new zmogus;
		
		$zmogus->Set(
			$row["ID"], 
			$row["vardas"],
			$row["bukle"],
			$row["priemimo_laikas"],
			$row["atleidimo_laikas"],
			$row["kodas"],
			$kiekis
		);

		$zmones->Prideti($zmogus);
		
		$kiekis++;
	}
	
	return $zmones;
}

$zmones = atnaujintiDuomenis($con);


