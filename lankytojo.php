<?php
require_once("config.php");
require_once("duomenys.php");
?>
<h1 style="margin-bottom:100px;">Kliento puslapis</h1>
<?php
$prisijunges = $zmones->tikrintiKoda($pkodas);

if(!$prisijunges): ?>
<form action="" method="GET">
<p>Informacija galite matyti tik jei esate uzsiregistraves ir eileje</p>
Iveskite savo koda: <input type="text" name="pkodas"/> <button type="submit">Ivesti</button>
</form>
<?php endif; ?>

<?php if($prisijunges){
	
	$zmogus = $zmones->GautiIndex($prisijunges);
	if($zmones->Aptarnaujama() !== false) $aptarnaujamas = $zmones->GautiIndex($zmones->Aptarnaujama());
	else $aptarnaujamas = false;
	
	echo "<h1>Labas, ". $zmogus->vardas."</h1>";
	echo "<p>Esi ".$zmones->kelintasEilej($zmogus->ID)." eilej</p>";
	echo "<p>Daugmaz liko laukti ".likoRealiai($aptarnaujamas, likoLaukti($zmones->apsilankymoVidurkis(), $zmones->kelintasEilej($zmogus->ID), $zmones->Aptarnaujama()))." sek.</p>";
} ?>

<h2 style="margin-top:100px;">Navigacija</h2>
<ul>
	<li><a href="index.php">Svieslente</a></li>
	<li><a href="administravimas.php">Specialisto puslapis</a></li>
	<li><a href="ivedimas.php">Uzsiregistravimas i eile</a></li>
	<li><a href="lankytojo.php">Lankytojo puslapis</a></li>
</ul>