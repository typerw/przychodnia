<?php
 include("nagl.php");
 include("funkcje_przypomnienie.php");
 $servername = "mysql.agh.edu.pl";
	$username = "typerw";
	$password = "wiktoria";
	$database = "typerw";

  $conn = new mysqli($servername, $username, $password, $database);	
	$conn->close();
?>


<html>
<head>
	<title>Przypomnij hasło</title>
</head>
<body>
  <div class="form-group">
    <label for="formGroupExampleInput">Wpisz adres email</label>
    <input type="text" class="form-control" name="email_to" id="formGroupExampleInput" placeholder="Wpisz adres email">
  </div>
	<div class="input-group">
		<button type="submit"  class="btn btn-primary" name="register_btn" >Wyślij przypomnienie hasła</button>
	</div>
</form>
</body>
</html>
<?php
include("stopka.php");
?>