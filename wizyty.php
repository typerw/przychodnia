<?php 
	session_start();
    include("nagl.php");
    include("funkcjew.php");

	$servername = "mysql.agh.edu.pl";
	$username = "typerw";
	$password = "wiktoria";
	$database = "typerw";
	


	$conn = new mysqli($servername, $username, $password, $database);
	$szukajdane= $conn->query("SELECT `imie` , `nazwisko` , `NPWZ` FROM `SlowLekarz`");
	$szukajdata= $conn->query("SELECT `kiedy` , `diagnoza`  FROM `Wizyty`");
	$edytujdata= $conn->query("SELECT `kiedy` , `diagnoza`  FROM `Wizyty`");

   ?>
   <html>
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


   	<H4><center>Baza wizyt</center></H4>
	<H4><center>Wybierz jedną z opcji</center></H4>
	<form action="wizytydalej.php" method="GET">
		<div class="form-group">
		<label><input type="radio" name="menu" value="1" checked> Dodaj nową wizytę do bazy <label><br>
		</div>
		<div class="form-group">
		Kiedy<input type="date" class="form-control" name="kiedy" id="formGroupExampleInput" placeholder="RRRR-MM-DD">
    	</div>
		<div class="form-group">
		Diagnoza:<input type="text" class="form-control" name="diagnoza" placeholder="Wpisz diagnoze"><br>
		</div>
		<!-- <div class="form-group">
		Uzytkownik:<input type="text" class="form-control" name="Uzytkownicy_idU" placeholder="Wpisz uzytkownika"><br>
		</div> -->
		Lekarz: <select name="NPWZ">
		<?php 
		while($rows=$szukajdane->fetch_assoc())
		{
			$dname = $rows['NPWZ'];
		    $dname2 = $rows['imie'] . " " . $rows['nazwisko'] . " " . $rows['NPWZ'];
		    echo "<option value='$dname'>$dname2</option>";
		    		}
		?>
		</select>
		<!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<select name="status">
  			<option>Wizyta planowana</option>
			<option>Wizyta zrealizowana</option>
		</select> -->
		<div class="form-group">
		<label><input type="radio" name="menu" value="2"> Edytuj diagnozę <label><br>
		</div>
		Wybierz date wizyty: <select name="zamien_z">
		<?php 
		while($rows=$edytujdata->fetch_assoc())
		{
			$dnamekiedy = $rows['diagnoza'];
		    $dnamekiedy2 = $rows['kiedy'] . " " . $rows['diagnoza'];
		    echo "<option value='$dnamekiedy'>$dnamekiedy2</option>";
		    		}
		?>
		</select>
	<br>
		<div class="form-group">
		zamień diagnozę na <input type="text" class="form-control" name="zamien_na" placeholder="Wpisz nową diagnozę"><br>
		</div>
		<div class="form-group">
		<label><input type="radio"  name="menu" value="4"> Usuń wizytę:<label><br>
		</div>
		Wybierz dane wizyty: <select name="usuwany">
		<?php 
		while($rows=$szukajdata->fetch_assoc())
		{
			$dnamekiedy = $rows['kiedy'];
		    $dnamekiedy2 = $rows['kiedy'] . " " . $rows['diagnoza'];
		    echo "<option value='$dnamekiedy'>$dnamekiedy2</option>";
		    		}
		?>
		</select>
	<br>
		<input type="submit"  class="btn btn-primary" value="Zrobione">
	</form>
	<a href="dalej.php" class="btn btn-primary">Powrót</a>
	</html>