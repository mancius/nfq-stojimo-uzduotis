<?php
require_once("config.php");
require_once("duomenys.php");

$prisijunges = $zmones->tikrintiKoda($pkodas);

if(!$prisijunges): ?>
<form action="" method="GET">
Iveskite savo koda: <input type="text" name="pkodas"/> <button type="submit">Ivesti</button>
</form>
<?php endif; ?>
<?php if($prisijunges){
	$zmogus = $zmones->GautiIndex($prisijunges);
	echo "<h1>Labas, ". $zmogus->vardas."</h1>
	Esi ".$zmones->kelintasEilej($zmogus->ID)." eilėj
	";
} ?>

<h2 style="margin-top:100px;">Navigacija</h2>
<ul>
	<li><a href="index.php">Svieslente</a></li>
	<li><a href="administravimas.php">Specialisto puslapis</a></li>
	<li><a href="ivedimas.php">Uzsiregistravimas i eile</a></li>
	<li><a href="lankytojo.php">Lankytojo puslapis</a></li>
</ul>