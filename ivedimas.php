<?php
require_once("config.php");
require_once("duomenys.php");
?>
<h1 style="margin-bottom:100px;">Uzsiregistravimas</h1>
<?php
if(isset($_POST["vardas"])) : ?>
<?php
	$kodas = generuotiKoda();
	prideti($con, $_POST["vardas"], $kodas);
?>
<h2>Uzsiregistravote i eile.</h2>
<p>Pamatyti sarasa galite paspaudus <a href="index.php">cia</a></p>
<p>Ieiti i savo meniu galite paspaudus <a href="lankytojo.php">cia</a> ir suvedus koda <?php echo $kodas; ?></p><br/>
<?php endif; ?>

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