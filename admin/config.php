<?php
$root = "localhost:3309";
$db = "projekto";
$user = "root";
$pass = "";

$link = mysql_connect($root, $user, $pass) or die("Nie mogę się połączyć: " . mysql_error());
mysql_select_db($db, $link) or die (mysql_error());
$dbh = new PDO("mysql:host=$root;dbname=$db", $user, $pass);
?>