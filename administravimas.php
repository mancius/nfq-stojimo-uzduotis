<?php
require_once("config.php");
require_once("duomenys.php");

if($action == "isvyti") {
	if($zmones->Aptarnaujama() !== false) {
		$zmogus = $zmones->GautiIndex($zmones->Aptarnaujama());
		istrinti($con, $zmogus->ID);
		$zmones = atnaujintiDuomenis($con);
		echo "<p><font color=\"green\">Isvijote lauk</font></p>";
	}
}
if($action == "aptarnauti") {
	if($zmones->Aptarnaujama() !== false) {
		echo "<p><font color=\"red\">Negalima aptarnauti kai yra aptarnaujamu zmoniu, kede viena, ant keliu juk nesedes</font></p>";
	}
	else {
		aptarnauti($con);
		$zmones = atnaujintiDuomenis($con);
		echo "<p><font color=\"green\">Aptarnaujate nauja zmogu</font></p>";
	}
}

if($zmones->kiekis > 0 && !($zmones->kiekis == 1 && $zmones->Aptarnaujama() !== false)) {
	echo "<h1>Eileje esantys zmones: <a href=\"?action=aptarnauti\">Aptarnauti</a></h1>";
	for($i = 0; $i < $zmones->kiekis; $i++) {
		
		$zmogus = $zmones->GautiIndex($i);
		
		if($zmogus->bukle == 0) {
			echo "<p>".$zmogus->vardas."</p>";
		}
	}
}
else {
	echo "<h1>Eileje zmoniu nera.</h1>";
}

if($zmones->Aptarnaujama() !== false) {
	echo "<h1>Siuo metu aptarnaujamas: <a href=\"?action=isvyti\">Isvyti</a></h1>";
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
</ul>