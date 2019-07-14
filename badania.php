<?php 
    include("nagl.php");
    include("funkcjeb.php");
    
	$servername = "mysql.agh.edu.pl";
	$username = "typerw";
	$password = "wiktoria";
	$database = "typerw";

	$conn = new mysqli($servername, $username, $password, $database);
	$szukajbad = $conn->query("SELECT `NazwaBadania` FROM `SlowBad`");
	$zamienbad = $conn->query("SELECT `NazwaBadania` FROM `SlowBad`");
	$usunbad = $conn->query("SELECT `NazwaBadania` FROM `SlowBad`");
	
	if(!empty($_GET['menu'])){
		$wybor = $_GET['menu'];
		//echo "Wybrano z GET<br>";
	}

	if(!isset($wybor)) $wybor = 0;
	switch($wybor) {
	    case 1:
			Dodaj($conn, $_GET['nazwa']);
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

   	<H4><center>Baza badań diagnostycznych</center></H4>
	<H4><center>Wybierz jedną z opcji</center></H4>
	<form action="badania.php" method="get">
		<div class="form-group">
		<label><input type="radio" name="menu" value="1" checked> Dodaj nowe badanie diagnostyczne <label><br>
		</div>
		<div class="form-group">
		Nazwa: <input type="text" class="form-control" name="nazwa" placeholder="Wpisz nazwe"><br>
		</div>
		<div class="form-group">
		<label><input type="radio" name="menu" value="2"> Wyszukaj badanie w bazie <label><br>
		</div>
		Wyszukaj nazwe badania: <select name="szukany">
		<?php 
		while($rows=$szukajbad->fetch_assoc())
		{
		    $dname = $rows['NazwaBadania'];
		    echo "<option value='$dname'>$dname</option>";
		    		}
		?>
		</select>
		<div class="form-group">
		<label><input type="radio" name="menu" value="3"> Edytuj nazwe badania <label><br>
		</div>
		Znajdź nazwe badania: <select name="zamien_z">
		<?php 
		while($rows=$zamienbad->fetch_assoc())
		{
		    $dname = $rows['NazwaBadania'];
		    echo "<option value='$dname'>$dname</option>";
		    		}
		?>
		</select>
		<br>
		<div class="form-group">
		zamień na <input type="text" class="form-control" name="zamien_na" placeholder="Wpisz nazwe badania"><br>
		</div>
		<div class="form-group">
		<label><input type="radio"  name="menu" value="4"> Usuń badanie z bazy <label><br>
		</div>
		Wyszukaj nazwe badania: <select name="usuwany">
		<?php 
		while($rows=$usunbad->fetch_assoc())
		{
		    $dname = $rows['NazwaBadania'];
		    echo "<option value='$dname'>$dname</option>";
		    		}
		?>
		</select>
		<br>
		<input type="submit"  class="btn btn-primary" value="Zrobione">
	</form>
	<a href="dalej.php" class="btn btn-primary">Powrót</a>