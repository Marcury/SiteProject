
<?php 
//session_start();
//mysql_connect("localhost","root","") or die(mysql_error()."Nie mozna polaczyc sie z baza danych. Prosze chwile odczekac i sprobowac ponownie.");
//mysql_select_db("logowanie") or die(mysql_error()."Nie mozna wybrac bazy danych.");
$config['db']['host'] = 'localhost';
$config['db']['user'] = 'root';
$config['db']['password'] = '';
$config['db']['database'] = 'user';
//$mysqli1 = new mysqli("localhost","root","","uzytkownicy");
$mySqli = new mysqli("localhost","root","","wiadomosci");