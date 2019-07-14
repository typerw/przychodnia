<?php
	session_start();
    include("nagl.php");
    include("funkcjeuser.php");
	$servername = "mysql.agh.edu.pl";
	$username = "typerw";
	$password = "wiktoria";
	$database = "typerw";

	$conn = new mysqli($servername, $username, $password, $database);
	$szukany = $conn->query("SELECT `nazwa` FROM `Uzytkownicy`");
	$zamien = $conn->query("SELECT `nazwa` , `id` FROM `Uzytkownicy` WHERE `nazwa` = `id`");
	
	if(!empty($_GET['menu'])){
		$wybor = $_GET['menu'];
		//echo "Wybrano z GET<br>";
	}

	if(!isset($wybor)) $wybor = 0;
	//echo "Wybor = $wybor <br>";
	switch($wybor) {
		//case 1:
		//	Dodaj($conn, $_GET['nazwa'], $_GET['email'], $_GET['haslo'], $_GET['status']);
		//	break;
		case 2: 
			Szukaj($conn, $_GET['szukany']);
			break;
		case 1:
			Edytuj($conn, $_GET['zamien_z'], $_GET['zamien_na']);
			break;
		case 2:
			Usun($conn, $_GET['usuwany']); 
            break;
			
	}
	

	
	$conn->close();
	
?>
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Witaj!</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="dalej.php">Start<span class="sr-only">(current)</span></a>
      </li>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="uzytkownicy.php">Uzytkownicy <span class="sr-only">(current)</span></a>
      </li>
    </ul>
      </div>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="lekarze.php">Lekarze <span class="sr-only">(current)</span></a>
      </li>
    </ul>
      </div>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="leki.php">Leki <span class="sr-only">(current)</span></a>
      </li>
    </ul>
      </div>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="badania.php">Badania <span class="sr-only">(current)</span></a>
      </li>
    </ul>
      </div>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="wizyty.php">Wizyty <span class="sr-only">(current)</span></a>
      </li>
    </ul>
      </div>
</nav>

<H4><center>Baza uzytkowników</center></H4>
</form>
	<H4><center>Wybierz jedną z opcji</center></H4>
	<form action="uzytkownicy.php" method="get">
	<div class="form-group">
		<label><input type="radio" name="menu" value="2"> Wyszukaj w bazie użytkowników <label><br>
		</div>
		Wybierz imię: <select name="szukany">
		<?php 
		while($rows=$szukany->fetch_assoc())
		{
		    $dname = $rows['nazwa'];
		    echo "<option value='$dname'>$dname</option>";
		    		}
		?>
		</select>
		<div class="form-group">
		<label><input type="radio" name="menu" value="3"> Edytuj rekord <label><br>
		</div>
		Wybierz imię: <select name="zamien_z">
		<?php 
		while($rows=$zamien->fetch_assoc())
		{
		    $dname = $rows['nazwa'];
		    echo "<option value='$dname'>$dname</option>";
		    		}
		?>
		</select>
		<br>
		<div class="form-group">
		zamień na <input type="text" class="form-control" name="zamien_na" placeholder="Wpisz nową nazwe użytkownika"><br>
		</div>
		<div class="form-group">
		<label><input type="radio" name="menu" value="4"> Usuń użytkownika z bazy <label><br>
		</div>
		<div class="form-group">
		<input type="text" class="form-control" name="usuwany" placeholder="Wpisz nazwe użytkownika, którego chcesz usunąć"><br>
		</div>
		<input type="submit" class="btn btn-primary" value="Zrobione">
	</form>
<a href="dalej.php" class="btn btn-primary">Powrót</a>