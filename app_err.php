<?php
	include("nagl.php");
	echo "<H1>Błąd aplikacji</H1>";
	$a = $_GET['tx_err'];
	echo $_GET['tx_err'] . ": " . $_GET['gdzie'];
	include("stopka.php");
?>