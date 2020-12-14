<?php
ob_start();
require_once('../config.php');
if(isset($_GET['kierunek'])){
	if($_GET['kierunek']=='up'){
		$nad=$_GET['y']+1;
		$pod=$_GET['y'];
		$id=$_GET['x'];
		////// podniesienie/////
		$opsc=mysql_query('UPDATE linki SET kolejnosc="'.$pod.'" WHERE kolejnosc="'.$nad.'"');
		$podnies=mysql_query('UPDATE linki SET kolejnosc="'.$nad.'" WHERE id="'.$id.'"');
		$id++;


	}
	elseif($_GET['kierunek']=='down'){
		$nad=$_GET['y']-1;
		$pod=$_GET['y'];
		$id=$_GET['x'];
		////// opuszczenie/////
		mysql_query('UPDATE linki SET kolejnosc="'.$pod.'" WHERE kolejnosc="'.$nad.'"');
		mysql_query('UPDATE linki SET kolejnosc="'.$nad.'" WHERE id="'.$id.'"');

	}
}
header('Location:../index.php?module=menus&success=1');
ob_end_flush();
?>