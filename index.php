<?php
require_once("config.php");
require_once("duomenys.php");
?>
<h1 style="margin-bottom:100px;">Svieslente</h1>
<?php

if($zmones->Aptarnaujama() !== false) $aptarnaujamas = $zmones->GautiIndex($zmones->Aptarnaujama());
else $aptarnaujamas = false;

if($zmones->eileje()) {
	echo "<h1>Eileje esantys zmones:</h1>";
	for($i = 0; $i < $zmones->kiekis; $i++) {
		
		$zmogus = $zmones->GautiIndex($i);
		if($zmogus->bukle == 0) {
			$likoLaukti = likoRealiai($aptarnaujamas, likoLaukti($zmones->apsilankymoVidurkis(), $zmones->kelintasEilej($zmogus->ID), $zmones->Aptarnaujama()));
			echo "<p>".$zmogus->vardas.". Liko laukti: ".$likoLaukti."</p>";
		}
	}
}
else {
	echo "<h1>Eileje zmoniu nera.</h1>";
}


if($zmones->Aptarnaujama() !== false) {
	echo "<h1>Siuo metu aptarnaujamas:</h1>";
	$zmogus = $zmones->GautiIndex($zmones->Aptarnaujama());
	echo "<p>".$zmogus->vardas."</p>";
}
else {
	echo "<h1>Siuo metu niekas neaptarnaujamas.</h1>";
}
?>

<h2 style="margin-top:100px;">Navigacija</h2>
<ul>
	<li><a href="index.php">Svieslente</a></li>
	<li><a href="administravimas.php">Specialisto puslapis</a></li>
	<li><a href="ivedimas.php">Uzsiregistravimas i eile</a></li>
	<li><a href="lankytojo.php">Lankytojo puslapis</a></li>
</ul>