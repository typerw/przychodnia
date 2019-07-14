<?php
   
    function Dodaj($db, $nazwa){
        $sql = "INSERT INTO `SlowBad`(`idB`, `NazwaBadania`) VALUES (NULL, '$nazwa')";
        if ($db->query($sql)=== TRUE){
            echo "utworzono rekord";
        } else {
            echo "blad";
        }
        }
    
    function Szukaj($db, $osoba){
        $sql = "SELECT * FROM `SlowBad` WHERE `NazwaBadania` LIKE '$osoba'";
        echo "<br>" . $sql . "<br>";
        $res = $db->query($sql);
        echo "Znaleziono " .$res->num_rows . "<br>";
        if($res->num_rows >0){
            while($row = $res->fetch_assoc()){
                echo $row["idB"] . "|".
                    $row["NazwaBadania"] ."<br>";
            }
        }else{
            echo "Nic nie znaleziono";
        }
    }

    function Edytuj($db, $osoba, $nowa_osoba){
      $sql = "UPDATE `SlowBad` SET `NazwaBadania` = REPLACE(`NazwaBadania`, '$osoba', '$nowa_osoba') WHERE `NazwaBadania` LIKE '$osoba'";
        if ($db->query($sql)=== TRUE){
            echo "Zmieniono";
        }else {
            echo "b��d";
        }
    }
    function Usun($db, $osoba){
        $sql = "DELETE FROM `typerw`.`SlowBad` WHERE `SlowBad`.`NazwaBadania` = '$osoba'";
        if ($db->query($sql)=== TRUE){
            echo "usunieto rekord";
        } else {
            echo "blad";
        }
    }
    
?>
