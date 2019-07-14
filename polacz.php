<?
    //dołączenie skryptu ze zmiennymi
    include ("zmienne.php");

    //połączenie z serwerem bazy
        @mysql_connect($host, $user, $passwd)
            or die('Brak połączenia z serwerem MySQL');

            //łączymy się z bazą danych
        @mysql_select_db($baza)
            or die('Błąd wyboru bazy danych');
?>