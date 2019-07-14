<?php
	session_start();
  include("nagl.php");
  include("polacz.php");
	$servername = "mysql.agh.edu.pl";
	$username = "typerw";
	$password = "wiktoria";
	$database = "typerw";

	$conn = new mysqli($servername, $username, $password, $database);

	if(isset($_SESSION['login'])){
		session_destroy();
		$_SESSION = array();
		/*echo "Usunięcie pozostałości po poprzednim logowaniu <br /><br />"*/;
	}
	
?>
	<div class="container" style="height: 700px">
  <div class="row">
  </div>
  <div class="col-sm">
    </div>
  <div class="col-sm">
  <h1>Ekran logowania<span class="badge badge-secondary">BETA</span></h1>
  </div>
  <div class="col-sm">
  </div>
  <div class="row">
  </div>
  <div class="row">
  </div>
    <div class="col-sm">
    </div>
    <div class="col-sm">
	  <form action="log2.php" method="POST">
    <div class="form-group">
    <label for="exampleInputEmail1">Adres email</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Wpisz email" required/>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Haslo</label>
    <input type="password" name="haslo" class="form-control" id="haslo" placeholder="Podaj haslo" required/>
  </div>
  <div class="input-group">
    <button type="submit" value="zaloguj" class="btn btn-primary">Zaloguj</button> 
	</div>
  <div class="form-group">
  <h3><w> Jezeli nie posiadasz konta to:</w> </h3>
  <a href="rejestracja.php" class="btn btn-primary">Zarejestruj się</a>
    </div>
    <div class="col-sm">
    </div>
  </div>
</div>
<?php
	include("stopka.php");
?>

