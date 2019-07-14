<?php 
    include("nagl.php");
    include("funkcjelekarze.php");
    
	$servername = "mysql.agh.edu.pl";
	$username = "typerw";
	$password = "wiktoria";
	$database = "typerw";

	$conn = new mysqli($servername, $username, $password, $database);
	$szukajNPWZ = $conn->query("SELECT `NPWZ` FROM `SlowLekarz`");
	$szukajdane= $conn->query("SELECT `imie` , `nazwisko` FROM `SlowLekarz`");
	$szukajnazwisko= $conn->query("SELECT `nazwisko` FROM `SlowLekarz`");
	$usunNPWZ = $conn->query("SELECT `NPWZ` FROM `SlowLekarz`");
	
	if(!empty($_GET['menu'])){
		$wybor = $_GET['menu'];
		//echo "Wybrano z GET<br>";
	}

	if(!isset($wybor)) $wybor = 0;
	switch($wybor) {
	    case 1:
			Dodaj($conn, $_GET['imie'], $_GET['nazwisko'], $_GET['tel1'], $_GET['email'], $_GET['NPWZ']);
			break;
		case 2: 
			Szukaj($conn, $_GET['szukany']);
		case 3:
			Edytuj($conn, $_GET['zamien_z'], $_GET['zamien_na']);
			break;
		case 4:
			Usun($conn, $_GET['usuwany']); 
            break;
	}
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

   	<H4><center>Baza lekarzy</center></H4>
	<H4><center>Wybierz jedną z opcji</center></H4>
	<center><a href="http://www.oil.org.pl/xml/oil/oil68/rejlek/hurtd" class="btn btn-primary">Wyszukaj lekarza w bazie</a></center>
	<form action="lekarze.php" method="get">
		<div class="form-group">
		<label><input type="radio" name="menu" value="1" checked> Dodaj nowego lekarza do bazy <label><br>
		</div>
		<div class="form-group">
		Imie: <input type="text" class="form-control" name="imie" placeholder="Wpisz imie"><br>
		Nazwisko:<input type="text" class="form-control" name="nazwisko" placeholder="Wpisz nazwisko"><br>
		Telefon:<input type="text" class="form-control" name="tel1" placeholder="Wpisz numer telefonu "><br>
		Email:<input type="text" class="form-control" name="email" placeholder="Wpisz adres email"><br>
        NPWZ:<input type="text" class="form-control" name="NPWZ" placeholder="Wpisz NPWZ"><br>
		</div>
		</div>
		<div class="form-group">
		<label><input type="radio" name="menu" value="2"> Wyszukaj lekarza w bazie <label><br>
		</div>
		Szukaj po NPWZ lekarza: <select name="szukany">
		<?php 
		while($rows=$szukajNPWZ->fetch_assoc())
		{
		    $dname = $rows['NPWZ'];
		    echo "<option value='$dname'>$dname</option>";
		    		}
		?>
		</select>
		<div class="form-group">
		<label><input type="radio" name="menu" value="3"> Edytuj nazwisko lekarza <label><br>
		</div>
		Wybierz dane lekarza: <select name="zamien_z">
		<?php 
		while($rows=$szukajdane->fetch_assoc())
		{
			$dname = $rows['imie'] . " " . $rows['nazwisko'];
			//$ddname = $rows['nazwisko'];
		    echo "<option value='$dname'>$dname</option>";
		    		}
		?>
		</select>
		<br>
		<div class="form-group">
		Zamień na <input type="text" class="form-control" name="zamien_na" placeholder="Wpisz nowe nazwisko"><br>
		</div>
		<div class="form-group">
		<label><input type="radio"  name="usuwany" value="4"> Usuń lekarza z bazy <label><br>
		</div>
		Znajdź NPWZ: <select name="usuwany">
		<?php 
		while($rows=$usunNPWZ->fetch_assoc())
		{
		    $dname = $rows['NPWZ'];
		    echo "<option value='$dname'>$dname</option>";
		    		}
		?>
		</select>
		<br>
		<input type="submit"  class="btn btn-primary" value="Zrobione">
	</form>
	<a href="dalej.php" class="btn btn-primary">Powrót</a>