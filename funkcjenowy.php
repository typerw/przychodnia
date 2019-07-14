<?php
    session_start();
    include("nagl.php");
    include("polacz.php");
   
    $servername = "mysql.agh.edu.pl";
    $username = "typerw";
    $password = "wiktoria";
    $database = "typerw";
   
    $conn = new mysqli($servername, $username, $password, $database);
    if($conn->connect_error)
    {
        die("Brak połączenia: " . $conn->connect_error . "<br>");
    }
   
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_POST['haslo'] == $_POST['haslo_2']){

            $nazwa = $mysqli->real_eascape_string($_POST['nazwa']);
            $email = $mysqli->real_eascape_string($_POST['email']);
            $haslo = md5($_POST['haslo']);
        }
    }

    function Dodaj($db, $nazwa, $email, $haslo, $status){
        $sql = "INSERT INTO `Uzytkownicy`(`id`, `nazwa`, `email`, `haslo`, `status`) VALUES (NULL, '$nazwa', '$email', '$haslo', '1')";
        if ($db->query($sql)=== TRUE){
            echo "utworzono rekord";
        } else {
            echo "błąd";
        }
        }
       
$zmiana_hasla = "UPDATE Uzytkownicy SET haslo= MD5(nazwa)";
$result = $conn->query($zmiana_hasla);
 
      
?>
 
<?php
    include("stopka.php");
?>