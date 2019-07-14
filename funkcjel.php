<?php
   
    function Dodaj($db, $nazwa, $email, $haslo, $status){
        $sql = "INSERT INTO `SlowLekow`(`idSL`, `EAN`, `nazwa`, `substCzynna`, `Opakowanie`) VALUES (NULL, '$nazwa', '$email', '$haslo', '$status')";
        if ($db->query($sql)=== TRUE){
            echo "utworzono rekord";
        } else {
            echo "błąd";
        }
        }
    
    function Szukaj($db, $osoba){
        $sql = "SELECT * FROM `SlowLekow` WHERE `nazwa` LIKE '$osoba'";
        echo "<br>" . $sql . "<br>";
        $res = $db->query($sql);
        echo "Znaleziono " .$res->num_rows . "<br>";
        if($res->num_rows >0){
            while($row = $res->fetch_assoc()){
                echo $row["idSL"] . "|".
                    $row["EAN"] . "|" . $row["nazwa"] . "|" .
                    $row["substCzynna"] . "|" . $row["Opakowanie"]. "<br>";
            }
        }else{
            echo "Nic nie znaleziono";
        }
    }

    function Edytuj($db, $osoba, $nowa_osoba){
      $sql = "UPDATE `SlowLekow` SET `nazwa` = REPLACE(`nazwa`, '$osoba', '$nowa_osoba') WHERE `nazwa` LIKE '$osoba'";
        if ($db->query($sql)=== TRUE){
            echo "utworzono rekord";
        }else{
            echo "błąd";
        }
    }

    function Usun($db, $osoba){
        $sql = "DELETE FROM `typerw`.`SlowLekow` WHERE `SlowLekow`.`nazwa` = '$osoba'";
        if ($db->query($sql)=== TRUE){
            echo "usunięto rekord";
        } else {
            echo "błąd";
        }
    }
    
?>
