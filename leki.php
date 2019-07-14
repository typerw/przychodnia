<?php 
    include("nagl.php");
    include("funkcjel.php");
    
	$servername = "mysql.agh.edu.pl";
	$username = "typerw";
	$password = "wiktoria";
	$database = "typerw";

	$conn = new mysqli($servername, $username, $password, $database);
	$szukajlek = $conn->query("SELECT `nazwa` FROM `SlowLekow`");
	$zamienlek = $conn->query("SELECT `nazwa` FROM `SlowLekow`");
	$usunlek = $conn->query("SELECT `nazwa` FROM `SlowLekow`");

	
	if(!empty($_GET['menu'])){
		$wybor = $_GET['menu'];
		//echo "Wybrano z GET<br>";
	}

	if(!isset($wybor)) $wybor = 0;
	switch($wybor) {
	    case 1:
			Dodaj($conn, $_GET['EAN'], $_GET['nazwa'], $_GET['substczynna'], $_GET['opakowanie']);
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

   	<H4><center>Baza leków</center></H4>
	<H4><center>Wybierz jedną z opcji</center></H4>
	<center><a href="http://www.wykazlekow.pl/" class="btn btn-primary">Wyszukaj lek w bazie</a></center>
	<center><a href="http://www.mz.gov.pl/wp-content/uploads/2018/02/solr-zalacznikdo-obwieszczenia.xlsx" class="btn btn-primary">Baza leków refundowanych</a></center>
	<form action="leki.php" method="get">
		<div class="form-group">
		<label><input type="radio" name="menu" value="1" checked> Dodaj nowy lek do bazy <label><br>
		</div>
		<div class="form-group">
		Nazwa: <input type="text" class="form-control" name="nazwa" placeholder="Wpisz nazwe"><br>
		EAN<input type="text" class="form-control" name="EAN" placeholder="Wpisz numer EAN"><br>
		Substancja czynna<input type="text" class="form-control" name="substczynna" placeholder="Wpisz nazwę substancji czynnej"><br>
		Opakowanie<input type="text" class="form-control" name="opakowanie" placeholder="Wpisz typ opakowania"><br>
		</div>
		<div class="form-group">
		<label><input type="radio" name="menu" value="2"> Wyszukaj lek w bazie <label><br>
		</div>
		Szukaj nazwy leku: <select name="szukany">
		<?php 
		while($rows=$szukajlek->fetch_assoc())
		{
		    $dname = $rows['nazwa'];
		    echo "<option value='$dname'>$dname</option>";
		    		}
		?>
		</select>
		<div class="form-group">
		<label><input type="radio" name="menu" value="3"> Edytuj nazwe leku <label><br>
		</div>
		Znajdź nazwę leku: <select name="zamien_z">
		<?php 
		while($rows=$zamienlek->fetch_assoc())
		{
		    $dname = $rows['nazwa'];
		    echo "<option value='$dname'>$dname</option>";
		    		}
		?>
		</select>
		<br>
		<div class="form-group">
		zamień na <input type="text" class="form-control" name="zamien_na" placeholder="Wpisz nazwe leku"><br>
		</div>
		<div class="form-group">
		<label><input type="radio"  name="menu" value="4"> Usuń lek z bazy <label><br>
		</div>
		Znajdź nazwę leku: <select name="usuwany">
		<?php 
		while($rows=$usunlek->fetch_assoc())
		{
		    $dname = $rows['nazwa'];
		    echo "<option value='$dname'>$dname</option>";
		    		}
		?>
		</select>
		<br>
		<input type="submit"  class="btn btn-primary" value="Zrobione">
	</form>
	<a href="dalej.php" class="btn btn-primary">Powrót</a>