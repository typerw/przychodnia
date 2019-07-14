<?php
session_start();
include("nagl.php");
    
$servername = "mysql.agh.edu.pl";
$username = "typerw";
$password = "wiktoria";
$database = "typerw";

$connection = mysql_connect("$servername", "$username", "$password", "$database")or die("Nie mogę sie połączyć z serwerem");
mysql_select_db("$database")or die("Nie mogę wybrać bazy");

$email_to=$_POST['email'];
 
$query=("SELECT `nazwa` FROM Uzytkownicy WHERE email ='$email_to'");
$result=mysql_query($query);
 
$count=mysql_num_rows($result);
 
if($count==1){
 
$rows=mysql_fetch_array($result);
$your_password=$rows['nazwa'];
 
$to=$email_to;

$subject="Przypomnienie hasła";
 
$header="Przypomnienie hasła z Przychodni XYZ";
 
$messages.= "Twoje hasło to:  $your_password \r\n";
 
$sentmail = mail($to,$subject,$messages,$header);
}else{
echo "Nie znaleziono takiego adresu e-mail w naszej bazie";
}
 
if($sentmail){
echo "Twoje hasło zostało wysłane na twój adres e-mail.";
}else{
echo "Nie mogliśmy wysłać hasła na Twój adres. Spróbuj jeszcze raz";
}
 
?>
