<?php
require_once("config.php");
require_once("duomenys.php");

$liko = isset($_GET["liko"]) ? $_GET["liko"] : $liko = "";

if($zmones->Aptarnaujama() !== false) $aptarnaujamas = $zmones->GautiIndex($zmones->Aptarnaujama());
else $aptarnaujamas = false;

echo likoRealiai($aptarnaujamas, $liko);