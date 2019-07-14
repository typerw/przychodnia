<?php
   include("nagl.php");
   include("zmienne.php");
   //$Uzytkownicy_IdU = ($_SESSION['login']);
   
	$servername = "mysql.agh.edu.pl";
	$username = "typerw";
	$password = "wiktoria";
	$database = "typerw";
	


	$conn = new mysqli($servername, $username, $password, $database);

function Dodaj($db, $kiedy, $diagnoza, $Uzytkownicy_IdU, $NPWZ){
    $sql = "INSERT INTO `typerw`.`Wizyty` (`IdW`, `kiedy`, `diagnoza`, `Uzytkownicy_IdU`, `SlowLekarz_IdSL`) VALUES (NULL, '$kiedy', '$diagnoza', (SELECT id FROM Uzytkownicy WHERE email = '$Uzytkownicy_IdU'), (SELECT IdSL FROM SlowLekarz WHERE `NPWZ` = '$NPWZ'))";
   if ($db->query($sql)=== TRUE){
    echo "dodano wizyte";
} else {
    print_r($sql);
    echo "blad";
}   
}


    function Edytuj($db, $osoba, $nowa_osoba){
      $sql = "UPDATE `Wizyty` SET `diagnoza` = REPLACE (`diagnoza`, '$osoba', '$nowa_osoba') WHERE `diagnoza` LIKE '$osoba'";
        if ($db->query($sql)=== TRUE){
            echo "Diagnoza zaktualizowana";
        }else{
            echo "błąd";
        }
    }

    function Usun($db, $osoba){
        $sql = "DELETE FROM `Wizyty` WHERE `Wizyty`.`kiedy` = '$osoba'";
        if ($db->query($sql)=== TRUE){
            echo "usunięto rekord";
        } else {
            echo "błąd";
        }
    }
    
?>
