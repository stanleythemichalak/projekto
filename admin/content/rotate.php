<?php session_start();
require('../config.php');
$sql = "SELECT * FROM pliki WHERE id = '" . mysql_real_escape_string($_GET['prefix']) . "'";
$result = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_object($result);
$source = imagecreatefromjpeg('./uploads/' . $_SESSION['temp'] . '/' . $row->tytul);
$rotate = imagerotate($source, 90, 0);
imagejpeg($rotate, './uploads/' . $_SESSION['temp'] . '/' . $row->tytul);
header('Location:../index.php?module=content&edytuj=' . $_SESSION['temp'].'&r='.mt_rand(0, 9999999));
?>