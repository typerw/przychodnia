<?php
   
    
    function Szukaj($db, $osoba){
        $sql = "SELECT * FROM `Uzytkownicy` WHERE `nazwa` LIKE '$osoba'";
        echo "<br>" . $sql . "<br>";
        $res = $db->query($sql);
        echo "Znaleziono " .$res->num_rows . "<br>";
        if($res->num_rows >0){
            while($row = $res->fetch_assoc()){
                echo $row["id"] . "|".
                    $row["nazwa"] . "|" . $row["email"] . "|" .
                    $row["haslo"] . "|" . $row["status"]. "<br>";
            }
        }else{
            echo "Nic nie znaleziono";
        }
    }

    function Edytuj($db, $osoba, $nowa_osoba){
        $sql = "UPDATE `Uzytkownicy` SET `nazwa` = REPLACE(`nazwa`, '$osoba', '$nowa_osoba') WHERE `nazwa` LIKE '$osoba'";
        if ($db->query($sql)=== TRUE){
            echo "utworzono rekord";
        } else {
            echo "błąd";
        }
    }

    function Usun($db, $osoba){
        $sql = "DELETE FROM `Uzytkownicy` WHERE `nazwa` LIKE '$osoba'";
        if ($db->query($sql)=== TRUE){
            echo "usunięto rekord";
        } else {
            echo "błąd";
        }
    }
    
?>
