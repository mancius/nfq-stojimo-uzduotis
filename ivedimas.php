<?php
require_once("config.php");
require_once("duomenys.php");
?>
<h1 style="margin-bottom:100px;">Uzsiregistravimas</h1>

<?php

if(isset($_POST["vardas"])) {

	if(strlen($_POST["vardas"]) < 2) {
		echo "<p>Įvyko klaida, kreipkitės telefonu</p>";
	}
	else {
		$kodas = generuotiKoda();
		prideti($con, $_POST["vardas"], $kodas);
		echo "<h2>Užregistruota sėkmingai</h2>";
		echo "<p>Pamatyti sarasa galite paspaudus <a href=\"index.php\">cia</a></p>";
		echo "<p>Ieiti i savo meniu galite paspaudus <a href=\"lankytojo.php\">cia</a> ir suvedus koda ".$kodas."</p><br/>";
	}
}

?>

<form action="" method="POST">
Iveskite savo varda: <input type="text" name="vardas"/> <button type="submit">Ivesti</button>
</form>

<h2 style="margin-top:100px;">Navigacija</h2>
<ul>
	<li><a href="index.php">Svieslente</a></li>
	<li><a href="administravimas.php">Specialisto puslapis</a></li>
	<li><a href="ivedimas.php">Uzsiregistravimas i eile</a></li>
	<li><a href="lankytojo.php">Lankytojo puslapis</a></li>
</ul>