<?php
require_once("config.php");
require_once("duomenys.php");
?>
<head>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
</head>
<h1 style="margin-bottom:100px;">Svieslente</h1>
<?php

if($zmones->eileje()) {
	echo "<h1>Eileje esantys zmones:</h1>";
	for($i = 0; $i < $zmones->kiekis; $i++) {
		
		$zmogus = $zmones->GautiIndex($i);
		if($zmogus->bukle == 0) {
			
			$laikas = likoLaukti($zmones->apsilankymoVidurkis(), $zmones->kelintasEilej($zmogus->ID), $zmones->Aptarnaujama());
			
			echo "<p>".$zmogus->vardas.". Liko laukti <span id=\"likolaukti".$zmogus->ID."\"></span> sek</p>";
			
			echo "
				<script language=\"javascript\" type=\"text/javascript\">

				var timeout = setInterval(reloadChat, 1000);    
				function reloadChat () {

					$('#likolaukti".$zmogus->ID."').load('laikas.php?liko=".$laikas."');
				}
				</script>
			";
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