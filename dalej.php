

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
        <a class="nav-link" href="uzytkownicyuser.php">Uzytkownicy <span class="sr-only">(current)</span></a>
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

  <div class="container" style="height: 700px">
  <?
    session_start();
    include("nagl.php");

    $servername = "mysql.agh.edu.pl";
    $username = "typerw";
    $password = "wiktoria";
    $database = "typerw";
    
    $log = $_SESSION['login'];
    //$Uzytkownicy_idU = $_SESSION['login'];
    $conn = new mysqli($servername, $username, $password, $database);
    
    if ($conn->connect_error) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $zapytanie = "SELECT * FROM Wizyty WHERE Uzytkownicy_idU = 83";
    //echo "<br>" . $zapytanie . "<br>";
    $result = $conn->query($zapytanie);
    
    
    //echo "Liczba znalezionych rekordów: " . $result->num_rows . "<br>";
    if($result->num_rows > 0) {
        //wydrukowanie danych z kazego wiersza
        while($row = $result->fetch_assoc()){
            echo $row["idW"] . " | " .
                $row["kiedy"] . " | " . $row["diagnoza"] . " | " .
                $row["Uzytkownicy_idU"] . " | " . $row["SlowLekarz_idSL"] . "<br>";
        }
    } else {
        echo "Wystąpił błąd<br>";
    }
    
    $conn->close();  
?>

</div>


