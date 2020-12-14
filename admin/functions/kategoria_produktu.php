<?php
function kategoria_produktu($przypisanie)
{
if($przypisanie == 0) return 'Poziom główny';
$sql = "SELECT * FROM kategorie_produktow WHERE id = '".$przypisanie."'";
$result = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($result);
return $row->tytul_en.'/ '.$row->tytul_pl;
}
?>