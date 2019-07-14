<?php 
	session_start();
    include("nagl.php");
    include("funkcjew.php");

	$servername = "mysql.agh.edu.pl";
	$username = "typerw";
	$password = "wiktoria";
    $database = "typerw";
    
    $Uzytkownicy_IdU = ($_SESSION['login']);

	$conn = new mysqli($servername, $username, $password, $database);
	$szukajdane= $conn->query("SELECT `imie` , `nazwisko` , `NPWZ` FROM `SlowLekarz`");
	
	if(!empty($_GET['menu'])){
		$wybor = $_GET['menu'];
		
	}

	if(!isset($wybor)) $wybor = 0;
	switch($wybor) {
	    case 1:
            Dodaj($conn, $_GET['kiedy'], $_GET['diagnoza'], $Uzytkownicy_IdU, $_GET['NPWZ']);
			break;
		case 2:
			Edytuj($conn, $_GET['zamien_z'], $_GET['zamien_na']);
			break;
		case 4:
			Usun($conn, $_GET['usuwany']); 
            break;
                  
	}
   ?>
	<a href="wizyty.php" class="btn btn-primary">Powrót</a>