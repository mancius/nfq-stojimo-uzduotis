<?php
require_once("config.php");
require_once("duomenys.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Eile</title>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php if(isset($_POST["vardas"])) : ?>
	<?php prideti($con, $_POST["vardas"]); ?>
	<h2>Uzsiregistravote i eile.</h2>
	<p>Pamatyti sarasa galite paspaudus <a href="index.php">cia</a></p><br/>
<?php endif; ?>

<form action="" method="POST">
Iveskite savo varda: <input type="text" name="vardas"/> <button type="submit">Ivesti</button>
</form>

<h2 style="margin-top:100px;">Navigacija</h2>
<ul>
	<li><a href="index.php">Svieslente</a></li>
	<li><a href="administravimas.php">Specialisto puslapis</a></li>
	<li><a href="ivedimas.php">Uzsiregistravimas i eile</a></li>
</ul>

</body>
</html>