<?php
require("../config.php");
$sql = "UPDATE pliki SET foto_opis_pl = '" . mysql_real_escape_string(strip_tags(trim($_POST['photoDescPl']))) . "',
foto_opis_en = '" . mysql_real_escape_string(strip_tags(trim($_POST['photoDescEn']))) . "',
foto_opis_ru = '" . mysql_real_escape_string(strip_tags(trim($_POST['photoDescRu']))) . "',
foto_opis_rum = '" . mysql_real_escape_string(strip_tags(trim($_POST['photoDescRum']))) . "' WHERE id = '" . $_POST['photoId'] . "'";
$result = mysql_query($sql) or die(mysql_error());
?>