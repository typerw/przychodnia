<?php
session_start();

 include("nagl.php");
 //include("funkcjenowy.php");
 include("polacz.php");
  $servername = "mysql.agh.edu.pl";
	$username = "typerw";
	$password = "wiktoria";
	$database = "typerw";

  $conn = new mysqli($servername, $username, $password, $database);
  $emailjest = $conn->query("SELECT `email` FROM `Uzytkownicy`");
  if($conn->connect_error)
    {
        die("Brak połączenia: " . $conn->connect_error . "<br>");
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if($_POST['haslo'] == $_POST['haslo_2']){
        if($_POST['email'] == $emailjest){


          $nazwa = $conn->real_escape_string($_POST['nazwa']);
          $email = $conn->real_escape_string($_POST['email']);
          $haslo = ($_POST['haslo']);
          if(isset($_POST["register_btn"])) {
            Dodaj($conn, $_POST['nazwa'], $_POST['email'], $_POST['haslo'], ['status']);	
        }
        else{
          echo "Nie mozna dodać uzytownika";
        }
      }
      else{
        echo "Podany email juz istnieje";
      }
    }
      else {
        echo "Hasła nie są takie same!";
        }     
  }
  
  

  
function Dodaj($db, $nazwa, $email, $haslo, $status){
  $sql = "INSERT INTO `Uzytkownicy`(`id`, `nazwa`, `email`, `haslo`, `status`) VALUES (NULL, '$nazwa', '$email', '$haslo', '1')";
        if ($db->query($sql)=== TRUE){
            echo "utworzono rekord";
            header("location: potwierdzenie.php");
        } else {
            echo "błąd";
        }
      }	
	$conn->close();
?>


<html>
<head>
	<title>Zarejestruj uzytkownika</title>
</head>
<body>
<div class="container" style="height: 700px">
  <div class="row">
  </div>
  <div class="col-sm">
    </div>
  <div class="col-sm">
	<h2>Rejestracja</h2>
    </div>
    <form action="rejestracja.php" method="post">
  <div class="col-sm">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Dodaj nowego uzytkownika</label>
		</div>
  <div class="row">
  </div>
  <div class="row">
  </div><div class="col-sm">
    </div>
    <div class="col-sm">
  <div class="form-group">
    <label for="formGroupExampleInput">Nazwa uzytkownika</label>
    <input type="text" class="form-control" name="nazwa" id="formGroupExampleInput" placeholder="Wpisz nazwe uzytkownika" required/>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Adres e-mail</label>
    <input type="email" class="form-control" name="email" id="formGroupExampleInput" placeholder="Wpisz adres e-mail" required/>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Hasło</label>
    <input type="password" class="form-control" name="haslo" id="formGroupExampleInput" autocomplete="new-password" placeholder="Wpisz hasło" required/>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Potwierdź hasło</label>
    <input type="password" class="form-control" name="haslo_2" id="formGroupExampleInput" autocomplete="new-password" placeholder="Powtorz hasło" required/>
  </div>	
	<div class="input-group">
		<button type="submit"  class="btn btn-primary" name="register_btn" >Zarejestruj</button>
	</div>
	<p>
    <h3><w> Jeśli masz juz konto to: </w> </h3>
        <a href="baza.php" class="btn btn-primary">Zaloguj się</a>
	</p>
</form>
</body>
</html>
<?php
include("stopka.php");
?>