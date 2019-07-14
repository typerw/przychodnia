<?php
   
    function Dodaj($db, $nazwa, $email, $haslo, $status, $NPWZ){
        $sql = "INSERT INTO `SlowLekarz`(`idSL`, `imie`, `nazwisko`, `tel1`, `email`, `NPWZ`) VALUES (NULL, '$nazwa', '$email', '$haslo', '$status', '$NPWZ')";
        if ($db->query($sql)=== TRUE){
            echo "utworzono rekord";
        } else {
            echo "błąd";
        }
        }
    
    function Szukaj($db, $osoba){
        $sql = "SELECT * FROM `SlowLekarz` WHERE `NPWZ` LIKE '$osoba'";
        $sql = "SELECT * FROM `SlowLekarz` WHERE `nazwisko` LIKE '$osoba'";
        echo "<br>" . $sql . "<br>";
        $res = $db->query($sql);
        echo "Znaleziono " .$res->num_rows . "<br>";
        if($res->num_rows >0){
            while($row = $res->fetch_assoc()){
                echo $row["idSL"] . "|".
                    $row["imie"] . "|" . $row["nazwisko"] . "|" .
                    $row["tel1"] . "|" . $row["email"]. 
                    $row["NPWZ"]. "<br>";
            }
        }else{
            echo "Nic nie znaleziono";
        }
    }

    function Edytuj($db, $osoba, $nowa_osoba){
      $sql = "UPDATE `SlowLekarz` SET `nazwisko` = REPLACE(`nazwisko`, '$osoba', '$nowa_osoba') WHERE `nazwisko` LIKE '$osoba'";
        if ($db->query($sql)=== TRUE){
            echo "utworzono rekord";
        }else{
            echo "błąd";
        }
    }

    function Usun($db, $osoba){
        $sql = "DELETE FROM `typerw`.`SlowLekarz` WHERE `SlowLekarz`.`NPWZ` = '$osoba'";
        $sql = "DELETE FROM `typerw`.`SlowLekarz` WHERE `SlowLekarz`.`nazwisko` = '$osoba'";
        if ($db->query($sql)=== TRUE){
            echo "usunięto rekord";
        } else {
            echo "błąd";
        }
    }
    
?>
