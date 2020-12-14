<?php
function kategoria($przypisanie)
{
$sql = "SELECT * FROM kategorie WHERE id = '".$przypisanie."'";
$result = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($result);
return $row->tytul;
}
?>