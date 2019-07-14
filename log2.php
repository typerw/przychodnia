<?php
session_start();
include("nagl.php");
include("polacz.php");

$servername = "mysql.agh.edu.pl";
$username = "typerw";
$password = "wiktoria";
$database = "typerw";

$conn = new mysqli($servername, $username, $password, $database);
// $status = $conn->query("SELECT `status` FROM `Uzytkownicy`");

$email = $_POST['email'];
$haslo = $_POST['haslo'];

$email = $conn->real_escape_string($email);
$haslo = $conn->real_escape_string($haslo);


$wynik = $conn->query("SELECT `email`, `haslo`, `status` FROM `Uzytkownicy` WHERE `email` = '$email'")
	or die("Nie mogę połączyć się z bazą");

	
if($wynik){

	$wiersz = $wynik->fetch_assoc();
	$has = ($wiersz['haslo']);
	$status = ($wiersz['status']);
	$_SESSION['login'] = $_POST['email'];
	print_r($_SESSION);

	if ($status == 10){
		echo "Zostałeś zalogowany jako admin";
		$forma = "<form action = \"dalejadmin.php\" method=\"POST\">";
		$forma.= "<center><input type=\"submit\" value=\"Kontynuacja sesji\" /></center>";
		$forma.= "</form>";	
		echo $forma;

	}else{
		echo "Zostałeś zalogowany" ;
		$forma = "<form action = \"dalej.php\" method=\"POST\">";
		$forma.= "<center><input type=\"submit\" value=\"Kontynuacja sesji\" /></center>";
		$forma.= "</form>";
		echo $forma;
	}
}
else{
	echo "Nie udało się zalogować, sprawdź poprawność danych!";
	}

$zmiana_hasla = "UPDATE Uzytkownicy SET haslo= MD5(nazwa)";
$result = $conn->query($zmiana_hasla);
?>

<div class="container" style="height: 700px">
</div>

<?php
include("stopka.php");
?>