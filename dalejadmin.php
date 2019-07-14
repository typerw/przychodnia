<?php
include("nagl.php");
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


<h3><w> Zarejestrowani uzytkownicy:</w> </h3>


<?php
    session_start();
    include("nagl.php");

    $servername = "mysql.agh.edu.pl";
    $username = "typerw";
    $password = "wiktoria";
    $database = "typerw";
  
    $conn = new mysqli($servername, $username, $password, $database);
    $zapytanie = "SELECT * FROM Uzytkownicy";
    //echo "<br>" . $zapytanie . "<br>";
    $result = $conn->query($zapytanie);
     
    
    //echo "Liczba znalezionych rekordów: " . $result->num_rows . "<br>";
    if($result->num_rows > 0) {
      //wydrukowanie danych z każdego wiersza
      while($row = $result->fetch_assoc()){
        echo $row["id"] . " | " .
          $row["nazwa"] . " | " . $row["email"] . " | " .
          md5($row["haslo"]) . " | " . $row["status"] . "<br>";
      }
    } else {
      echo "Zwrócono 0 rekordów<br>";
    }
    
    $conn->close();  
?>
</div>