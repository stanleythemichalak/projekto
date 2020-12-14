<?php 
require("../config.php");
$updateRecordsArray 	= $_POST['recordsArray'];

	$listingCounter = 1;
	foreach ($updateRecordsArray as $recordIDValue) {
		$query = "UPDATE pliki SET kolejnosc = " . $listingCounter . " WHERE prefix = '".$_GET['prefix']."' AND id = " . $recordIDValue ;
		mysql_query($query) or die('Error, insert query failed');
		$listingCounter = $listingCounter + 1;	
	}
?>